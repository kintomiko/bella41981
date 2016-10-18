<?php
class T_product extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function getProductList($all,$hot){
		$this->db->select('t_product.*');
		$this->db->from('t_product');
		if(!$all){
			$this->db->where('t_product.status',1);
		}
		if($hot){
			$this->db->order_by('t_product.count','DESC');
			$this->db->limit(3);
		}else{
			$this->db->order_by('t_product.date','DESC');
		}
		$query = $this->db->get();
		return $query->result();
	}
	public function insertProduct($name,$grade,$stock,$imageurl,$taobao,$description){
		if (!session_id()) session_start();
		$this->load->model('t_system');
		date_default_timezone_set("PRC");
		$this->db->set('name',$name);
		$this->db->set('grade',$grade);
		$this->db->set('stock',$stock);
		$this->db->set('count',0);
		$this->db->set('imageurl',$imageurl);
		$this->db->set('taobao',$taobao);
		$this->db->set('description',$description);
		$this->db->set('status',0);
		$this->db->set('date',date("Y-m-d H:i:s"));
		$this->db->insert('t_product');
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,"添加商品",$name);
	}
	public function updateProduct($id,$name,$grade,$stock,$imageurl,$taobao,$description){
		if (!session_id()) session_start();
		$this->load->model('t_system');
		$this->db->set('name',$name);
		$this->db->set('grade',$grade);
		$this->db->set('stock',$stock);
		$this->db->set('imageurl',$imageurl);
		$this->db->set('taobao',$taobao);
		$this->db->set('description',$description);
		$this->db->where('id',$id);
		$this->db->update('t_product');
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,"修改商品信息",$name);
	}
	public function getProduct($id){
		$query = $this->db->get_where('t_product',array('ID' => $id));
		return $query->result();
	}
	public function upOrDownPro($id,$status){
		if (!session_id()) session_start();
		$this->load->model('t_system');
		date_default_timezone_set("PRC");
		$this->db->set('status',$status);
		$this->db->set('date',date("Y-m-d H:i:s"));
		$this->db->where('id',$id);
		$this->db->update('t_product');
		$str="";
		if($status==1){
			$str="上架";
		}else{
			$str="下架";
		}
		$product=$this->getProduct($id);
		$this->t_system->operateAdd($_SESSION['user']->USER_ID,$str."商品",$product[0]->NAME);
	}


}