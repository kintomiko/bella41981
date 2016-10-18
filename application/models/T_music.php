<?php
class T_music extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->table_name = 't_music';
		$this->id = 'id';
	}
	//查询音频列表
	public function select_music(){
		$this->db->select('t_music.*');
		$this->db->from('t_music');
		$query = $this->db->get();
		return $query->result();
	}
	//插入music信息
	public function inster_music($title,$year,$type,$remark,$url,$original,$lossless){
		$this->db->set('title',$title);
		$this->db->set('year',$year);
		$this->db->set('type',$type);
		$this->db->set('remark',$remark);
		$this->db->set('url',$url);
		$this->db->set('original',$original);
		$this->db->set('lossless',$lossless);
		$this->db->insert('t_music');
	}
	//查询音频是否存在
	public function get_music($title){
		$query = $this->db->get_where('t_music',array('TITLE' => $title));
		return $query->result();
	}
	//查询音频信息
	public function get_musicById($MUSIC_ID){
		$query = $this->db->get_where('t_music',array('MUSIC_ID' => $MUSIC_ID));
		return $query->result();
	}
	//修改music信息
	public function update_music($music_id,$title,$year,$type,$remark,$url,$original,$lossless){
		$this->db->set(array('title' => $title,
							 'year'=>$year,
							 'type'=>$type,
							 'remark'=>$remark,
							 'url'=>$url,
							 'original'=>$original,
							 'lossless'=>$lossless));
		$this->db->where('music_id',$music_id);
		$this->db->update('t_music');
	}
	
	
	
	
	
}