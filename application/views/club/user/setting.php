<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="#">设置</a></li>
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
				<form class="form-horizontal" id="defaultForm" role="form" action="<?php echo base_url('club/updatePassword');?>" method="post">
					<input type="hidden" name="user_id" value="">
					<h4 class="page-header">密码修改</h4>
					<div class="form-group">
						<label class="col-sm-2 control-label">原密码</label>
						<div class="col-sm-3">
							<input type="password" name="oldpassword" class="form-control" value="">
							<span class="error" id="oldpassword" style="color:red;">请填写原密码！</span>
							<span class="error" id="passworderror" style="color:red;">原密码错误！</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">新密码</label>
						<div class="col-sm-3">
							<input type="password" name="newpassword" class="form-control" value="">
							<span class="error" id="newpassword" style="color:red;">请填写新密码！</span>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">重复密码</label>
						<div class="col-sm-3">
							<input type="password" name="password" class="form-control" value="">
							<span class="error" id="password" style="color:red;">请填写重复密码！</span>
							<span class="error" id="repassword" style="color:red;">密码重复错误！</span>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary btn-block">
								保 存
							</button>
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
		    $('.error').hide();
	    	var param=true;
		    if($('input[name=oldpassword]').val().length == 0){			
				$('input[name=oldpassword]').focus();			
				$('#oldpassword').show("fast");	
				return false;			
			}
		    if($('input[name=newpassword]').val().length == 0){			
				$('input[name=newpassword]').focus();			
				$('#newpassword').show("fast");		
				return false;			
			}
		    if($('input[name=password]').val().length == 0){			
				$('input[name=password]').focus();			
				$('#password').show("fast");	
				return false;			
			}
		    if($('input[name=password]').val()!=$('input[name=newpassword]').val()){			
				$('input[name=password]').focus();			
				$('#repassword').show("fast");	
				return false;			
			}
			return param;
	    },			
	    success: function(data) {	
	    	if(data=="true"){
		    	alert("修改成功！");
		    	window.location.href="<?php echo base_url('club');?>";
		    }else{
			    if(data=="error"){
			    	$('input[name=newpassword]').focus();	
				    $('#passworderror').show("fast");
				}else{
					alert("修改失败！");
				}
			}
	    }			
	});	
});
</script>
