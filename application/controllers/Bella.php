<?php
class Bella extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
	}
	/**
	 * 根据时间记事页
	 */
	public function eventToTime(){
		$this->load->model('fore');
		//$arr=array(
		//		'jsonStr' =>$this->fore->eventToTimeJson()
		//);
		$this->fore->eventToTimeJson();
		$this->load->view('bella/eventToTime');
	}
	/**
	 * 二傻视频列表页
	 */
	public function videoList(){
		//session_start();
		$this->load->model('t_video');
		$this->load->model('common');
		//$this->load->library('pagination');
		
		/*$this->input->post('date');
		$config['total_rows'] = $this->t_video->total_video();//这个值是数据的总数
		$config['per_page'] = '2';
		$config['first_link'] = "|<";
		$config['last_link'] = ">|";
		$config['prev_link'] = "<<";
		$config['next_link'] = ">>";
		$config['first_tag_open'] = '<li>';//自定义起始页链接
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';//自定义结束页链接
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';//自定义上一页链接
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';//自定义下一页链接
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a style="color:red;">';//自定义当前页链接
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';//自定义数字链接
		$config['num_tag_close'] = '</li>';
		$config['base_url']	= base_url('back/videoList');
		if($this->input->post('date')){
			$date=$this->input->post('date');
			$config['per_page'] = $this->t_video->total_video();
		}
		$this->pagination->initialize($config);*/
		$arr=array(
					'videoList' =>$this->videoListData()
			);
		$this->common->toPage('back/bella/videoList',$arr);
	}
	/**
	 * 二傻音频列表
	 */
	public function musicList(){
		$this->load->model('t_music');
		$this->load->model('common');
		$arr=array(
				'musicList' =>$this->t_music->select_music()
		);
		$this->common->toPage('back/bella/musicList',$arr);
	}
	/**
	 * 二傻视频添加页
	 */
	public function videoAdd(){
		$this->load->model('common');
		$video = (object)array();
		$video->VIDEO_ID = "";
		$video->DATE = "";
		$video->TYPE = "";
		$video->LOCALE = "";
		$video->ACTIVITY_NAME = "";
		$video->REMARK = "";
		$video->TRACKS = "";
		$obj = (object)array();
		$obj->DESCRIPTION = "";
		$obj->URL = "";
		$video->URL[0]=$obj;
		$row=array(
				'video' =>$video
		);
		$this->common->toPage('back/bella/videoAdd',$row);
	}
	/**
	 * 二傻音频添加页
	 */
	public function musicAdd(){
		$this->load->model('common');
		$obj = (object)array();
		$obj->MUSIC_ID = "";
		$obj->TITLE = "";
		$obj->YEAR = "";
		$obj->TYPE = "";
		$obj->REMARK = "";
		$obj->URL = "";
		$obj->ORIGINAL = "";
		$obj->LOSSLESS="";
		$row=array(
				'music' =>$obj
		);
		$this->common->toPage('back/bella/musicAdd',$row);
	}
	/**
	 * 二傻音频修改页
	 */
	public function musicUpdate(){
		$this->load->model('t_music');
		$this->load->model('common');
		$arr=$this->t_music->get_musicById($this->uri->segment(3));
		if($arr!=null){
			$row=array(
					'music' =>$arr[0]
			);
			$this->common->toPage('back/bella/musicAdd',$row);
		}
	}
	/**
	 * 二傻视频修改页
	 */
	public function videoUpdate(){
		$this->load->model('t_video');
		$this->load->model('common');
		$video=$this->t_video->get_videoById($this->uri->segment(3));
		$video_url=$this->t_video->get_video_urlById($this->uri->segment(3));
		if($video!=null){
			if($video_url!=null){
				$video[0]->URL=$video_url;
			}else{
				$obj = (object)array();
				$obj->DESCRIPTION = "";
				$obj->URL = "";
				$video[0]->URL[0]=$obj;
			}
			$row=array(
					'video' =>$video[0]
			);
			$this->common->toPage('back/bella/videoAdd',$row);
		}
	}
	
	/**
	 * 二傻视频添加
	 */
	public function addVideo(){
		$this->load->model('t_video');
		$video_id = $this->input->post('video_id');
		$date = $this->input->post('date');
		$type = $this->input->post('type');
		$locale = $this->input->post('locale');
		$activityName = $this->input->post('activityName');
		$tracks = $this->input->post('tracks');
		$remark = $this->input->post('remark');
		$description = $this->input->post('description');
		$url = $this->input->post('url');
		if(strlen($video_id)>0){
			try {
				$this->t_video->update_video($date,$type,$locale,$activityName,$remark,$description,$url,$tracks,$video_id);
				echo "修改成功";
			} catch (Exception $e) {
				echo "修改失败";
			}
		}else{
			try {
				$this->t_video->inster_video($date,$type,$locale,$activityName,$remark,$description,$url,$tracks);
				echo "添加成功";
			} catch (Exception $e) {
				echo "添加失败";
			}
		}
	}
	/**
	 * 二傻音频添加
	 */
	public function addMusic(){
		$this->load->model('t_music');
		$music_id = $this->input->post('music_id');
		$title = $this->input->post('title');
		$year = $this->input->post('year');
		$type = $this->input->post('type');
		$remark = $this->input->post('remark');
		$url = $this->input->post('url');
		$original = $this->input->post('original');
		$lossless=$this->input->post('lossless');
		if(strlen($music_id)>0){
			try {
				$this->t_music->update_music($music_id,$title,$year,$type,$remark,$url,$original,$lossless);
				echo "修改成功";
			} catch (Exception $e) {
				echo "修改失败";
			}
		}else{
			try {
				$this->t_music->inster_music($title,$year,$type,$remark,$url,$original);
				echo "添加成功";
			} catch (Exception $e) {
				echo "添加失败";
			}
		}
	}
	/**
	 * 查询音频是否存在
	 */
	public function getMusic(){
		$this->load->model('t_music');
		$title = $this->input->post('title');
		$arr=$this->t_music->get_music($title);
		if($arr){
			echo true;
		}else{
			echo false;
		}
	} 
	/**
	 * 二傻视频列表数据
	 * @return unknown
	 */
	public function videoListData(){
		$this->load->model('t_video');
		$arr=$this->t_video->select_video();
		foreach ($arr as $row){
			$video_url=$this->t_video->select_video_url($row->VIDEO_ID);
			$urls="";
			for($i=0;$i<count($video_url);$i++){
				$urls=$urls."<a target=_Blank href=".$video_url[$i]->URL." >".$video_url[$i]->DESCRIPTION."</a> &nbsp;";
			}
			$row->VIDEO_URL=$urls;
		}
		return $arr;
	}
	
	/**
	 * 活动列表分页数据
	 */
	public function activityList(){
		$this->load->model('t_video');
		$this->load->library('pagination');
		$config['total_rows'] = $this->t_video->total_video();//这个值是数据的总数
		$config['per_page'] = '24';
		$config['first_link'] = "首页";
		$config['last_link'] = "尾页";
		$config['prev_link'] = '<';
		$config['next_link'] = '>';
		$config['first_tag_open'] = '<li>';//自定义起始页链接
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';//自定义结束页链接
		$config['last_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';//自定义上一页链接
		$config['prev_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';//自定义下一页链接
		$config['next_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li><a class="current">';//自定义当前页链接
		$config['cur_tag_close'] = '</a></li>';
		$config['num_tag_open'] = '<li>';//自定义数字链接
		$config['num_tag_close'] = '</li>';
		$config['base_url']	= base_url('bella/activityList');
		$this->pagination->initialize($config);
		$arr=array(
				'activity'=>$this->t_video->select_activity($config['per_page'],$this->uri->segment(3))
		);
		$this->load->view('index',$arr);
	}
	
	/**
	 * 2048游戏页
	 */
	public function bella2048(){
		$this->load->view('bella/bella2048');
	}
	
	/**
	 * 2048游戏排行页
	 */
	public function league2048(){
		$this->load->model('t_other');
		$arr=array(
				'league'=>$this->t_other->select_league()
		);
		$this->load->view('bella/league2048',$arr);
	}
	
	public function leagueSubmit(){
		$this->load->model('t_other');
		$league = $this->input->post('league');
		$nick= $this->input->post('nick');
		$arr=$this->t_other->select_league();
		$this->t_other->updata_league($arr[9]->ID,$league,$nick);
		return "提交成功";
	}
	public function leagueLast(){
		$this->load->model('t_other');
		$league=$this->t_other->select_league();
		echo $league[9]->FRACTION;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}
