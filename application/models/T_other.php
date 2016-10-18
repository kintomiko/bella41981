<?php
class T_other extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->table_name = 't_league_2048';
		$this->id = 'id';
	}
	//查询2048排行
	public function select_league(){
		$this->db->select('t_league_2048.*');
		$this->db->from('t_league_2048');
		$this->db->order_by('t_league_2048.fraction','DESC');
		$query = $this->db->get();
		return $query->result();
	}
	public function updata_league($id,$league,$nick){
		$this->db->set(array('nickname' => $nick,
				'fraction'=>$league));
		$this->db->where('id',$id);
		$this->db->update('t_league_2048');
	}
	
	
	
}