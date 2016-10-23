<?php
/**
 * Created by IntelliJ IDEA.
 * User: kindai
 * Date: 21/10/16
 * Time: 11:19 PM
 */
class T_act extends MY_Model{

//    ACT status:
//    100 pending
//    200 accepted
//    201 start confirming
//    300 closed
//    400 rejected

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function getActList($filter){
        $this->db->select('t_act.*');
        $this->db->from('t_act');
        $this->db->where($filter);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAct($id){
        $query = $this->db->get_where('t_act',array('ID' => $id));
        return $query->result()[0];
    }

    public function getActPart($actId, $userId){
        $query = $this->db->get_where('t_act_part',array('ACT_ID' => $actId, 'USER_ID' => $userId));
        return $query->result();
    }

    public function insertAct($title,$grade,$location,$start_on,$end_on,$reg_start_on,$reg_end_on,$desc,$credit,$max_part,$min_part){
        if (!session_id()) session_start();
        $this->load->model('t_system');
        date_default_timezone_set("PRC");
        $this->db->set('title',$title);
        $this->db->set('grade',$grade);
        $this->db->set('starter_id',$_SESSION['user']->USER_ID);
        $this->db->set('province_code',$_SESSION['user']->PROVINCE_CODE);
        $this->db->set('location',$location);
        $this->db->set('reg_start_on',$reg_start_on);
        $this->db->set('reg_end_on',$reg_end_on);
        $this->db->set('start_on',$start_on);
        $this->db->set('end_on',$end_on);
        $this->db->set('desc',$desc);
        $this->db->set('status',100);
        $this->db->set('max_part',$max_part);
        $this->db->set('min_part',$min_part);
        $this->db->set('credit',$credit);
        $this->db->insert('t_act');
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"添加活动",$title);
    }

    public function approveAct($id){
        if (!session_id()) session_start();
        $this->db->set('status',200);
        $this->db->where('id',$id);
        $this->db->update('t_act');

        $this->load->model('t_system');
        $act = $this->getAct($id);
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"审批通过活动",$act->TITLE);
    }

    public function rejectAct($id){
        if (!session_id()) session_start();
        $this->db->set('status',400);
        $this->db->where('id',$id);
        $this->db->update('t_act');

        $this->load->model('t_system');
        $act = $this->getAct($id);
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"拒绝活动",$act->TITLE);
    }

    public function isInAct($actId, $userId){
        return ($this->isStarter($actId, $userId) || $this->isParticipant($actId, $userId));
    }

    private function isStarter($id, $userId){
        $query = $this->db->get_where('t_act',array('ID' => $id, 'STARTER_ID' => $userId));
        return count($query->result())>0? true:false;
    }

    private function isParticipant($id, $userId){
        $query = $this->db->get_where('t_act_part',array('ACT_ID' => $id, 'USER_ID' => $userId));
        return count($query->result())>0? true:false;
    }

    public function joinAct($id){
        if (!session_id()) session_start();
        $this->load->model('t_system');
        $act = $this->getAct($id);
        date_default_timezone_set("PRC");
        if($act->MAX_PART ==  $act->CUR_PART)
            return false;
        if($act->GRADE > $_SESSION['user']->GRADE)
            return false;
        if($act->REG_START_ON > date('Y-m-d H:i:s') || $act->REG_END_ON < date('Y-m-d H:i:s') )
            return false;
        $this->db->set('CUR_PART',$act->CUR_PART+1);
        $this->db->where('id',$id);
        $this->db->update('t_act');

        $this->db->set('act_id',$id);
        $this->db->set('user_id',$_SESSION['user']->USER_ID);
        $this->db->set('status',0);
        $this->db->insert('t_act_part');

        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"加入活动",$act->TITLE);
        return true;
    }

    public function getJoinedAct(){
        if (!session_id()) session_start();
        $this->db->select('t_act.*');
        $this->db->from('t_act');
        $this->db->join('t_act_part','t_act.ID = t_act_part.ACT_ID');
        $this->db->where('t_act_part.USER_ID',$_SESSION['user']->USER_ID);
        $query = $this->db->get();
        return $query->result();
    }

    public function getParticipants($id){
        $query = $this->db->get_where('t_act_part',array('ACT_ID' => $id));
        return $query->result();
    }

    private function getConfirm($actId, $fromUserId, $toUserId){
        $this->db->select('t_act_confirm.*');
        $this->db->from('t_act_confirm');
        $this->db->where('to_id',$toUserId);
        $this->db->where('from_id',$fromUserId);
        $this->db->where('act_id',$actId);
        $query = $this->db->get();
        return $query->result();
    }

    private function countGotConfirm($actId, $toUserId){
        $this->db->distinct(true);
        $this->db->select('t_act_confirm.*');
        $this->db->from('t_act_confirm');
        $this->db->where('to_id',$toUserId);
        $this->db->where('act_id',$actId);
        $query = $this->db->get();
        return count($query->result());
    }

    private function countGivenConfirm($actId, $fromUserId){
        $this->db->distinct(true);
        $this->db->select('t_act_confirm.*');
        $this->db->from('t_act_confirm');
        $this->db->where('from_id',$fromUserId);
        $this->db->where('act_id',$actId);
        $query = $this->db->get();
        return count($query->result());
    }

    public function insertConfirm($actId, $fromUserId, $toUserId, $comment){
        if(!$this->isInAct($actId, $toUserId) ||
            !$this->isInAct($actId, $fromUserId) ||
            $this->countGivenConfirm($actId, $fromUserId) >=5 ||
            $fromUserId == $toUserId)
            return false;
        $this->db->set('to_id',$toUserId);
        $this->db->set('from_id',$fromUserId);
        $this->db->set('act_id',$actId);
        $this->db->set('comment',$comment);
        $this->db->insert('t_act_confirm');
        return true;
    }

    public function checkAndGrantCredit($actId, $userId){
        $this->load->model('t_system');
        $this->load->model('t_credit');
        $act = $this->getAct($actId);
        $toUserPart = $this->getActPart($actId, $userId);
        if(count($toUserPart)>0){
            $toUserPart = $toUserPart[0];
        }else{
            return false;
        }
        if($this->countGotConfirm($actId, $userId)>=3 && $toUserPart->STATUS == 0){
            $this->t_credit->insertCredit($userId, $act->CREDIT);
        }
    }

}