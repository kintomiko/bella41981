<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>姚贝娜全国后援会</title>
		<meta name="description" content="description">
		<meta name="author" content="DevOOPS">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="<?php echo base_url('assets/image/favicon.png');?>" >
		<link href="<?php echo base_url('assets/lib/plugins/bootstrap/bootstrap.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/lib/plugins/jquery-ui/jquery-ui.min.css');?>" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/portal/font-awesome.css');?>" media="screen">
		<link href="<?php echo base_url('assets/lib/plugins/fancybox/jquery.fancybox.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/lib/plugins/fullcalendar/fullcalendar.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/lib/plugins/xcharts/xcharts.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/lib/plugins/select2/select2.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/lib/plugins/justified-gallery/justifiedGallery.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/index/style_v1.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/lib/plugins/chartist/chartist.min.css');?>" rel="stylesheet">
		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
				<script src="http://getbootstrap.com/docs-assets/js/html5shiv.js"></script>
				<script src="http://getbootstrap.com/docs-assets/js/respond.min.js"></script>
		<![endif]-->
	</head>
<body>
<!--Start Header-->
<input id="base_url" type="hidden" value="<?php echo base_url();?>" />
<div id="screensaver">
	<canvas id="canvas"></canvas>
	<i class="fa fa-lock" id="screen_unlock"></i>
</div>
<div id="modalbox">
	<div class="devoops-modal">
		<div class="devoops-modal-header">
			<div class="modal-header-name">
				<span>Basic table</span>
			</div>
			<div class="box-icons">
				<a class="close-link">
					<i class="fa fa-times"></i>
				</a>
			</div>
		</div>
		<div class="devoops-modal-inner">
		</div>
		<div class="devoops-modal-bottom">
		</div>
	</div>
</div>
<header class="navbar">
	<div class="container-fluid expanded-panel">
		<div class="row">
			<div id="logo" class="col-xs-12 col-sm-2">
				<a href="portal">BellaClub</a>
			</div>
			<div id="top-panel" class="col-xs-12 col-sm-10">
				<div class="row">
					<div class="col-xs-8 col-sm-4">
					</div>
					<div class="col-xs-4 col-sm-8 top-panel-right">
						<ul class="nav navbar-nav pull-right panel-menu">
							<!-- <li class="hidden-xs">
								<a href="index.html" class="modal-link">
									<i class="fa fa-bell"></i>
									<span class="badge">7</span>
								</a>
							</li>
							<li class="hidden-xs">
								<a class="ajax-link" href="ajax/calendar.html">
									<i class="fa fa-calendar"></i>
									<span class="badge">7</span>
								</a>
							</li> -->
							<li class="hidden-xs">
								<a href="club/messages" class="ajax-link">
									<i class="fa fa-envelope"></i>
									<?php if($mesCount!=0){?>
										<span class="badge"><?php echo $mesCount;?></span>
									<?php }?>
								</a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle account" data-toggle="dropdown">
									<?php echo $user->NICKNAME ;?>
									<!-- <div class="avatar">
										<span class="welcome">Welcome</span>
										<span><?php echo $user->NICKNAME ;?></span>
									</div> -->
									<i class="fa fa-angle-down pull-right"></i>
									<div class="user-mini pull-right">
									</div>
								</a>
								<ul class="dropdown-menu" style="background-color:rgba(0, 0, 0, 0.7);">
									<li>
										<a href="club/userInfo" class="ajax-link">
											<i class="fa fa-user"></i>
											<span>个人资料</span>
										</a>
									</li>
									<li>
										<a href="club/setting" class="ajax-link">
											<i class="fa fa-cog"></i>
											<span>设置</span>
										</a>
									</li>
									<li>
										<a href="#" onclick="logout();">
											<i class="fa fa-power-off"></i>
											<span>退出</span>
										</a>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</header>
<!--End Header-->
<!--Start Container-->
<div id="main" class="container-fluid">
	<div class="row">
		<div id="sidebar-left" class="col-xs-2 col-sm-2">
			<ul class="nav main-menu">
				<li>
					<a href="club/dashboard" class="ajax-link">
						<i class="fa fa-dashboard"></i>
						<span class="hidden-xs">首页</span>
					</a>
				</li>
				<?php  foreach ($menu as $row){?>
				<?php if($row->menu){?>
					<li class="dropdown">
					<a href="#" class="dropdown-toggle">
						<i class="fa <?php echo $row->ICON;?>"></i>
						<span class="hidden-xs"><?php echo $row->NAME;?></span>
					</a>
					<ul class="dropdown-menu">
						<?php  foreach ($row->menu as $menu){?>
						<li><a class="ajax-link" href="<?php echo $menu->URL;?>"><?php echo $menu->NAME;?></a></li>
						<?php }?>
					</ul>
					</li>
				<?php }else{?>
					<li>
						<a class="ajax-link" href="<?php echo $row->URL;?>">
						<i class="fa <?php echo $row->ICON;?>"></i>
						<span class="hidden-xs"><?php echo $row->NAME;?></span>
						</a>
					</li>
				<?php }?>
				<?php }?>
			</ul>
		</div>
		<!--Start Content-->
		<div id="content" class="col-xs-12 col-sm-10">
			
			<div class="preloader">
				<img src="<?php echo base_url('assets/image/devoops_getdata.gif');?>" class="devoops-getdata" alt="preloader"/>
			</div>
			<div id="ajax-content"></div>
		</div>
		<!--End Content-->
	</div>
</div>
<!--End Container-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<!--<script src="http://code.jquery.com/jquery.js"></script>-->
<script src="<?php echo base_url('assets/lib/plugins/jquery/jquery.min.js');?>"></script>
<script src="<?php echo base_url('assets/lib/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="<?php echo base_url('assets/lib/plugins/bootstrap/bootstrap.min.js');?>"></script>
<script src="<?php echo base_url('assets/lib/plugins/justified-gallery/jquery.justifiedGallery.min.js');?>"></script>
<script src="<?php echo base_url('assets/lib/plugins/tinymce/tinymce.min.js');?>"></script>
<script src="<?php echo base_url('assets/lib/plugins/tinymce/jquery.tinymce.min.js');?>"></script>
<!-- All functions for this theme + document.ready processing -->
<script src="<?php echo base_url('assets/lib/plugins/datatables/jquery.dataTables.js');?>"></script>
<script src="<?php echo base_url('assets/lib/plugins/datatables/ZeroClipboard.js');?>"></script>
<script src="<?php echo base_url('assets/lib/plugins/datatables/dataTables.bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/js/devoops.js');?>"></script>
<script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
<script type="text/javascript">
	function logout(){
		window.location.href=$('#base_url').val()+"back/logout";
	}
</script>
<script type="text/javascript">
// Add listener for redraw menu when windows resized
$(document).ready(function() {
	$('#content').on('click','[id^=msg-]', function(e){
		e.preventDefault();
		$('[id^=msg-]').removeClass('active');
		$(this).addClass('active');
		$('.one-list-message').slideUp('fast');
		$('.'+$(this).attr('id')+'-item').slideDown('fast');
	});
});
</script>
</body>
</html>
