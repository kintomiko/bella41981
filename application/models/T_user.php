<?php
class T_user extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	var $number;
	public function get_admin($user_name,$user_password){
		$query = $this->db->get_where('t_user',array('NAME' => $user_name,'PASSWORD' => $user_password,'STATUS'=>1));
		return $query->result();
	}
	public function get_user($user_id){
		$this->db->select('t_user.*,t_province.name as CLUB,t_province.num');
		$this->db->from('t_user');
		$this->db->join('t_province','t_user.PROVINCE_CODE = t_province.CODE');
		$this->db->where('t_user.USER_ID',$user_id);
		$query = $this->db->get();
		return $query->result();
	}
	public function updatePassword($oldpassword,$password){
		session_start();
		$arr=$this->get_user($_SESSION['user']->USER_ID);
		if($arr[0]->PASSWORD==$oldpassword){
			$this->db->set(array('password' => $password));
			$this->db->where('user_id',$_SESSION['user']->USER_ID);
			$this->db->update('t_user');
			return true;
		}else{
			return false;
		}
	}
	public function getNextGrade(){
		if (!session_id()) session_start();
		$this->db->select('t_grade.*');
		$this->db->from('t_grade');
		$this->db->where('t_grade.GRADE',$_SESSION['user']->GRADE+1);
		$query = $this->db->get();
		return $query->result();
	}
	public function adminAddSave($user_id,$auth){
		session_start();
		$this->load->model('t_system');
		$this->db->set(array('authority' => 1,'province_auth'=>$auth));
		$this->db->where('user_id',$user_id);
		$this->db->update('t_user');
		$user=$this->get_user($user_id);
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,"添加管理员",$user[0]->NICKNAME);
	}
	public function findUserByCode($code){
		$this->db->select('t_user.*,t_province.name as CLUB,t_province.num');
		$this->db->from('t_user');
		$this->db->join('t_province','t_user.PROVINCE_CODE = t_province.CODE');
		$this->db->where('t_user.CODE',$code);
		$query = $this->db->get();
		return $query->result();
	}
	public function delAdmin($userId){
		session_start();
		$this->load->model('t_system');
		$this->db->set(array('authority' => 2));
		$this->db->where('user_id',$userId);
		$this->db->update('t_user');
		$user=$this->get_user($userId);
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,"撤销管理员",$user[0]->NICKNAME);
	}
	public function get_province($param){
		if($param){
			$query = $this->db->get_where('t_province',array());
		}else{
			$query = $this->db->get_where('t_province',array('STATUS'=>1));
		}
		return $query->result();
	}
	public function getCountUser($type){
		if (!session_id()) session_start();
		$this->db->from('t_user');
		$this->db->where('t_user.STATUS',1);
		if($type==false){
			$this->db->where('t_user.PROVINCE_CODE',$_SESSION['user']->PROVINCE_CODE);
		}
		return $this->db->count_all_results();
	}
	public function exist_userName($name){
		$query = $this->db->get_where('t_user',array('NAME' => $name));
		return $query->result();
	}
	public function exist_userNickName($nickname){
		$query = $this->db->get_where('t_user',array('NICKNAME' => $nickname));
		return $query->result();
	}
	public function exist_userEmail($email){
		$query = $this->db->get_where('t_user',array('EMAIL' => $email));
		return $query->result();
	}
	public function update_user($user_id,$nickname,$sex,$birthday,$phone,$qq,$sina,$baidu,$email,$remark){
		$this->db->set(array('nickname' => $nickname,
							 'sex'=>$sex,
							 'birthday'=>$birthday,
							 'phone'=>$phone,
							 'qq'=>$qq,
							 'sina'=>$sina,
							 'baidu'=>$baidu,
							 'email'=>$email,
							 'remark'=>$remark));
		$this->db->where('user_id',$user_id);
		$this->db->update('t_user');
	}
	public function updateUserByAdmin($userId,$year,$code){
		session_start();
		$this->load->model('t_system');
		$this->db->set(array('code' => 'BK'.$year.substr($code,6,6)));
		$this->db->where('user_id',$userId);
		$this->db->update('t_user');
		$user=$this->get_user($userId);
		if(!in_array(1,explode(',',$user[0]->AUTHORITY))){
			$this->t_system->operateAdd($_SESSION['user']->USER_ID,"修改会员资料",$user[0]->NICKNAME);
		}else{
			$this->t_system->operateAdd($_SESSION['user']->USER_ID,"修改管理员资料",$user[0]->NICKNAME);
		}
		
	}
	public function approvalUser($userId,$status,$code,$nickname){
		session_start();
		$this->load->model('t_system');
		$param=false;
		if($status==2){
			$this->t_system->operateAdd($_SESSION['user']->USER_ID,"否决会员申请",$nickname);
			$this->db->where('user_id',$userId);
			$this->db->delete('t_user');
		}else{
			$param=true;
			date_default_timezone_set("PRC");
			$arr=$this->get_user($userId);
			$this->getNumber($arr[0]->num+1);
			$this->updateNumber($arr[0]->PROVINCE_CODE,$this->number);
			$this->addMessage($userId,null,1,'恭喜您已通过审核，成为姚贝娜全国后援会会员，请尽快修改您的登录密码！');
			$this->t_system->operateAdd($_SESSION['user']->USER_ID,"通过会员申请",$nickname);
			if($status==1){
				$this->db->set('code','BK'.date("Y").$this->number);
			}else{
				$this->db->set('code','BK'.$code.$this->number);
			}
			$this->db->set('status',1);
			$this->db->set('password','19810926');
			$this->db->set('in_date',date("Y-m-d H:i:s"));
			$this->db->where('user_id',$userId);
			$this->db->update('t_user');
		}
		return $param;
	}
	public function getNumber($num){
		$this->db->select('t_number.*');
		$this->db->from('t_number');
		$query = $this->db->get();
		$arr=$query->result();
		$a=true;
		foreach($arr as $row){
			
			if($row->NUMBER==substr($num,2,4)){
				$a=false;
				break;
			}
			//print $row->NUMBER.'  '.substr($num,2,4).'    ';
		}
		if($a==true){
			$this->number=$num;
		}else{
			$this->getNumber($num+1);
		}
	}
	public function updateNumber($code,$number){
		$this->db->set('num',$number);
		$this->db->where('code',$code);
		$this->db->update('t_province');
	}
	public function addMessage($userId,$fromId,$type,$content){
		date_default_timezone_set("PRC");
		$this->db->set('type',$type);
		$this->db->set('content',$content);
		$this->db->set('to',$userId);
		$this->db->set('from',$fromId);
		$this->db->set('status',2);
		$this->db->set('createtime',date("Y-m-d H:i:s"));
		$this->db->insert('t_message');
	}
	public function apply_user($name,$nickname,$email,$realname,$phone,
					$qq,$sina,$baidu,$year,$province,$remark){
		date_default_timezone_set("PRC");
		$this->db->set('name',$name);
		$this->db->set('nickname',$nickname);
		$this->db->set('email',$email);
		$this->db->set('password','123123');
		$this->db->set('realname',$realname);
		$this->db->set('phone',$phone);
		$this->db->set('qq',$qq);
		$this->db->set('sina',$sina);
		$this->db->set('baidu',$baidu);
		$this->db->set('code',$year);
		$this->db->set('province_code',$province);
		$this->db->set('remark',$remark);
		$this->db->set('status',0);
		$this->db->set('authority',2);
		$this->db->set('grade',1);
		$this->db->set('credit',0);
		$this->db->set('totalcredit',0);
		$this->db->set('signed',0);
		$this->db->set('create_time',date("Y-m-d H:i:s"));
		$this->db->insert('t_user');
		$arr=$this->getAdminListByProvince($province);
		foreach($arr as $row){
			$this->addMessage($row->USER_ID,null,2,'有新的会员申请，请尽快前往审核！');
		}
	}
	public function getAdminListByProvince($provinceCode){
		$this->db->select('t_user.USER_ID');
		$this->db->from('t_user');
		$this->db->like('t_user.AUTHORITY',1);
		$this->db->where('t_user.STATUS',1);
		$this->db->like('t_user.PROVINCE_AUTH',$provinceCode);
		$query = $this->db->get();
		return $query->result();
	}
	public function get_menu($authority,$parent){
		$this->db->select('t_menu.*');
		$this->db->from('t_menu');
		$this->db->join('t_role_menu','t_menu.ID = t_role_menu.MENU_ID');
		$this->db->where_in('t_role_menu.ROLE_CODE',explode(',',$authority));
		$this->db->where('t_menu.PARENT',$parent);
		$this->db->order_by('t_menu.ORDER', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function get_user_list($auth,$status){
		session_start();
		$this->db->select('t_user.*,t_province.name as CLUB');
		$this->db->from('t_user');
		$this->db->join('t_province','t_user.PROVINCE_CODE = t_province.CODE');
		if($auth==1){
			$this->db->where('t_user.AUTHORITY !=',2);
			$this->db->not_like('t_user.AUTHORITY',0);
		}
		//$this->db->where('t_user.AUTHORITY',$auth);
		$this->db->where('t_user.STATUS',$status);
		if(!in_array(0,explode(',',$_SESSION['user']->AUTHORITY))){
			$this->db->where_in('t_user.PROVINCE_CODE',explode(',',$_SESSION['user']->PROVINCE_AUTH));
		}
		$this->db->order_by('t_user.CREATE_TIME', 'ASC');
		$query = $this->db->get();
		return $query->result();
	}
	public function adminAuthSave($user_id,$auth){
		session_start();
		$this->load->model('t_system');
		$this->db->set('province_auth',$auth);
		$this->db->where('user_id',$user_id);
		$this->db->update('t_user');
		$user=$this->get_user($user_id);
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,"修改管理员管辖权限",$user[0]->NICKNAME);
	}
	public function getProvinceByCode($code){
		$this->db->select('t_province.name');
		$this->db->from('t_province');
		$this->db->where('t_province.CODE',$code);
		$query = $this->db->get();
		return $query->result();
	}
	public function foundPwd($name,$email){
		$query = $this->db->get_where('t_user',array('NAME' => $name,'EMAIL' => $email,'STATUS'=>1));
		return $query->result();
	}
}