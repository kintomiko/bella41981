<?php
class Portal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	/**
	 * 门户首页
	 */
	public function index(){
		if (!session_id()) session_start();
		$this->load->view('index');
	}
	/**
	 * 积分兑换页面
	 */
	public function shop(){
		if (!session_id()) session_start();
		$this->load->model('t_product');
		$arr=array(
				'product'=>$this->t_product->getProductList(false,false),
				'hotProduct'=>$this->t_product->getProductList(false,true)
		);
		$this->load->view('portal/shop',$arr);
	}
	/**
	 * 注册指南页面
	 */
	public function regGuide(){
		if (!session_id()) session_start();
		$this->load->view('portal/regGuide');
	}
	/**
	 * 积分说明
	 */
	public function numerical(){
		if (!session_id()) session_start();
		$this->load->view('portal/numerical');
	}
	/**
	 * 签到
	 */
	public function addSigned(){
		$this->load->model('t_signed');
		try {
			$str=$this->t_signed->insertSigned();
			echo $str;
		} catch (Exception $e) {
			echo "false";
		}
	}
	public function addCash(){
		if (!session_id()) session_start();
		$this->load->model('t_cash');
		$productId = $this->input->post('productId');
		$product=$this->t_cash->getProduct($productId);
		
		try {
			$str=$this->t_cash->addCash($productId);
			if($str=="true"){
				ob_start();
				$this->email($_SESSION['user']->EMAIL,'姚贝娜全国后援会',"<a href='http://www.bella41981.com'>http://www.bella41981.com</a> 姚贝娜全国后援会官方网站提醒您，".$product[0]->NAME."兑换成功！可<a href='".$product[0]->TAOBAO."'>前往下单</a>","HTML");
				ob_clean();
				echo $product[0]->NAME."兑换成功,可前往下单！";
			}else{
				echo $str;
			}
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
