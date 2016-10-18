<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="club/adminList" class="ajax-link" id="adminList">管理员列表</a></li>
			<li><a href="#">权限配置</a></li>
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
				<form class="form-horizontal" id="defaultForm" role="form" action="<?php echo base_url('club/adminAuthSave');?>" method="post">
					<input type="hidden" name="user_id" value="<?php echo $user->USER_ID;?>">
					<div class="form-group">
						<label class="col-sm-2 control-label">会员编号</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CODE;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->NICKNAME;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">所属省份</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CLUB;?></span>
						</div>
					</div>
					<h4 class="page-header"></h4>
					<div class="row form-group">
						<label class="col-sm-2 control-label">管理权限</label>
						<div class="col-sm-10" style="float:right;">
							<?php  foreach ($province as $row){?>
								<div class="checkbox-inline" style="margin-left:0;width:100px;"><label>
									<input type="checkbox" name="auth[]" value="<?php echo $row->CODE;?>" <?php if(in_array($row->CODE,$province_auth)){?>checked<?php }?>> <?php echo $row->NAME;?> <i class="fa fa-square-o"></i>
								</label></div>
							<?php }?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary">保 存</button>
							<a class="btn btn-default" onclick="$('#adminList').click();">返 回</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.error').hide();
	$('.form-control').tooltip();
	WinMove();
	$('#defaultForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
			return true;
	    },			
	    success: function(data) {	
	    	if(data=="true"){
		    	alert("保存成功！");
		    	$('#adminList').click();
		    }else{
		    	alert("保存失败！");
			}
	    }			
	});	
});
</script>
