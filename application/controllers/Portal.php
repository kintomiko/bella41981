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
        $this->load->model('t_act');
        $arr=array(
            'actList'=>$this->t_act->getActListToPortal()
        );
		$this->load->view('index',$arr);
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
     * 活动列表页
     */
	public function activity(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $this->load->library('pagination');
        $title='';
        $pageSize=1;
        if($this->input->post('title')!=""){
            $title = $this->input->post('title');
        }
        if($this->uri->segment(3)!=""){
            $pageSize = $this->uri->segment(3);
        }
        $config['total_rows'] = $this->t_act->getActTotal($title);//这个值是数据的总数
        $config['per_page'] = '10';
        $config['first_link'] = "首页";
        $config['last_link'] = "尾页";
        $config['prev_link'] = '<';
        $config['next_link'] = '>';
        $config['first_tag_open'] = '<li>';//自定义起始页链接
        $config['first_tag_close'] = '</li> ';
        $config['last_tag_open'] = '<li>';//自定义结束页链接
        $config['last_tag_close'] = '</li> ';
        $config['prev_tag_open'] = '<li>';//自定义上一页链接
        $config['prev_tag_close'] = '</li> ';
        $config['next_tag_open'] = '<li>';//自定义下一页链接
        $config['next_tag_close'] = '</li> ';
        $config['cur_tag_open'] = '<li><a class="active current">';//自定义当前页链接
        $config['cur_tag_close'] = '</a></li> ';
        $config['num_tag_open'] = '<li>';//自定义数字链接
        $config['num_tag_close'] = '</li> ';
        $config['base_url']	= base_url('portal/activity');
        $config['use_page_numbers'] = TRUE;
        $config['attributes']['rel'] = FALSE;
        $this->pagination->initialize($config);
        $arr=array(
            'actList'=>$this->t_act->getActPage($config['per_page'],$pageSize,$title),
            'title'=>$title
        );
        $this->load->view('portal/activity',$arr);
    }

    /**
     * 活动详情页
     */
    public function activityInfo(){
        if (!session_id()) session_start();
        $this->load->model('t_act');
        $id = $this->uri->segment(3);
        $arr=array(
            'act'=>$this->t_act->getActInfo($id),
            'partList'=>$this->t_act->getActPartList($id)
        );
        $this->load->view('portal/actInfo',$arr);
    }

    /**
     * 发起活动页
     */
    public function sponsor(){
        $this->load->model('t_act');
        $this->load->model('t_user');
        $arr=array(
            'actTemLIst'=>$this->t_act->getActTemList(),
            'actTemType'=>$this->t_act->getActTemType(),
            'province'=>$this->t_user->get_province(true)
        );
        $this->load->view('portal/sponsor',$arr);
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
     * 发起活动
     */
    public function sponAct(){
        $this->load->model('t_act');
        $temId=$this->input->post('temId');
        $title = $this->input->post('title');
        $brief=$this->input->post('brief');
        $imgUrl=$this->input->post('imgUrl');
        $min_part=$this->input->post('min_part');
        $province_code=$this->input->post('province_code');
        $location=$this->input->post('location');
        $start_on=$this->input->post('start_on');
        $end_on=$this->input->post('end_on');
        $reg_start_on=$this->input->post('reg_start_on');
        $reg_end_on=$this->input->post('reg_end_on');
        $desc=$this->input->post('desc');
        $result=$this->t_act->addAct($temId,$title,$brief,$imgUrl,$min_part,
            $province_code,$location,$start_on,$end_on,$reg_start_on,$reg_end_on,$desc);
        echo json_encode($result);
    }

    /**
     * 参加活动
     */
    public function enterAct(){
        $this->load->model('t_act');
        $result=(object)array();
        $actId=$this->input->post("actId");
        $result=$this->t_act->enterAct($actId);
        echo json_encode($result);
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
