<?php
class Club extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	/**
	 * 后台登陆页
	 */
	public function login(){
		$this->load->model('common');
		$this->common->toPage('club/login','');
	}
	/**
	 * 后台主页
	 */
	public function index(){
		$this->load->model('common');
		$this->common->toPage('club/index','');
	}
	/**
	 * 注册页面
	 */
	public function reg(){
		$this->load->model('t_user');
		$arr=array(
				'province'=>$this->t_user->get_province(true)
		);
		$this->load->view('club/reg',$arr);
	}
	/**
	 * 退出
	 */
	public function logout()
	{
		$this->load->model('common'); 
		$this->common->logout();
	}
	public function forgetPwd(){
		$this->load->view('club/forgetPwd');
	}
	public function foundPwd(){
		$this->load->model('t_user'); 
		$name = $this->input->post('name');
		$email = $this->input->post('email');
		try {
			$user=$this->t_user->foundPwd($name,$email);
			if(count($user)>0){
				$this->email($user[0]->EMAIL,"姚贝娜全国后援会","<a href='http://www.bella41981.com'>http://www.bella41981.com</a> 姚贝娜全国后援会官方网站提醒您，您的登录密码为：".$user[0]->PASSWORD,"HTML");
				echo "true";
			}else{
				echo "false";
			}
		} catch (Exception $e) {
			echo "error";
		}
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
	public function dashboard(){
		$this->load->model('t_user');
		$arr=array(
				'province'=>$this->t_user->get_province(false),
				'countUserAll'=>$this->t_user->getCountUser(true),
				'countUser'=>$this->t_user->getCountUser(false),
				'nextGrade'=>$this->t_user->getNextGrade()
		);
		$this->load->view('club/dashboard',$arr);
	}
	public function adminAdd(){
		$this->load->model('t_user');
		$arr=array(
				'province'=>$this->t_user->get_province(true)
		);
		$this->load->view('club/user/adminAdd',$arr);
	}
	
	public function setting(){
		$this->load->view('club/user/setting');
	}
	/**
	 * 用户信息
	 */
	public function userInfo(){
		$this->load->model('common'); 
		$this->load->model('t_user');
		$user=$this->common->get_user();
		$auth=explode(',',$user->PROVINCE_AUTH);
		$provinceName='';
		for($i=0;$i<count($auth);$i++){
			$province=$this->t_user->getProvinceByCode($auth[$i]);
			if(count($province)>0){
				$provinceName=$provinceName.' '.$province[0]->name;
			}
		}
		$arr=array(
				'user'=>$user,
				'province'=>$provinceName
		);
		$this->load->view('club/user/userInfo',$arr);
	}
	public function getUserInfo(){
		$this->load->model('t_user');
		$userId= $this->input->get('id');
		$user=$this->t_user->get_user($userId);
		$arr=array(
				'user'=>$user[0]
		);
		$this->load->view('club/user/getUserInfo',$arr);
	}
	public function getAdminInfo(){
		$this->load->model('t_user');
		$userId= $this->input->get('id');
		$user=$this->t_user->get_user($userId);
		$arr=array(
				'user'=>$user[0]
		);
		$this->load->view('club/user/getAdminInfo',$arr);
	}
	public function approvalInfo(){
		$this->load->model('t_user');
		$userId= $this->input->get('id');
		$user=$this->t_user->get_user($userId);
		$arr=array(
				'user'=>$user[0]
		);
		$this->load->view('club/user/approvalInfo',$arr);
	}
	/**
	 * 用户信息编辑
	 */
	public function updateUser(){
		if (!session_id()) session_start();
		$this->load->model('t_user');
		$user_id = $this->input->post('user_id');
		$nickname = $this->input->post('nickname');
		$sex = $this->input->post('sex');
		$birthday = $this->input->post('birthday');
		$phone = $this->input->post('phone');
		$qq = $this->input->post('qq');
		$sina = $this->input->post('sina');
		$baidu = $this->input->post('baidu');
		$email = $this->input->post('email');
		$remark = $this->input->post('remark');
		try {
			$this->t_user->update_user($user_id,$nickname,$sex,$birthday,$phone,$qq,$sina,$baidu,$email,$remark);
			//$this->email($email,"姚贝娜全国后援会","<a href='http://www.bella41981.com'>http://www.bella41981.com</a> 姚贝娜全国后援会官方网站提醒您账户修改成功！","HTML");
			//$_SESSION['user']=$this->t_user->get_user($user_id);
			echo "修改成功";
		} catch (Exception $e) {
			echo "修改失败";
		}
	}
	public function updatePassword(){
		$this->load->model('t_user');
		$password = $this->input->post('password');
		$oldpassword = $this->input->post('oldpassword');
		try {
			$param=$this->t_user->updatePassword($oldpassword,$password);
			if($param){
				echo "true";
			}else{
				echo "error";
			}
		} catch (Exception $e) {
			echo "false";
		}
	}
	public function adminAddSave(){
		$this->load->model('t_user');
		$user_id = $this->input->post('user_id');
		$auth = $this->input->post('auth');
		try {
			$this->t_user->adminAddSave($user_id,implode(',',$auth));
			echo "true";
		} catch (Exception $e) {
			echo "false";
		}
	}
	public function findUserByCode(){
		$this->load->model('t_user');
		$code = $this->input->post('code');
		try {
			$param=$this->t_user->findUserByCode($code);
			if(count($param)>0){
				if(in_array(1,explode(',',$param[0]->AUTHORITY))){
					echo "true";
				}else{
					echo json_encode($param[0]);
				}
			}else{
				echo "null";
			}
			//echo "{id:\"".$param[0]->USER_ID."\",nickname:\"".$param[0]->NICKNAME."\",province:\"".$param[0]->CLUB."\"}";
		} catch (Exception $e) {
			echo "false";
		}
	}
	public function delAdmin(){
		$this->load->model('t_user');
		$userId = $this->input->post('id');
		try {
			$this->t_user->delAdmin($userId);
			echo "true";
		} catch (Exception $e) {
			echo "false";
		}
	}
	public function toUpdateUser(){
		$this->load->model('t_user');
		$userId= $this->input->get('id');
		$user=$this->t_user->get_user($userId);
		$arr=array(
				'user'=>$user[0]
		);
		$this->load->view('club/user/updateUser',$arr);
	}
	public function toUpdateAdmin(){
		$this->load->model('t_user');
		$userId= $this->input->get('id');
		$user=$this->t_user->get_user($userId);
		$arr=array(
				'user'=>$user[0]
		);
		$this->load->view('club/user/updateAdmin',$arr);
	}
	public function updateUserByAdmin(){
		$this->load->model('t_user');
		$userId= $this->input->post('user_id');
		$code= $this->input->post('code');
		$year= $this->input->post('year');
		try {
			$this->t_user->updateUserByAdmin($userId,$year,$code);
			echo "修改成功";
		} catch (Exception $e) {
			echo "修改异常！";
		}
	}
	public function approvalUser(){
		$this->load->model('t_user');
		$userId= $this->input->post('user_id');
		$status= $this->input->post('status');
		$code= $this->input->post('code');
		$email= $this->input->post('email');
		$user=$this->t_user->get_user($userId);
		if($user[0]->STATUS==0){
			try {
				$param=$this->t_user->approvalUser($userId,$status,$code,$user[0]->NICKNAME);
				if($param){
					$this->email($email,"姚贝娜全国后援会","<a href='http://www.bella41981.com'>http://www.bella41981.com</a> 姚贝娜全国后援会官方网站提醒您，账号".$user[0]->NAME."会员申请审核成功！初始登录密码为19810926，请尽快修改您的登录密码！","HTML");
				}else{
					$this->email($email,"姚贝娜全国后援会","<a href='http://www.bella41981.com'>http://www.bella41981.com</a> 姚贝娜全国后援会官方网站提醒您，账号".$user[0]->NAME."因信息填写有误，已驳回，请重新申请！","HTML");
				}
			} catch (Exception $e) {
				echo "false";
			}
		}else{
			echo "true";
		}
	}
	/**
	 * 账号存在验证
	 */
	public function existUserName(){
		$this->load->model('t_user');
		$name = $this->input->post('name');
		$arr=$this->t_user->exist_userName($name);
		if($arr){
			echo "true";
		}else{
			echo "false";
		}
	}
	/**
	 * 昵称存在验证
	 */
	public function existUserNickname(){
		$this->load->model('t_user');
		$nickname = $this->input->post('nickname');
		$arr=$this->t_user->exist_userNickName($nickname);
		if($arr){
			echo "true";
		}else{
			echo "false";
		}
	}
	public function existInfoNickname(){
		if (!session_id()) session_start();
		$this->load->model('t_user');
		$nickname = $this->input->post('nickname');
		if($_SESSION['user']->NICKNAME==$nickname){
			echo "false";
		}else{
			$arr=$this->t_user->exist_userNickName($nickname);
			if($arr){
				echo "true";
			}else{
				echo "false";
			}
		}
	}
	public function existUserEmail(){
		$this->load->model('t_user');
		$email = $this->input->post('email');
		$arr=$this->t_user->exist_userEmail($email);
		if($arr){
			echo "true";
		}else{
			echo "false";
		}
	}
	
	/**
	 * 申请账号
	 */
	public function applyUser(){
		$this->load->model('t_user');
		$name = $this->input->post('name');
		$nickname = $this->input->post('nickname');
		$email = $this->input->post('email');
		$realname = $this->input->post('realname');
		$phone = $this->input->post('phone');
		$qq = $this->input->post('qq');
		$sina = $this->input->post('sina');
		$baidu = $this->input->post('baidu');
		$year = $this->input->post('year');
		$province = $this->input->post('province');
		$remark = $this->input->post('remark');
		try {
			$this->t_user->apply_user($name,$nickname,$email,$realname,$phone,
					$qq,$sina,$baidu,$year,$province,$remark);
			echo "提交申请成功，请耐心等待管理员审核，注意查收邮件！";
		} catch (Exception $e) {
			echo "提交申请异常！";
		}
	}
	/**
	 * 消息
	 */
	public function messages(){
		$this->load->model('t_message');
		$arr=array(
				'myMes'=>$this->t_message->messageListByType(1),
				'vipMes'=>$this->t_message->messageListByType(2)
		);
		
		$this->load->view('club/message/messages',$arr);
		
	}
	public function messageUpdate(){
		$this->load->model('t_message');
		$id = $this->input->post('id');
		try {
			$this->t_message->messageUpdate($id);
			echo "true";
		} catch (Exception $e) {
			echo "false";
		}
	}
	/**
	 * 会员列表
	 */
	public function userList(){
		$this->load->model('t_user');
		$arr=array(
				'user'=>$this->t_user->get_user_list(2,1)
		);
		$this->load->view('club/user/userList',$arr);
	}
	public function adminList(){
		$this->load->model('t_user');
		$userList=$this->t_user->get_user_list(1,1);
		foreach ($userList as $row){
			$auth=explode(',',$row->PROVINCE_AUTH);
			$provinceName='';
			for($i=0;$i<count($auth);$i++){
				$province=$this->t_user->getProvinceByCode($auth[$i]);
				if(count($province)>0){
					$provinceName=$provinceName.' '.$province[0]->name;
				}
			}
			$row->PROVINCE_AUTH=$provinceName;
		}
		$arr=array(
				'user'=>$userList
		);
		$this->load->view('club/user/adminList',$arr);
	}
	public function approvalList(){
		$this->load->model('t_user');
		$arr=array(
				'user'=>$this->t_user->get_user_list(2,0)
		);
		$this->load->view('club/user/approvalList',$arr);
	}
	public function adminAuth(){
		$this->load->model('t_user');
		$user_id = $this->input->get('id');
		$user=$this->t_user->get_user($user_id);
		$arr=array(
				'province'=>$this->t_user->get_province(true),
				'user'=>$user[0],
				'province_auth'=>explode(',',$user[0]->PROVINCE_AUTH)
		);
		$this->load->view('club/user/adminAuth',$arr);
	}
	public function adminAuthSave(){
		$this->load->model('t_user');
		$user_id = $this->input->post('user_id');
		$auth = $this->input->post('auth');
		try {
			$this->t_user->adminAuthSave($user_id,implode(',',$auth));
			echo "true";
		} catch (Exception $e) {
			echo "false";
		}
	}
	/**
	 * 操作记录列表
	 */
	public function operateList(){
		$this->load->model('t_system');
		$arr=array(
				'operateList'=>$this->t_system->operateList()
		);
		$this->load->view('club/system/operateList',$arr);
	}
	/**
	 * 公告列表
	 */
	public function annoList(){
		$this->load->model('t_system');
		$arr=array(
				'annoList'=>$this->t_system->annoList()
		);
		$this->load->view('club/system/annoList',$arr);
	}
	public function cashList(){
		$this->load->model('t_cash');
		$arr=array(
				'cashList'=>$this->t_cash->selectCash(false)
		);
		$this->load->view('club/cash/cashList',$arr);
	}
	public function cashAdmin(){
		$this->load->model('t_cash');
		$arr=array(
				'cashList'=>$this->t_cash->selectCash(true)
		);
		$this->load->view('club/cash/cashAdmin',$arr);
	}
	public function confirmCash(){
		$this->load->model('t_cash');
		$id = $this->input->post('id');
		try {
			$this->t_cash->updateCash($id);
			echo "true";
		} catch (Exception $e) {
			echo "false";
		}
	}
	public function productList(){
		$this->load->model('t_product');
		$arr=array(
				'productList'=>$this->t_product->getProductList(true,false)
		);
		$this->load->view('club/product/productList',$arr);
	}
	public function productAdd(){
		$this->load->view('club/product/productAdd');
	}
	public function productInsert(){
		$this->load->model('t_product');
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$grade = $this->input->post('grade');
		$stock = $this->input->post('stock');
		$imageurl = $this->input->post('imageurl');
		$taobao = $this->input->post('taobao');
		$description = $this->input->post('description');
		if($id!=null && $id!=""){
			try {
				$this->t_product->updateProduct($id,$name,$grade,$stock,$imageurl,$taobao,$description);
				echo "编辑成功";
			} catch (Exception $e) {
				echo "编辑异常";
			}
		}else{
			try {
				$this->t_product->insertProduct($name,$grade,$stock,$imageurl,$taobao,$description);
				echo "添加成功";
			} catch (Exception $e) {
				echo "添加异常";
			}
		}
	}
	public function updateProduct(){
		$this->load->model('t_product');
		$id = $this->input->get('id');
		$product=$this->t_product->getProduct($id);
		$arr=array(
				'product'=>$product[0]
		);
		$this->load->view('club/product/productUpdate',$arr);
	}
	public function upOrDownPro(){
		$this->load->model('t_product');
		$id = $this->input->post('id');
		$status = $this->input->post('status');
		try {
			$this->t_product->upOrDownPro($id,$status);
			echo "true";
		} catch (Exception $e) {
			echo "false";
		}
	}
	/**
	 * 发送邮件方法
	 * @param unknown_type $account
	 * @param unknown_type $title
	 * @param unknown_type $content
	 * @param unknown_type $type
	 */
	public function email($account,$title,$content,$type){
		require_once "Smtp.php";
		//$this->load->model('smtp');
		$smtpserver = "smtp.163.com";//SMTP服务器
		$smtpserverport =25;//SMTP服务器端口
		$smtpusermail = "bellaclub@163.com";//SMTP服务器的用户邮箱
		$smtpemailto = $account;//发送给谁
		$smtpuser = "bellaclub@163.com";//SMTP服务器的用户帐号
		$smtppass = "19810926bella";//SMTP服务器的用户密码
		$mailtitle = $title;//邮件主题
		$mailcontent = $content;//邮件内容
		$mailtype = $type;//邮件格式（HTML/TXT）,TXT为文本邮件
		//************************ 配置信息 ****************************
		$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
		$smtp->debug = false;//是否显示发送的调试信息
		$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
	}
	
	
}
