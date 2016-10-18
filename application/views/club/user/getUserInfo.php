<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="club/userList" class="ajax-link" id="userList">会员管理</a></li>
			<li><a href="#">会员信息</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
				</div>
				<div class="box-icons">
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="userForm" role="form" action="" method="post">
					<h4 class="page-header">会员信息</h4>
					<div class="form-group">
						<label class="col-sm-2 control-label">账号</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->NAME ;?></span>
						</div>
						<label class="col-sm-2 control-label">会员编号</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CODE ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->NICKNAME ;?></span>
						</div>
						<label class="col-sm-2 control-label">所属省份</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CLUB ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">真实姓名</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->REALNAME ;?></span>
						</div>
						<label class="col-sm-2 control-label">入会时间</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->IN_DATE ;?></span>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">性别</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php if($user->SEX==1){ ?>男<?php } ?><?php if($user->SEX==2){ ?>女<?php } ?></span>
						</div>
						<label class="col-sm-2 control-label">申请时间</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CREATE_TIME ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">出生日期</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->BIRTHDAY ;?></span>
						</div>
						<label class="col-sm-2 control-label">联系电话</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->PHONE ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">邮箱</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->EMAIL ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">QQ</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->QQ ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">百度贴吧</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->BAIDU ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">新浪微博</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->SINA ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">备注</label>
						<div class="col-sm-3">
							<textarea name="remark" rows="2" cols="40" class="form-control" disabled><?php echo $user->REMARK ;?></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<a class="btn btn-default" onclick="$('#userList').click();">返 回</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

