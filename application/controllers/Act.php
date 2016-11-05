<?php
/**
 * Created by IntelliJ IDEA.
 * User: kindai
 * Date: 23/10/16
 * Time: 10:16 PM
 */

class Act extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function actList(){
        $this->load->model('t_act');
        $this->load->model('t_user');
        $acts = $this->t_act->getActList('status != 100 and status != 400');
        foreach ($acts as $row){
            $province=$this->t_user->getProvinceByCode($row->PROVINCE_CODE);
            if(count($province)>0){
                $row->PROVINCE_CODE=$province[0]->name;
            }
            $user=$this->t_user->get_user($row->STARTER_ID);
            if(count($user)>0){
                $row->STARTER_ID=$user[0]->NICKNAME."(".$user[0]->CODE.")";
            }
        }
        $arr=array(
            'actList'=> $acts
        );
        $this->load->view('act/actList',$arr);
    }

    public function myJoinedActList(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $this->load->model('t_user');
//        $acts = $this->t_act->getActList('starter_id = '.$_SESSION['user']->USER_ID);
//        $participaedActs = $this->t_act->getJoinedAct();
//        $acts = array_merge($acts, $participaedActs);
        $acts = $this->t_act->getJoinedAct();
        foreach ($acts as $row){
            $province=$this->t_user->getProvinceByCode($row->PROVINCE_CODE);
            if(count($province)>0){
                $row->PROVINCE_CODE=$province[0]->name;
            }
            $user=$this->t_user->get_user($row->STARTER_ID);
            if(count($user)>0){
                $row->STARTER_ID=$user[0]->NICKNAME."(".$user[0]->CODE.")";
            }
        }
        $arr=array(
            'actList'=> $acts
        );
        $this->load->view('act/myJoinedActList',$arr);
    }

    public function myStartActList(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $this->load->model('t_user');
        $acts = $this->t_act->getActList('starter_id = '.$_SESSION['user']->USER_ID);
        foreach ($acts as $row){
            $province=$this->t_user->getProvinceByCode($row->PROVINCE_CODE);
            if(count($province)>0){
                $row->PROVINCE_CODE=$province[0]->name;
            }
            $user=$this->t_user->get_user($row->STARTER_ID);
            if(count($user)>0){
                $row->STARTER_ID=$user[0]->NICKNAME."(".$user[0]->CODE.")";
            }
        }
        $arr=array(
            'actList'=> $acts
        );
        $this->load->view('act/myStartActList',$arr);
    }

    public function approveActList(){
        $this->load->model('t_act');
        $this->load->model('t_user');
        $acts = $this->t_act->getActList('status = 100 or status = 400');
        foreach ($acts as $row){
            $province=$this->t_user->getProvinceByCode($row->PROVINCE_CODE);
            if(count($province)>0){
                $row->PROVINCE_CODE=$province[0]->name;
            }
            $user=$this->t_user->get_user($row->STARTER_ID);
            if(count($user)>0){
                $row->STARTER_ID=$user[0]->NICKNAME;
            }
        }
        $arr=array(
            'actList'=>$acts
        );
        $this->load->view('act/approveActList',$arr);
    }

    public function actAdd(){
        $this->load->model('t_user');
        $arr=array(
            'provinces'=>$this->t_user->get_province(true)
        );
        $this->load->view('act/actAdd', $arr);
    }

    public function viewAct(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $this->load->model('t_user');
        $actId= $this->input->get('id');
        $act = $this->t_act->getAct($actId);
        $isParticipant = $this->t_act->isParticipant($actId, $_SESSION['user']->USER_ID);
        $isStarter = $this->t_act->isStarter($actId, $_SESSION['user']->USER_ID);

        $province=$this->t_user->getProvinceByCode($act->PROVINCE_CODE);
        if(count($province)>0){
            $act->PROVINCE_CODE=$province[0]->name;
        }
        $starter=$this->t_user->get_user($act->STARTER_ID);
        if(count($starter)>0){
            $act->STARTER_ID=$starter[0]->NICKNAME."(".$starter[0]->CODE.")";
        }
        $participants = $this->t_act->getParticipants($actId);
        foreach($participants as $row){
            $user=$this->t_user->get_user($row->USER_ID);
            if(count($user)>0){
                $row->USER_DISPLAYNAME=$user[0]->NICKNAME."(".$user[0]->CODE.")";
            }
            $confirms = $this->t_act->getConfirm($actId, $user[0]->USER_ID, $_SESSION['user']->USER_ID);
            if(count($confirms)>0){
                $row->INVITED=true;
                $row->CONFIRMED=$confirms[0]->STATUS == T_act::ACT_CONFIRM_CONFIRMED?true:false;
            }else{
                $row->INVITED=false;
            }
        }
        $arr=array(
            'act'=>$act,
            'isParticipant' => $isParticipant,
            'isStarter' => $isStarter,
            'participants' => $participants
        );
        $this->load->view('act/viewAct',$arr);
    }

    public function approveAct(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $this->load->model('t_user');
        $actId= $this->input->get('id');
        $act = $this->t_act->getAct($actId);

        $province=$this->t_user->getProvinceByCode($act->PROVINCE_CODE);
        if(count($province)>0){
            $act->PROVINCE_CODE=$province[0]->name;
        }
        $starter=$this->t_user->get_user($act->STARTER_ID);
        if(count($starter)>0){
            $act->STARTER_ID=$starter[0]->NICKNAME."(".$starter[0]->CODE.")";
        }
        $arr=array(
            'act'=>$act
        );
        $this->load->view('act/approveAct',$arr);
    }

    public function doApproveAct(){
        $this->load->model('t_act');
        $id = $this->input->post('act_id');
        $action = $this->input->post('action');
        if($action == 'approve') {
            $this->t_act->approveAct($id);
            echo "true";
        } else if ($action == 'reject') {
            $this->t_act->rejectAct($id);
            echo "true";
        }
    }

    public function doJoinAct(){
        $this->load->model('t_act');
        $id = $this->input->post('act_id');
        echo $this->t_act->joinAct($id) ? "true" : "false";
    }

    public function doInviteConfirm(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $id = $this->input->post('act_id');
        $inviteUserId = $this->input->post('invite_user_id');
        echo $this->t_act->inviteUserConfirmByAct($id, $inviteUserId ,$_SESSION['user']->USER_ID) ? "true" : "false";
    }

    public function pendingConfirmList(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $this->load->model('t_user');
        $confirmList = $this->t_act->getPendingConfirmsByToUser($_SESSION['user']->USER_ID);

        foreach($confirmList as $row){
            $user=$this->t_user->get_user($row->TO_ID);
            if(count($user)>0){
                $row->toUser=$user[0];
            }
            $act=$this->t_act->getAct($row->ACT_ID);
            if(count($act)>0){
                $row->act=$act;
                $starter=$this->t_user->get_user($act->STARTER_ID);
                if(count($starter)>0){
                    $act->STARTER_NAME=$starter[0]->NICKNAME."(".$starter[0]->CODE.")";
                }
            }
        }

        $arr=array(
            'confirmList'=>$confirmList,
        );
        $this->load->view('act/pendingConfirmList', $arr);
    }

    public function viewPendingConfirm(){
        $actId= $this->input->get('act_id');
        $toUserId= $this->input->get('to_user_id');

        $this->load->model('t_act');
        $this->load->model('t_user');

        $act = $this->t_act->getAct($actId);
        $toUser = $this->t_user->get_user($toUserId)[0];

        $arr=array(
            'act'=>$act,
            'toUser' => $toUser
        );
        $this->load->view('act/viewPendingConfirm', $arr);
    }

    public function doConfirm(){
        if (!session_id()) session_start();
        $actId = $this->input->post('act_id');
        $toUserId = $this->input->post('to_user_id');
        $comment = $this->input->post('comment');
        $this->load->model('t_act');

        echo $this->t_act->confirmUserByAct($actId, $_SESSION['user']->USER_ID, $toUserId, $comment)?'true':'false';
        $this->t_act->checkAndGrantCredit($actId, $toUserId);
    }

    public function actInsert(){
        $this->load->model('t_act');
        $title = $this->input->post('title');
        $grade = $this->input->post('grade');
        $location = $this->input->post('location');
        $start_on = $this->input->post('start_on');
        $end_on = $this->input->post('end_on');
        $reg_start_on = $this->input->post('reg_start_on');
        $reg_end_on = $this->input->post('reg_end_on');
        $desc = $this->input->post('desc');
        $credit = $this->input->post('credit');
        $max_part = $this->input->post('max_part');
        $min_part = $this->input->post('min_part');
        try {
            $this->t_act->insertAct($title,$grade,$location,$start_on,$end_on,$reg_start_on,$reg_end_on,$desc,$credit,$max_part,$min_part);
            echo "添加成功";
        } catch (Exception $e) {
            echo "添加异常";
        }
    }

}