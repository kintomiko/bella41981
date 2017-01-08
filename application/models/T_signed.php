<?php
class T_signed extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function insertSigned(){
		session_start();
		$this->load->model('t_user');
		date_default_timezone_set("PRC");
		
		if($this->selectSigned($_SESSION['user']->USER_ID,date("Y-m-d"))){
			return "今日已签！";
		}
		
		$this->db->set('user_id',$_SESSION['user']->USER_ID);
		$this->db->set('date',date("Y-m-d"));
		$this->db->insert('t_signed');
		
		$this->insertCredit($_SESSION['user']->USER_ID,1);
		
		if($this->selectSigned($_SESSION['user']->USER_ID,date("Y-m-d",strtotime("-1 day")))){
			if($_SESSION['user']->SIGNED==10){
				$this->db->set(array('signed' => 1));
				$this->db->where('user_id',$_SESSION['user']->USER_ID);
				$this->db->update('t_user');
				$arr=$this->t_user->get_user($_SESSION['user']->USER_ID);
				$_SESSION['user']=$arr[0];
				return "签到成功，获得1积分！累计签到1天 ！";
			}else{
				$this->db->set(array('signed' => $_SESSION['user']->SIGNED+1));
				$this->db->where('user_id',$_SESSION['user']->USER_ID);
				$this->db->update('t_user');
				if($_SESSION['user']->SIGNED==9){
					$this->insertCredit($_SESSION['user']->USER_ID,10);
					$arr=$this->t_user->get_user($_SESSION['user']->USER_ID);
					$_SESSION['user']=$arr[0];
					return "签到成功，获得1积分！累计签到10天 ，额外奖励10积分！";
				}else{
					$arr=$this->t_user->get_user($_SESSION['user']->USER_ID);
					$_SESSION['user']=$arr[0];
					return "签到成功，获得1积分！累计签到".($_SESSION['user']->SIGNED)."天 ！";
				}
			}
		}else{
			$this->db->set(array('signed' => 1));
			$this->db->where('user_id',$_SESSION['user']->USER_ID);
			$this->db->update('t_user');
			$arr=$this->t_user->get_user($_SESSION['user']->USER_ID);
			$_SESSION['user']=$arr[0];
			return "签到成功，获得1积分！累计签到1天 ！";
		}
	}
	public function selectSigned($userId,$date){
		$query = $this->db->get_where('t_signed',array('USER_ID' => $userId,'DATE' => $date));
		if(count($query->result())>0){
			return true;
		}else{
			return false;
		}
	}
	public function insertCredit($userId,$credit){
		$this->load->model('t_user');
		$arr=$this->t_user->get_user($userId);
		$grade=$this->selectGrade($arr[0]->TOTALCREDIT+$credit);
		$this->db->set(array('credit' => $arr[0]->CREDIT+$credit,'totalcredit'=>$arr[0]->TOTALCREDIT+$credit,'grade'=>$grade));
		$this->db->where('user_id',$userId);
		$this->db->update('t_user');
	}
	public function selectGrade($credit){
		$this->db->select('t_grade.*');
		$this->db->from('t_grade');
		$query = $this->db->get();
		$a;
		foreach($query->result() as $row){
			if($credit>=$row->CREDIT){
				$a=$row->GRADE;
			}else{
				break;
			}
		}
		return $a;
	}
}