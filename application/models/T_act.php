<?php
/**
 * Created by IntelliJ IDEA.
 * User: kindai
 * Date: 21/10/16
 * Time: 11:19 PM
 */
class T_act extends MY_Model{

	public function __construct(){
        parent::__construct();
        $this->load->library('session');
    }

    public function getActList($filter, $value){
        $this->db->select('t_act.*');
        $this->db->from('t_act');
        $this->db->where($filter, $value);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAct($id){
        $query = $this->db->get_where('t_act',array('ID' => $id));
        return $query->result();
    }

    public function insertAct($title,$grade,$location,$start_on,$desc,$credit,$max_part){
        if (!session_id()) session_start();
        $this->load->model('t_system');
        date_default_timezone_set("PRC");
        $this->db->set('title',$title);
        $this->db->set('grade',$grade);
        $this->db->set('starter_id',$_SESSION['user']->USER_ID);
        $this->db->set('province_code',$_SESSION['user']->PROVINCE_CODE);
        $this->db->set('location',$location);
        $this->db->set('start_on',$start_on);
        $this->db->set('desc',$desc);
        $this->db->set('status',0);
        $this->db->set('max_part',$max_part);
        $this->db->set('credit',$credit);
        $this->db->insert('t_act');
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"添加活动",$title);
    }

    public function updateAct($id,$title,$grade,$location,$start_on,$desc,$credit,$max_part){
        if (!session_id()) session_start();
        $this->load->model('t_system');
        $this->db->set('title',$title);
        $this->db->set('grade',$grade);
        $this->db->set('location',$location);
        $this->db->set('start_on',$start_on);
        $this->db->set('desc',$desc);
        $this->db->set('max_part',$max_part);
        $this->db->set('credit',$credit);
        $this->db->where('id',$id);
        $this->db->update('t_act');
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"修改活动",$title);
    }

    public function approveAct($id){
        if (!session_id()) session_start();
        $this->load->model('t_system');
        $act = $this->getAct($id);
        $this->db->set('status',1);
        $this->db->where('id',$id);
        $this->db->update('t_act');
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"审批通过活动",$act[0]->TITLE);
    }

    public function isInAct($id){
        return ($this->isStarter($id) || $this->isParticipant($id));
    }

    public function isStarter($id){
        if (!session_id()) session_start();
        $query = $this->db->get_where('t_act',array('ID' => $id, 'STARTER_ID' => $_SESSION['user']->USER_ID));
        return count($query->result())>0? true:false;
    }

    public function isParticipant($id){
        if (!session_id()) session_start();
        $query = $this->db->get_where('t_act_part',array('ACT_ID' => $id, 'USER_ID' => $_SESSION['user']->USER_ID));
        return count($query->result())>0? true:false;
    }

    public function joinAct($id){
        if (!session_id()) session_start();
        $this->load->model('t_system');

        $act = $this->getAct($id);
        if($act[0]->MAX_PART ==  $act[0]->CUR_PART)
            return false;
        if($act[0]->GRADE > $_SESSION['user']->GRADE)
            return false;
        if($act[0]->PROVINCE_CODE != $_SESSION['user']->PROVINCE_CODE)
            return false;
        $this->db->set('CUR_PART',$act[0]->CUR_PART+1);
        $this->db->where('id',$id);
        $this->db->update('t_act');

        $this->db->set('act_id',$id);
        $this->db->set('user_id',$_SESSION['user']->USER_ID);
        $this->db->set('status',0);
        $this->db->insert('t_act_part');

        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"加入活动",$act[0]->TITLE);
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

}