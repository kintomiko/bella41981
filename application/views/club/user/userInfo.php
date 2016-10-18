<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="#">个人资料</a></li>
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
				<form class="form-horizontal" id="userForm" role="form" action="<?php echo base_url('club/updateUser');?>" method="post">
					<input type="hidden" name="user_id" value="<?php echo $user->USER_ID ;?>">
					<h4 class="page-header">会员信息</h4>
					<div class="form-group">
						<label class="col-sm-2 control-label">会员编号</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CODE ;?></span>
						</div>
						<label class="col-sm-2 control-label">所属省份</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->CLUB ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">入会时间</label>
						<div class="col-sm-3">
							<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $user->IN_DATE ;?></span>
						</div>
						<?php if(in_array(1,explode(',',$_SESSION['user']->AUTHORITY))){?>
							<label class="col-sm-2 control-label">管理省份</label>
							<div class="col-sm-3">
								<span class="col-sm-8" style="padding:4px 0 0;"><?php echo $province ;?></span>
							</div>
						<?php }?>
					</div>
					<h4 class="page-header">个人信息</h4>
					<div class="form-group">
						<label class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-3">
							<input type="text" name="nickname" maxlength="20" class="form-control" value="<?php echo $user->NICKNAME ;?>">
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">真实姓名</label>
						<div class="col-sm-3">
							<span class="col-sm-8" maxlength="10" style="padding:4px 0 0;"><?php echo $user->REALNAME ;?></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">性别</label>
						<div class="col-sm-3" style="padding-top:4px;">
							<div class="radio-inline">
								<label>
									<input type="radio" name="sex" value="1" <?php if($user->SEX==1){ ?>checked<?php } ?> > 男
									<i class="fa fa-circle-o small"></i>
								</label>
							</div>
							<div class="radio-inline">
								<label>
									<input type="radio" name="sex" value="2" <?php if($user->SEX==2){ ?>checked<?php } ?> > 女
									<i class="fa fa-circle-o small"></i>
								</label>
							</div>
						</div>
					</div>
					<div class="form-group has-feedback">
						<label class="col-sm-2 control-label">出生日期</label>
						<div class="col-sm-3">
							<input type="text" id="input_date" name="birthday" class="form-control" value="<?php echo $user->BIRTHDAY ;?>" readonly>
							<span class="fa fa-calendar txt-danger form-control-feedback"></span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">联系电话</label>
						<div class="col-sm-3">
							<input type="text" name="phone" maxlength="11" class="form-control" value="<?php echo $user->PHONE ;?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">邮箱</label>
						<div class="col-sm-3">
							<input type="text" name="email" class="form-control" value="<?php echo $user->EMAIL ;?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">QQ</label>
						<div class="col-sm-3">
							<input type="text" name="qq" maxlength="11" class="form-control" value="<?php echo $user->QQ ;?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">百度贴吧ID</label>
						<div class="col-sm-3">
							<input type="text" name="baidu" class="form-control" value="<?php echo $user->BAIDU ;?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">新浪微博</label>
						<div class="col-sm-3">
							<input type="text" name="sina" class="form-control" value="<?php echo $user->SINA ;?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">备注</label>
						<div class="col-sm-3">
							<textarea name="remark" rows="2" cols="40" maxlength="100" class="form-control"><?php echo $user->REMARK ;?></textarea>
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
// Run Select2 plugin on elements
//function DemoSelect2(){
//	$('#s2_with_tag').select2({placeholder: "Select OS"});
//	$('#s2_country').select2();
//}
// Run timepicker
//function DemoTimePicker(){
//	$('#input_time').timepicker({setDate: new Date()});
//}
$(document).ready(function() {
	// Create Wysiwig editor for textare
	//TinyMCEStart('#wysiwig_simple', null);
	//TinyMCEStart('#wysiwig_full', 'extreme');
	// Add slider for change test input length
	//FormLayoutExampleInputLength($( ".slider-style" ));
	// Initialize datepicker
	$('#input_date').datepicker({
		changeMonth: true,
	    changeYear: true,
	    defaultDate :"<?php echo $user->BIRTHDAY ;?>"
	});
	$( "#input_date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
	$( "#input_date" ).val("<?php echo $user->BIRTHDAY ;?>")
	// Load Timepicker plugin
	//LoadTimePickerScript(DemoTimePicker);
	// Add tooltip to form-controls
	$('.form-control').tooltip();
	//LoadSelect2Script(DemoSelect2);
	// Load example of form validation
	//LoadBootstrapValidatorScript(DemoFormValidator);
	// Add drag-n-drop feature to boxes
	WinMove();
	$('#userForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
	    	var param=true;
		    if($('input[name=nickname]').val().length == 0){			
				$('input[name=nickname]').focus();			
				alert("请填写昵称！");		
				return false;			
			}
		    var nickname = $('input[name=nickname]').val();
	    	$.ajax({
	    	    type: 'POST',
	    	    url: "<?php echo base_url('club/existInfoNickname');?>",
	    	    async:false,
	    	    data: {nickname:nickname} ,
	    	    success: function(data){
		    	    		if(data=="true"){
		    	    			alert("昵称已存在！");
		    	    			$('input[name=nickname]').focus();		
		    	    			param=false;
		    	    		}else{
		    	    			param=true;
				    	    }
		    	 		}
	    	});
	    	if(param==false){
		    	return false;
		    }
		    if($('input[name=birthday]').val().length == 0){			
				$('input[name=birthday]').focus();			
				alert("请填写出生日期！");		
				return false;			
			}
		    if($('input[name=phone]').val().length == 0){			
				$('input[name=phone]').focus();			
				alert("请填写联系电话！");		
				return false;			
			}
		    if($('input[name=email]').val().length == 0){			
				$('input[name=email]').focus();			
				alert("请填写邮箱地址！");		
				return false;			
			}
			return param;
	    },			
	    success: function(data) {			
	    	alert("修改成功！");
	    }			
	});	
});
</script>
