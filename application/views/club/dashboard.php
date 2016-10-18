<!--Start Breadcrumb-->

<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="#">首页</a></li>
		</ol>
	</div>
</div>
<!--End Breadcrumb-->
<!--Start Dashboard 1-->
<div id="dashboard-header" class="row">
	<div class="col-xs-12 col-sm-4 col-md-12">
		<div class="col-sm-5">
				<div class="sparkline-dashboard" id="sparkline-1"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa"></i><h3 align="left"><i class="fa fa-diamond" style="color:rgba(243, 184, 46, 0.98);"></i> LV.<?php echo $_SESSION['user']->GRADE;?></h3>
					</br><div style="width:150px;">
				<div class="progress">
				  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo ($_SESSION['user']->TOTALCREDIT/$nextGrade[0]->CREDIT)*100;?>%;background-color:#337ab7;color:#FFF;">
				    <?php echo $_SESSION['user']->TOTALCREDIT;?>/<?php echo $nextGrade[0]->CREDIT;?>
				  </div>
				</div>
				</div>
				</div>
				
		</div>
		<div class="col-xs-7">
				<div class="sparkline-dashboard" id="sparkline-1"></div>
				<div class="sparkline-dashboard-info" style="margin-right:10px;">
					<i class="fa"></i><h4><?php echo $countUserAll;?></h4>
					<span class="txt-primary">全国贝壳</span>
				</div>
				<div class="sparkline-dashboard" id="sparkline-1"></div>
				<div class="sparkline-dashboard-info">
					<i class="fa"></i><h4><?php echo $countUser;?></h4>
					<span class="txt-primary">同地区贝壳</span>
				</div>
		</div>
	</div>
</div>
<!--End Dashboard 1-->
<!--Start Dashboard 2-->
<div class="row-fluid">
	<div id="dashboard_links" class="col-xs-12 col-sm-2 pull-right">
		<ul class="nav nav-pills nav-stacked">
			<li class="active"><a href="#" class="tab-link" id="ann">公 告</a></li>
			<li><a href="#" class="tab-link" id="clients">全国各地后援会QQ群</a></li>
		</ul>
	</div>
	<div id="dashboard_tabs" class="col-xs-12 col-sm-10" style="padding:0 15px;">
		<div id="dashboard-ann" class="row" style="visibility: visible; position: relative;">
			<div style="margin:8px;" >
				<h4 align="center">关于网站试运行及会服定制公告</h4>
				<div style="color:rgb(132, 132, 132);margin-bottom:20px;">
					<div style="display:inline-block;">发布源：姚贝娜全国后援会</div>&nbsp;&nbsp;&nbsp;&nbsp;
					<div style="display:inline-block;">发布时间：2016-07-11</div>
				</div>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;1. 欢迎加入姚贝娜全国后援会，注册通过后请及时修改密码，并核对个人信息是否正确。</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;2. 在官方网站定制会服或购买某些特殊商品，需要会员号的，可通过进入“个人资料”页面进行查看。</p>
				<p>&nbsp;&nbsp;&nbsp;&nbsp;3. 网站已开放会员注册、会员积分、会员签到和礼品兑换功能，目前正在开发活动版块。如遇到问题可加入QQ群392457740咨询，我们将及时回复。</p>
				
			</div>
		</div>
		<div id="dashboard-clients" class="row" style="visibility: hidden; position: absolute;">
			<div class="" style="margin:8px;">
				<div class="row show-grid-forms">
					<?php  foreach ($province as $k=>$row){if(($k+1)%4==1){?>
						<div class="col-sm-3">
							<div class="col-xs-5"><?php echo $row->NAME;?></div>
							<div class="col-xs-7"><?php echo $row->QQ;?></div>
						</div>
					<?php }else{  if(($k+1)%4==0){ ?>
						<div class="col-sm-3">
							<div class="col-xs-5"><?php echo $row->NAME;?></div>
							<div class="col-xs-7"><?php echo $row->QQ;?></div>
						</div>
					<?php }else{?>
						<div class="col-sm-3">
							<div class="col-xs-5"><?php echo $row->NAME;?></div>
							<div class="col-xs-7"><?php echo $row->QQ;?></div>
						</div>
					<?php }   }}?>
				</div>
			</div>
			<!-- <div class="row one-list-message">
				<div class="col-xs-1"><b>地区</b></div>
				<div class="col-xs-2"><b>群号</b></div>
				<div class="col-xs-1"><b>地区</b></div>
				<div class="col-xs-2"><b>群号</b></div>
				<div class="col-xs-1"><b>地区</b></div>
				<div class="col-xs-2"><b>群号</b></div>
				<div class="col-xs-1"><b>地区</b></div>
				<div class="col-xs-2"><b>群号</b></div>
			</div> -->
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<!--End Dashboard 2 -->
<div style="height: 40px;"></div>
<script type="text/javascript">
$(document).ready(function() {
	DashboardTabChecker();
});
</script>
