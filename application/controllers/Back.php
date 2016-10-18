<?php
class Back extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	}
	/**
	 * 后台登陆页
	 */
	public function login(){
		$this->load->model('common');
		$this->common->toPage('back/login','');
	}
	/**
	 * 后台主页
	 */
	public function index(){
		$this->load->model('common');
		$this->common->toPage('back/index','');
	}
	/**
	 * 退出
	 */
	public function logout()
	{
		$this->load->model('common'); 
		$this->common->logout();
	}
	/**
	 * 管理员登录
	 */
	public function loginForm(){
		$this->load->model('common'); 
		$user_name = $this->input->post('username');
		$user_password = $this->input->post('password');
		$this->common->loginForm($user_name,$user_password);
	}
	
}
