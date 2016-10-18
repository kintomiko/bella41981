<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="club/approvalList" class="ajax-link" id="approvalList">会员申请列表</a></li>
			<li><a href="#">会员申请信息</a></li>
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
				<form class="form-horizontal" id="userForm" role="form" action="<?php echo base_url('club/approvalUser');?>" method="post">
					<input type="hidden" name="user_id" value="<?php echo $user->USER_ID ;?>">
					<input type="hidden" name="code" value="<?php echo $user->CODE ;?>">
					<input type="hidden" name="email" value="<?php echo $user->EMAIL ;?>">
					<h4 class="page-header">会员信息</h4>
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
						<label class="col-sm-2 control-label">入粉年份</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CODE ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">邮箱</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->EMAIL ;?></span>
						</div>
						<label class="col-sm-2 control-label">联系电话</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->PHONE ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">QQ</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->QQ ;?></span>
						</div>
						<label class="col-sm-2 control-label">申请时间</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CREATE_TIME ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">百度贴吧ID</label>
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
						<label class="col-sm-2 control-label">审批</label>
						<div class="col-sm-5" style="padding-top:4px;">
							<div class="radio-inline">
								<label>
									<input type="radio" name="status" value="0" checked> 通过并确认入粉年份
									<i class="fa fa-circle-o small"></i>
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input type="radio" name="status" value="1" > 仅通过
									<i class="fa fa-circle-o small"></i>
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input type="radio" name="status" value="2" > 不通过
									<i class="fa fa-circle-o small"></i>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary">提 交</button>
							<a class="btn btn-default" onclick="$('#approvalList').click();">返 回</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function() {
	$('#userForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
	    	return true;
	    },			
	    success: function(data) {			
	    	//if(data=="true"){
		    	alert("提交成功！");
		    	$('#approvalList').click();
	    	//}else{
		    //	alert(data);
	    	//}
	    }			
	});	
});

</script>

