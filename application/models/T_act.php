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
        if (!session_id()) session_start();
        $this->db->select('t_act_tem.*');
        $this->db->from('t_act_tem');
        if( !(isset($_SESSION['user']) && in_array(4,explode(',',$_SESSION['user']->AUTHORITY)) )){
                $this->db->where('status',1);
        }
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
    public function addAct($temId,$title,$brief,$imgUrl,$min_part,
                           $province_code,$location,$start_on,$end_on,$reg_start_on,$reg_end_on,$desc){
        if (!session_id()) session_start();
        $this->load->model('t_system');
        $result=(object)array();
        $result->success=false;
        $tem=$this->getActTem($temId);
        if(!in_array(4,explode(',',$_SESSION['user']->AUTHORITY))){
            if($_SESSION['user']->ISHONOR==0){
                if($tem->STARTER_GRADE==0){
                    $result->msg="本活动仅限荣誉会员级以上贝壳可发起！";
                    return $result;
                }else{
                    if($_SESSION['user']->GRADE<$tem->STARTER_GRADE){
                        $result->msg="本活动仅限".$tem->STARTER_GRADE."级以上贝壳可发起！";
                        return $result;
                    }else{
                        if(!$this->getUserSponActAuth($_SESSION['user']->USER_ID)){
                            $result->msg="本周可发起活动数量已到达上限，请下周参与！";
                            return $result;
                        }
                    }
                }
            }
        }
        date_default_timezone_set("PRC");
        $this->db->set('STARTER_ID',$_SESSION['user']->USER_ID);
        $this->db->set('PROVINCE_CODE',$province_code);
        $this->db->set('GRADE',$tem->PERSON_GRADE);
        $this->db->set('LOCATION',$location);
        $this->db->set('START_ON',$start_on);
        $this->db->set('END_ON',$end_on);
        $this->db->set('REG_START_ON',$reg_start_on);
        $this->db->set('REG_END_ON',$reg_end_on);
        $this->db->set('TITLE',$title);
        $this->db->set('DESC',$desc);
        $this->db->set('CREDIT',$tem->PERSON_CREDIT);
        $this->db->set('STARTER_CREDIT',$tem->STARTER_CREDIT);
        $this->db->set('STATUS',100);
        $this->db->set('MAX_PART',$tem->LIMIT);
        $this->db->set('MIN_PART',$min_part);
        $this->db->set('CUR_PART',0);
        $this->db->set('WEIGHT',0);
        $this->db->set('BRIEF',$brief);
        $this->db->set('CREATE_TIME',date("Y-m-d"));
        $this->db->insert('t_act');
        $id=$this->db->insert_id();
        $this->addTemImg($id,$imgUrl);
        $this->t_system->operateAdd($_SESSION['user']->USER_ID,"添加活动",$title);
        $result->success=true;
        $result->msg="发起成功，请耐心等待管理审核！";
        return $result;
    }
    public function getUserSponActAuth($userId){
        $this->db->select('*');
        $this->db->from('t_act_tem,t_user');
        $this->db->where('t_user.user_id=t_act.STARTER_ID');
        $this->db->where('t_user.user_id',$userId);
        $this->db->where('YEARWEEK(t_act.CREATE_TIME) = YEARWEEK(CURDATE()');
        $query = $this->db->get()->result();
        if(count($query)<$this->getActNum($userId)->ACT_NUM){
            return true;
        }else{
            return false;
        }
    }
    public function getActNum($userId){
        $this->db->select('t_grade.*');
        $this->db->from('t_grade,t_user');
        $this->db->where('t_user.GRADE=t_grade.GRADE');
        $this->db->where('t_user.user_id',$userId);
        $query = $this->db->get()->result();
        return $query[0];
    }

    public function getActTem($temId){
        $this->db->select('t_act_tem.*');
        $this->db->from('t_act_tem');
        $this->db->where('id',$temId);
        $query = $this->db->get()->result();
        return $query[0];
    }
    public function addTemImg($actId,$url){
        if($url==""){
            $url="http://ww2.sinaimg.cn/large/7af429c9jw1f97rln23i1j20b20b2jsh.jpg";
        }
        $this->db->set('ACT_ID',$actId);
        $this->db->set('URL',$url);
        $this->db->insert('t_act_img');
    }
    public function addActPart($actId){
        if (!session_id()) session_start();
        $this->db->set('USER_ID',$_SESSION['user']->USER_ID);
        $this->db->set('ACT_ID',$actId);
        $this->db->insert('t_act_part');
    }
    public function updateActToPart($actId,$part){
        $this->db->set('CUR_PART',$part);
        $this->db->where('ID',$actId);
        $this->db->update('t_act');
    }

    public function getActPartList($actId){
        $this->db->select('t_user.*');
        $this->db->from('t_act_part,t_user');
        $this->db->where('t_user.user_id=t_act_part.USER_ID');
        $this->db->where('t_act_part.ACT_ID',$actId);
        $query = $this->db->get()->result();
        return $query;
    }

    public function enterAct($actId){
        if (!session_id()) session_start();
        $result=(object)array();
        $result->success=false;
        if(isset($_SESSION['user'])){
            $act=$this->getActInfo($actId);
            if($act->STARTER_ID==$_SESSION['user']->USER_ID){
                $result->msg="已参与！";
            }else if(!($this->getActPart($actId,$_SESSION['user']->USER_ID))){
                if($act->CUR_PART<$act->MAX_PART){
                    if($_SESSION['user']->ISHONOR==0){
                        if($_SESSION['user']->GRADE<$act->GRADE){
                            $result->msg="本活动仅限".$act->GRADE."级以上贝壳可参加！";
                            return $result;
                        }
                    }
                    $this->addActPart($actId);
                    $this->updateActToPart($actId,$act->CUR_PART+1);
                    $result->success=true;
                    $result->msg="报名成功！";
                }else{
                    $result->msg="名额已满！";
                }
            }else{
                $result->msg="已报名！";
            }
        }else{
            $result->msg="请先登录！";
        }
        return $result;
    }

}