<?php
class Common extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	/**
	 * 退出
	 */
	public function logout()
	{
		if (!session_id()) session_start();
		unset($_SESSION['user']);
		redirect(base_url('portal'));
	}
	/**
	 * 管理员登录
	 */
	public function loginForm($user_name,$user_password){
		if (!session_id()) session_start();
		$this->load->model('t_user');
		$arr=$this->t_user->get_admin($user_name,$user_password);
		if(!$arr){
			echo "false";
		}else{
			//if($arr[0] -> AUTHORITY=='0' or $arr[0] -> AUTHORITY=='1' or $arr[0] -> AUTHORITY=='2'){
				$_SESSION['user'] =$arr[0];
				//$this->session->set_userdata('user',$arr);
				//redirect(base_url('portal'));
				echo "true";
			//}else{
			//	$this->load->view('club/login');
			//}
		}
	}
	/**
	 * session过滤
	 * @param unknown_type $viewStr
	 */
	public function toPage($viewStr,$date){
		if (!session_id()) session_start();
		$this->load->model('t_user');
		$this->load->model('t_message');
		if (isset($_SESSION['user'])){
			if($viewStr =='club/login'){
				redirect(base_url('club'));
			}else{
				if($viewStr =='club/index'){
					$menus=$this->t_user->get_menu($_SESSION['user']->AUTHORITY,null);
					foreach ($menus as $menu){
						$menu->menu=$this->t_user->get_menu($_SESSION['user']->AUTHORITY,$menu->ID);
					}
					$arr=array(
							'user' =>$_SESSION['user'],
							'menu' =>$menus,
							'mesCount'=>$this->t_message->messageTotalNum()
					);
					$this->load->view('club/index',$arr);
				}else{
					$date['user']=$_SESSION['user'];
					$this->load->view($viewStr,$date);
				}
			}
		}else{
			$this->load->view('club/login');
		}
	}
	public function get_user(){
		if (!session_id()) session_start();
		$this->load->model('t_user');
		$arr=$this->t_user->get_user($_SESSION['user']->USER_ID);
		return $arr[0];
	}
	
}