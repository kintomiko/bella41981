<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>二傻视频添加</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap-datetimepicker.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/lib/jBreadcrumbs/css/BreadCrumb.css');?>" />
<script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap-datetimepicker.js');?>" type="text/javascript"></script>

<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<body class="">
	<!--<![endif]-->
	<div class="content">
		<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    Bella
                                </li>
                                <li>
                                    <a id="musicList" href="<?php echo base_url('bella/videoList');?>">视频总汇</a> <span class="divider"></span>
                                </li>
                                <li>
                                    	视频编辑
                                </li>
                            </ul>
                        </div>
                    </nav>
		<div class="container-fluid">
			<div class="row-fluid">
			<form action="<?php echo base_url('bella/addVideo');?>" method="post" id="videoForm">
				<div class="btn-toolbar">
					<button class="btn btn-primary" type="submit">
						<i class="icon-save"></i> 保存
					</button>
					<a href="#myModal" data-toggle="modal" class="btn" onclick="addvideoUrl()">添加链接</a>
					<div class="btn-group"></div>
				</div>
				<div class="well" style="height:410px;overflow-x: auto; overflow-y: auto;">
					<div id="myTabContent" class="tab-content">
						<div class="tab-pane active in" id="home">
						<input name="video_id" id="video_id" type="hidden" value="<?php echo $video->VIDEO_ID;?>"/>
								<div style="float:left;padding-left:50px;">
									<label>日期</label>
									<!-- <div class="controls input-append date form_time" data-date="" data-link-field="dtp_input3">
					                    <input type="text" name="date" style="width:100px;" readonly>
					                    <span class="add-on"><i class="icon-remove"></i></span>
										<span class="add-on"><i class="icon-th"></i></span>
					                </div>  -->
					                <input type="text" style="width:100px;" name="date" class="input-xlarge" value="<?php echo $video->DATE;?>" placeholder="1981-09-26"> 
									<label>类型</label> 
									<select class="form-control" style="width:115px;" name="type" value="<?php echo $video->TYPE ;?>">
									  <option <?php if($video->TYPE=="歌曲演唱"){?>selected<?php }?>>歌曲演唱</option>
									  <option <?php if($video->TYPE=="综艺节目"){?>selected<?php }?>>综艺节目</option>
									  <option <?php if($video->TYPE=="演唱会"){?>selected<?php }?>>演唱会</option>
									  <option <?php if($video->TYPE=="好声音"){?>selected<?php }?>>好声音</option>
									  <option <?php if($video->TYPE=="商业演出"){?>selected<?php }?>>商业演出</option>
									  <option <?php if($video->TYPE=="访谈"){?>selected<?php }?>>访谈</option>
									  <option <?php if($video->TYPE=="电台"){?>selected<?php }?>>电台</option>
									  <option <?php if($video->TYPE=="签售会"){?>selected<?php }?>>签售会</option>
									  <option <?php if($video->TYPE=="颁奖典礼"){?>selected<?php }?>>颁奖典礼</option>
									  <option <?php if($video->TYPE=="发布会"){?>selected<?php }?>>发布会</option>
									  <option <?php if($video->TYPE=="MusicRadio"){?>selected<?php }?>>MusicRadio</option>
									  <option <?php if($video->TYPE=="其它"){?>selected<?php }?>>其它</option>
									</select>
									<label>地点</label> 
									<input type="text" name="locale" value="<?php echo $video->LOCALE;?>" class="input-xlarge" placeholder="省份  城市"> 
									<label>名称</label>
									<input type="text" name="activityName" value="<?php echo $video->ACTIVITY_NAME;?>" class="input-xlarge"> 
									<label>备注</label>
									<textarea rows="2" name="remark" class="input-xlarge"><?php echo $video->REMARK;?></textarea>
								</div>
								<div id="videoUrl" style="float:left;padding-left:40px;">
									<label>演唱曲目</label> 
									<textarea rows="2" name="tracks" class="input-xlarge"><?php echo $video->TRACKS;?></textarea>
									<label>描述、地址</label> 
									<?php  foreach ($video->URL as $row){?>
									<div></br>
									<div style="float:left;">
									<input type="text"  name="description[]" value="<?php echo $row->DESCRIPTION;?>" class="input-xlarge" style="float:left;width:170px;" placeholder="描述">
									<input type="text" name="url[]" value="<?php echo $row->URL;?>" class="input-xlarge" style="float:left;width:450px;margin:0 5px;" placeholder="http://90zone.sinaapp.com"> 
									<a href="#myModal" style="float:left;" data-toggle="modal" class="btn deletevideoUrl" onclick="javascript: $(this).parent().parent().remove();">删除</a>
									</div>
									</div>
									<?php }?>
								</div>
								<a id="paramA" href="<?php echo base_url('bella/videoList');?>"></a>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
	<script src="<?php echo base_url('assets/js/prettify.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/jquery.bootstrap.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/site.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/videoAdd.js');?>" type="text/javascript"></script>
	</script>
</body>
</html>


