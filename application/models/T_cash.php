<?php
class T_cash extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function addCash($productId){
		if (!session_id()) session_start();
		date_default_timezone_set("PRC");
		$product=$this->getProduct($productId);
		
		if($product[0]->STOCK<=0){
			return "库存不足无法兑换！";
		}
		if($_SESSION['user']->CREDIT<$product[0]->GRADE){
			return "积分不足";
		}else{
			$this->db->set('product_id',$productId);
			$this->db->set('user_id',$_SESSION['user']->USER_ID);
			$this->db->set('status',0);
			$this->db->set('createtime',date("Y-m-d H:i:s"));
			$this->db->insert('t_cash');
			
			$this->db->set(array('credit' => $_SESSION['user']->CREDIT-$product[0]->GRADE));
			$this->db->where('user_id',$_SESSION['user']->USER_ID);
			$this->db->update('t_user');
			
			$this->db->set(array('stock' => $product[0]->STOCK-1,'count'=>$product[0]->COUNT+1));
			$this->db->where('id',$productId);
			$this->db->update('t_product');
			
			$_SESSION['user']->CREDIT=$_SESSION['user']->CREDIT-$product[0]->GRADE;
			
			return "true";
		}
	}
	public function getProduct($productId){
		$query = $this->db->get_where('t_product',array('ID' => $productId));
		return $query->result();
	}
	public function selectCash($all){
		if (!session_id()) session_start();
		$this->db->select('t_cash.*,t_product.NAME as productName,t_product.GRADE');
		$this->db->from('t_cash');
		$this->db->join('t_product','t_cash.PRODUCT_ID = t_product.ID');
		if(!$all){
			$this->db->where('t_cash.USER_ID',$_SESSION['user']->USER_ID);
		}else{
			$this->db->select('t_cash.*,t_product.NAME as productName,t_product.GRADE,t_user.CODE,t_user.NICKNAME');
			$this->db->join('t_user','t_user.USER_ID = t_cash.USER_ID');
		}
		$this->db->order_by('t_cash.CREATETIME','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function updateCash($id){
		if (!session_id()) session_start();
		$this->load->model('t_system');
		date_default_timezone_set("PRC");
		$this->db->set(array('status' => 1,'operate_id'=>$_SESSION['user']->USER_ID,'updatetime'=>date("Y-m-d H:i:s")));
		$this->db->where('id',$id);
		$this->db->update('t_cash');
		$user=$this->getUserByCashId($id);
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,"确认兑换礼品",$user[0]->NICKNAME);
	}
	public function getUserByCashId($id){
		$this->db->select('t_user.*');
		$this->db->from('t_user');
		$this->db->join('t_cash','t_cash.USER_ID = t_user.USER_ID');
		$this->db->where('t_cash.id',$id);
		$query = $this->db->get();
		return $query->result();
	}
	
}