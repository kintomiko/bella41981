<?php
class T_system extends MY_Model {
	public function __construct(){
		parent::__construct();
	}
	public function operateList(){
		$this->db->select('t_operate.*,t_user.NICKNAME');
		$this->db->from('t_operate');
		$this->db->join('t_user','t_user.USER_ID = t_operate.USER_ID');
		$this->db->order_by('t_operate.createdate','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function operateAdd($userId,$content,$obj){
		date_default_timezone_set("PRC");
		$this->db->set('user_id',$userId);
		$this->db->set('content',$content);
		$this->db->set('obj',$obj);
		$this->db->set('createdate',date("Y-m-d H:i:s"));
		$this->db->set('status',1);
		$this->db->insert('t_operate');
	}
}