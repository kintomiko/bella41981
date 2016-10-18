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
                                    <a id="musicList" href="<?php echo base_url('bella/musicList');?>">音频列表</a> <span class="divider"></span>
                                </li>
                                <li>
                                    	音频编辑
                                </li>
                            </ul>
                        </div>
                    </nav>
		<div class="container-fluid">
			<div class="row-fluid">
			<form action="<?php echo base_url('bella/addMusic');?>" method="post" id="musicForm" style="margin-bottom: 0;">
				<fieldset>
				<div class="btn-toolbar">
					<button class="btn btn-primary" type="submit">
						<i class="icon-save"></i> 保存
					</button>
					<div class="btn-group"></div>
				</div>
				<div class="well" style="height:410px;overflow-x: auto; overflow-y: auto;">
					<div id="myTabContent" class="tab-content">
						<div id ="error_msg" style="display: none; margin-left: 160px; height: 40px; color:red; font-size: 15px;" ></div>
						<div class="tab-pane active in" id="home">
								<div style="float:left;padding-left:50px;">
									<label>歌曲名称</label>
									<input name="music_id" id="music_id" type="hidden" value="<?php echo $music->MUSIC_ID ;?>"/>
									<input type="text" id="title" name="title" class="input-xlarge" value="<?php echo $music->TITLE ;?>"/> 
									<label>年份</label>
									<!-- <div class="controls input-append date form_time" data-date="" data-link-field="dtp_input3">
					                    <input type="text" name="date" style="width:100px;" readonly>
					                    <span class="add-on"><i class="icon-remove"></i></span>
										<span class="add-on"><i class="icon-th"></i></span>
					                </div>  -->
					                <input type="text" style="width:100px;" name="year" class="input-xlarge" placeholder="1981" value="<?php echo $music->YEAR ;?>"/> 
									<label>分类</label> 
									<select class="form-control" style="width:115px;" name="type" value="<?php echo $music->TYPE ;?>">
									  <option <?php if($music->TYPE=="未发表"){?>selected<?php }?>>未发表</option>
									  <option <?php if($music->TYPE=="专辑"){?>selected<?php }?>>专辑</option>
									  <option <?php if($music->TYPE=="独唱"){?>selected<?php }?>>独唱</option>
									  <option <?php if($music->TYPE=="好声音"){?>selected<?php }?>>好声音</option>
									  <option <?php if($music->TYPE=="对唱"){?>selected<?php }?>>对唱</option>
									  <option <?php if($music->TYPE=="哼唱"){?>selected<?php }?>>哼唱</option>
									  <option <?php if($music->TYPE=="青歌赛"){?>selected<?php }?>>青歌赛</option>
									  <option <?php if($music->TYPE=="影视集锦"){?>selected<?php }?>>影视集锦</option>
									  <option <?php if($music->TYPE=="音乐剧《金沙》"){?>selected<?php }?>>音乐剧《金沙》</option>
									  <option <?php if($music->TYPE=="甄嬛传"){?>selected<?php }?>>甄嬛传</option>
									  <option <?php if($music->TYPE=="合唱"){?>selected<?php }?>>合唱</option>
									  <option <?php if($music->TYPE=="姚峰声乐作品选"){?>selected<?php }?>>姚峰声乐作品选</option>
									  <option <?php if($music->TYPE=="十大旅游宣传曲"){?>selected<?php }?>>十大旅游宣传曲</option>
									</select>
									<label>是否原唱</label>
									<input class="input-radio" type="radio" name="original" value="原唱" <?php if($music->ORIGINAL=="原唱"){?>checked<?php }?>/>是&nbsp;&nbsp;
									<input class="input-radio" type="radio" name="original" value="" <?php if($music->ORIGINAL=="" || $music->ORIGINAL==null){?>checked<?php }?>/>否
									<label>备注</label>
									<textarea rows="2" name="remark" class="input-xlarge"><?php echo $music->REMARK ;?></textarea>
								</div>
								<div style="float:left;padding-left:40px;">
									<label>试听下载链接</label> 
									<input type="text" name="url" class="input-xlarge" placeholder="" value="<?php echo $music->URL ;?>"/> 
									<label>无损链接</label> 
									<input type="text" name="lossless" class="input-xlarge" placeholder="" value="<?php echo $music->LOSSLESS ;?>"/> 
									<a id="paramA" href="<?php echo base_url('bella/getMusic');?>"></a>
								</div>
						</div>
					</div>
				</div>
				</fieldset>
			</form>
		</div>
	</div>
	<script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
	<script src="<?php echo base_url('assets/js/prettify.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/jquery.bootstrap.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/site.js');?>" type="text/javascript"></script>
	<script src="<?php echo base_url('assets/js/musicAdd.js');?>" type="text/javascript"></script>
</body>
</html>


