<?php
class T_video extends MY_Model {
	public function __construct(){
		parent::__construct();
		$this->table_name = 't_video';
		$this->id = 'id';
	}
	//插入video信息
	public function inster_video($date,$type,$locale,$activityName,$remark,$descriptions,$urls,$tracks){
		$this->db->set('date',$date);
		$this->db->set('type',$type);
		$this->db->set('locale',$locale);
		$this->db->set('activity_name',$activityName);
		$this->db->set('tracks',$tracks);
		$this->db->set('remark',$remark);
		$this->db->insert('t_video');
		$video_id=$this->db->insert_id();
		for($i=0;$i<count($descriptions);$i++){
			if($descriptions[$i] !="" && $descriptions[$i] !=null){
				$this->inster_video_url($video_id,$descriptions[$i],$urls[$i]);
			}
		}
	}
	//插入video_url信息
	public function inster_video_url($ID,$description,$url){
		$this->db->set('VIDEO_ID',$ID);
		$this->db->set('DESCRIPTION',$description);
		$this->db->set('URL',$url);
		$this->db->insert('t_video_url');
	}
	//修改video信息
	public function update_video($date,$type,$locale,$activityName,$remark,$descriptions,$urls,$tracks,$video_id){
		$this->db->set(array('date' => $date,'type'=>$type,'locale'=>$locale,'activity_name'=>$activityName,'remark'=>$remark,'tracks'=>$tracks));
		$this->db->where('video_id',$video_id);
		$this->db->update('t_video');
		$this->delete_video_url($video_id);
		for($i=0;$i<count($descriptions);$i++){
			if($descriptions[$i] !="" && $descriptions[$i] !=null){
				$this->inster_video_url($video_id,$descriptions[$i],$urls[$i]);
			}
		}
	}
	//查询视频列表
	public function select_video(){
		$this->db->select('t_video.*');
		$this->db->from('t_video');
		//$this->db->like('date',$date);
		//$this->db->select('t_video.*,t_video_url.*');
		//$this->db->from('t_video');
		//$this->db->join('t_video_url','t_video.VIDEO_ID = t_video_url.VIDEO_ID');
		//$query =$this->db->limit($per_page,$page)->get();
		$query = $this->db->get();
		return $query->result();
	}
	//查询视频列表数据总数
	public function total_video(){
		$this->db->select('t_video.*');
		$this->db->from('t_video');
		//$this->db->select('t_video.*,t_video_url.*');
		//$this->db->from('t_video');
		//$this->db->join('t_video_url','t_video.VIDEO_ID = t_video_url.VIDEO_ID');
		$query =$this->db->get();
		return $query->num_rows();
	}
	//查询视频列表链接
	public function select_video_url($video_id){
		$this->db->select('t_video_url.*');
		$this->db->from('t_video_url');
		$this->db->where('t_video_url.VIDEO_ID',$video_id);
		$query = $this->db->get();
		return $query->result();
	}
	//查询视频信息
	public function get_videoById($VIDEO_ID){
		$query = $this->db->get_where('t_video',array('VIDEO_ID' => $VIDEO_ID));
		$video=$query->result();
		return $video;
	}
	//查询视频链接信息
	public function get_video_urlById($VIDEO_ID){
		$query = $this->db->get_where('t_video_url',array('VIDEO_ID' => $VIDEO_ID));
		$video_url=$query->result();
		return $video_url;
	}
	//删除视频链接
	public function delete_video_url($video_id){
		$this->db->where('video_id',$video_id);
		$this->db->delete('t_video_url');
	}
	//活动列表分页数据
	public function select_activity($limit,$segment){
		$this->db->select('*');
		$this->db->from('t_video');
		$query = $this->db->limit($limit,$segment)->get()->result();
		return $query;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}