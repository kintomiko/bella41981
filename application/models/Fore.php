<?php
class Fore extends MY_Model {
	
	/**
	 * 根据时间记事数据
	 */
	public function eventToTimeJson(){
		$jsonStr='{
				    "title": {
				        "media": {
				          "url": "", 
				          "caption": "首页图片标题", 
				          "credit": "首页图片简介"
				        }, 
				        "text": {
				          "headline": "内容标题", 
				          "text": "<p>&nbsp;&nbsp;&nbsp;&nbsp;内容简介部分</p>"
				        }
				    },      
				    "events": [';
		$this->load->model('t_video');
		$videoArr=$this->t_video->select_video();
		for ($i=0;$i<count($videoArr);$i++){
			if($i<20){
			if($i!=0){
				$jsonStr=$jsonStr.",";
			}
			$date=explode('-', $videoArr[$i]->DATE);
			$jsonStr=$jsonStr.'{
						        "media": {
						          "url": "",
						          "caption": "",
						          "credit": ""
						        },
						        "start_date": {
								  "month": "'.$date[1].'", 
          						  "day": "'.$date[2].'", 
						          "year": "'.$date[0].'"
						        },
						        "text": {
						          "headline": "'.$videoArr[$i]->ACTIVITY_NAME.'",
						          "text": ""
						        }
						      }';
			}
		}
		$jsonStr=$jsonStr."]}";
		//$myfile = fopen("assets/timeline.json", "w+") or die("Unable to open file!");
		//$txt = "Mickey Mouse\n";
		//fwrite($myfile, $jsonStr);
		//fclose($myfile);
	}
}
