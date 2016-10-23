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

    public function confirm(){
        if (!session_id()) session_start();
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
        $this->load->view('act/confirm', $arr);
    }

    public function doConfirm(){
        if (!session_id()) session_start();
        $actId = $this->input->post('act_id');
        $toUserId = $this->input->post('to_user_id');
        $comment = $this->input->post('comment');
        $this->load->model('t_act');
        if(count($this->t_act->getConfirm($actId, $_SESSION['user']->USER_ID, $toUserId))>0){
            echo "false";
            return;
        }
        echo $this->t_act->insertConfirm($actId, $_SESSION['user']->USER_ID, $toUserId, $comment)?'true':'false';
        $this->t_act->checkAndGrantCredit($actId, $toUserId);
    }

}