<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="club/adminList" class="ajax-link" id="adminList">管理员列表</a></li>
			<li><a href="#">修改管理员信息</a></li>
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
				<form class="form-horizontal" id="userForm" role="form" action="<?php echo base_url('club/updateUserByAdmin');?>" method="post">
					<input type="hidden" name="user_id" value="<?php echo $user->USER_ID ;?>">
					<input type="hidden" name="code" value="<?php echo $user->CODE ;?>">
					<h4 class="page-header">修改会员编号</h4>
					<div class="form-group">
						<label class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->NICKNAME ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">会员编号</label>
						<div class="col-sm-3">
							BK <input type="text" name="year" maxlength="4" class="form-control" style="width:60px;display:inline;" value="<?php echo substr($user->CODE,2,4) ;?>">
							<?php echo substr($user->CODE,6,6) ;?>
						</div>
					</div>
					<div class="clearfix"></div>
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
	$('.form-control').tooltip();
	$('#userForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
		    if($('input[name=year]').val().length == 0){			
				$('input[name=year]').focus();			
				alert("年份不可为空！");		
				return false;			
			}
	    },			
	    success: function(data) {			
	    	alert(data);
	    	$('#adminList').click();
	    }			
	});	
});
</script>
