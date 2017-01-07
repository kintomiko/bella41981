<?php
/**
 * Created by IntelliJ IDEA.
 * User: kindai
 * Date: 21/10/16
 * Time: 11:19 PM
 */
class T_act extends MY_Model{

    const ACT_PENDING = 100;
    const ACT_ACCEPTED = 200;
    const ACT_START_CONFIRM = 201;
    const ACT_CLOSED = 300;
    const ACT_REJECTED = 400;


    const ACT_CONFIRM_PENDING = 100;
    const ACT_CONFIRM_CONFIRMED = 200;

    const ACT_USER_PART_JOINED = 0;
    const ACT_USER_PART_CONFIRMED = 1;


    const MAX_INVITATION_PER_ACT = 5;
    const MAX_CONFIRM_PER_ACT = 5;

    const CONFIRM_COUNT_TO_GET_CREDIT = 3;

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
        $this->db->set('status',T_act::ACT_PENDING);
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

    public function isStarter($id, $userId){
        $query = $this->db->get_where('t_act',array('ID' => $id, 'STARTER_ID' => $userId));
        return count($query->result())>0? true:false;
    }

    public function isParticipant($id, $userId){
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
        $this->db->set('status',T_act::ACT_USER_PART_JOINED);
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

    public function getPendingConfirmsByToUser($toUserId){
        $this->db->select('t_act_confirm.*');
        $this->db->from('t_act_confirm');
        $this->db->where('from_id',$toUserId);
        $this->db->where('status',T_act::ACT_CONFIRM_PENDING);
        $query = $this->db->get();
        return $query->result();
    }

    public function getConfirm($actId, $fromUserId, $toUserId){
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
        $this->db->where('status',T_act::ACT_CONFIRM_CONFIRMED);
        $query = $this->db->get();
        return count($query->result());
    }

    private function countGivenConfirm($actId, $fromUserId){
        $this->db->distinct(true);
        $this->db->select('t_act_confirm.*');
        $this->db->from('t_act_confirm');
        $this->db->where('from_id',$fromUserId);
        $this->db->where('act_id',$actId);
        $this->db->where('status',T_act::ACT_CONFIRM_CONFIRMED);
        $query = $this->db->get();
        return count($query->result());
    }

    private function countSentConfirmInvitationByAct($actId, $toUserId){
        $this->db->distinct(true);
        $this->db->select('t_act_confirm.*');
        $this->db->from('t_act_confirm');
        $this->db->where('to_id',$toUserId);
        $this->db->where('act_id',$actId);
        $query = $this->db->get();
        return count($query->result());
    }

    public function checkAndGrantCredit($actId, $userId){
        $this->load->model('t_credit');
        $act = $this->getAct($actId);
        $toUserPart = $this->getActPart($actId, $userId);
        if(count($toUserPart)>0){
            $toUserPart = $toUserPart[0];
        }else{
            return false;
        }
        if($this->countGotConfirm($actId, $userId)>= T_act::CONFIRM_COUNT_TO_GET_CREDIT && $toUserPart->STATUS == 0){
            $this->t_credit->insertCredit($userId, $act->CREDIT);
        }
    }

    public function inviteUserConfirmByAct($actId, $fromUserId, $toUserId){
        //validation
        $existingConfirms = $this->getConfirm($actId, $fromUserId, $toUserId);
        if(count($existingConfirms)>0)
            return false;
        if($this->countSentConfirmInvitationByAct($actId, $toUserId)> T_act::MAX_INVITATION_PER_ACT){
            return false;
        }
        $act = $this->getAct($actId);
        if($act->STATUS!=T_act::ACT_START_CONFIRM)
            return false;
        $this->db->set('to_id',$toUserId);
        $this->db->set('from_id',$fromUserId);
        $this->db->set('act_id',$actId);
        $this->db->set('status',T_act::ACT_CONFIRM_PENDING);
        $this->db->insert('t_act_confirm');
        return true;
    }

    public function confirmUserByAct($actId, $fromUserId, $toUserId, $comment){
        $confirms = $this->getConfirm($actId, $fromUserId, $toUserId);
        if(count($confirms)!=1 || $confirms[0]->STATUS != T_act::ACT_CONFIRM_PENDING){
            return false;
        }
        if(!$this->isInAct($actId, $toUserId) ||
            !$this->isInAct($actId, $fromUserId) ||
            $this->countGivenConfirm($actId, $fromUserId) >= T_act::MAX_CONFIRM_PER_ACT ||
            $fromUserId == $toUserId)
            return false;
        //do update status
        $this->db->where('to_id',$toUserId);
        $this->db->where('from_id',$fromUserId);
        $this->db->where('act_id',$actId);
        $this->db->set('status',T_act::ACT_CONFIRM_CONFIRMED);
        $this->db->set('comment',$comment);
        $this->db->update('t_act_confirm');
        return true;
    }

    /**********************我是 portal 分割线***************************/

    public function getActListToPortal(){
        $this->db->select('t_act.*,t_user.NICKNAME,t_act_img.URL');
        $this->db->from('t_act,t_user,t_act_img');
        $this->db->where('t_user.user_id=t_act.STARTER_ID');
        $this->db->where('t_act_img.act_id=t_act.id');
        $this->db->where('weight !=',0);
        $this->db->order_by('weight','DESC');
        $this->db->order_by('START_ON', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getActInfo($id){
        $this->db->select('t_act.*,t_user.NICKNAME,t_act_img.URL,t_province.name as PROVINCE');
        $this->db->from('t_user,t_act_img,t_act');
        $this->db->join('t_province','t_act.province_code=t_province.code','left');
        $this->db->where('t_user.user_id=t_act.STARTER_ID');
        $this->db->where('t_act_img.act_id=t_act.id');
        $this->db->where('t_act.id',$id);
        $query = $this->db->get()->result();
        return $query[0];
    }

    public function getActPage($pageNum,$pageSize,$title){
        $this->db->select('t_act.*,t_user.NICKNAME');
        $this->db->from('t_act,t_user');
        $this->db->where('t_user.user_id=t_act.STARTER_ID');
        $this->db->where('t_act.status !=100 and t_act.status !=400');
        $this->db->like('t_act.title',$title);
        $this->db->order_by('t_act.weight','DESC');
        $this->db->order_by('t_act.STATUS', 'ASC');
        $this->db->order_by('t_act.START_ON', 'DESC');
        $query = $this->db->limit($pageNum,($pageSize-1)*$pageNum)->get();
        return $query->result();
    }

    public function getActTotal($title){
        $this->db->select('t_act.*');
        $this->db->from('t_act');
        $this->db->where('t_act.status !=100 and t_act.status !=400');
        $this->db->like('t_act.title',$title);
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function getActTemList(){
        $this->db->select('t_act_tem.*');
        $this->db->from('t_act_tem');
        $this->db->where('status',1);
        $this->db->order_by('limit','ASC');
        $this->db->order_by('STARTER_CREDIT', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getActTemType(){
        $this->db->select('t_act_tem.LIMIT');
        $this->db->from('t_act_tem');
        $this->db->where('status',1);
        $this->db->group_by('limit');
        $query = $this->db->get();
        return $query->result();
    }

}