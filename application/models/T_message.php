<?php
class T_message extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	public function messageTotalNum(){
		$this->db->from('t_message');
		$this->db->where('t_message.TO',$_SESSION['user']->USER_ID);
		$this->db->where('t_message.STATUS',2);
		return $this->db->count_all_results();
	}
	public function messageListByType($type){
		if (!session_id()) session_start();
		$this->db->select('t_message.*');
		$this->db->from('t_message');
		$this->db->where('t_message.TO',$_SESSION['user']->USER_ID);
		$this->db->where('t_message.STATUS',2);
		$this->db->where('t_message.TYPE',$type);
		$this->db->order_by('t_message.CREATETIME', 'DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function messageUpdate($id){
		$this->db->set(array('status' => 1));
		$this->db->where('id',$id);
		$this->db->update('t_message');
	}
}