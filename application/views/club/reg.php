<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>姚贝娜全国后援会</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo base_url('assets/image/favicon.png');?>" >
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/reset.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/supersized.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/style.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/stylesreg.css');?>">
  <style>
	.page-container{
		margin:0;
	}
  </style>
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
	<body>
		<input id="base_url" type="hidden" value="<?php echo base_url();?>" />
        <div class="page-container">
        	<article class="htmleaf-content">
		<!-- multistep form -->
		<form id="msform" action="<?php echo base_url('club/applyUser');?>" method="post">
			<!-- progressbar -->
			<ul id="progressbar">
				<li class="active">账号信息</li>
				<li>个人信息</li>
				<li>会员信息</li>
			</ul></br>
			<!-- fieldsets -->
			<span id="error_msg" style="color:red;font-size:14px;">请如实填写信息 不实或错误信息将无法通过审批</span></br></br>
			<fieldset>
				<input type="text" name="name" maxlength="20" placeholder="登录账号" />
				<input type="text" name="nickname" maxlength="20" placeholder="昵称" />
				<input type="email" name="email" placeholder="邮箱" />
				<input type="button" name="next" id="next1" class="next action-button" value="下一步" />
			</fieldset>
			<fieldset>
				<input type="text" name="realname" maxlength="10" placeholder="真实姓名" />
				<input type="text" name="phone" maxlength="11" placeholder="电话" />
				<input type="text" name="qq" maxlength="11" placeholder="QQ" />
				<input type="text" name="sina" placeholder="新浪微博昵称" />
				<input type="button" name="previous" class="previous action-button" value="上一步" />
				<input type="button" name="next" id="next2" class="next action-button" value="下一步" />
			</fieldset>
			<fieldset>
				<input type="text" name="baidu" placeholder="贴吧ID" />
				<input type="text" name="year" maxlength="4" placeholder="入粉年份" />
				<select class="form-control" id="province" name="province" style="border: solid 1px rgba(162, 159, 159, 0.33);-webkit-appearance: initial;">
					<option value="" selected>所在省份</option>
					<?php  foreach ($province as $row){?>
					<option value="<?php echo $row->CODE;?>"><?php echo $row->NAME;?></option>
					<?php }?>
				</select>
				<textarea name="remark" maxlength="100" placeholder="活动经历及相关备注" style="border: solid 1px rgba(162, 159, 159, 0.33);-webkit-appearance: initial;"></textarea>
				<input type="button" name="previous" class="previous action-button" value="上一步" />
				<input type="submit" name="submit" class="submit action-button" value="提交申请" />
			</fieldset>
		</form>
	</article>
        </div>
        <!-- Javascript -->
        <script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized.3.2.7.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized-init.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/scripts.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/jquery.easing.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
		<script>
	var current_fs, next_fs, previous_fs;
	var left, opacity, scale;
	var animating;
	var regyear=/^\d{4}$/;
	var regnum = new RegExp("^[0-9]*$");
	var regengnum=new RegExp("^[a-zA-Z0-9]+$");
	var regemail=new RegExp("^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$");
	var regphone=new RegExp("^1[3|4|5|8] \d{9}$");
	$('.next').click(function () {
		if($(this).attr("id")=="next1"){
			var param=false;
			if($('input[name=name]').val().length == 0){			
				$('#error_msg').html("登录账号必须填写！");			
				$('#error_msg').show("fast");	
				$('input[name=name]').focus();
				return false;
			}else{
				var name = $('input[name=name]').val();
				if(!regengnum.test(name)){
					$('#error_msg').html("登录账号由英文字母和数字组成！");			
					$('#error_msg').show("fast");	
					$('input[name=name]').focus();    
					return false;
				}
		    	$.ajax({
		    	    type: 'POST',
		    	    url: "<?php echo base_url('club/existUserName');?>",
		    	    async:false,
		    	    data: {name:name} ,
		    	    success: function(data){
			    	    		if(data=="true"){
			    	    			$('#error_msg').html("账号已存在！");			
									$('#error_msg').show("fast");
			    	    			$('input[name=name]').focus();	
			    	    			param=false;
			    	    		}else{
			    	    			param=true;
					    	    }
			    	 		}
		    	});
		    	if(param==false){
			    	return false;
			    }
			}
			if($('input[name=nickname]').val().length == 0){			
				$('#error_msg').html("昵称必须填写！");			
				$('#error_msg').show("fast");	
				$('input[name=nickname]').focus();		
				return false;			
			}else{
				var nickname = $('input[name=nickname]').val();
		    	$.ajax({
		    	    type: 'POST',
		    	    url: "<?php echo base_url('club/existUserNickname');?>",
		    	    async:false,
		    	    data: {nickname:nickname} ,
		    	    success: function(data){
			    	    		if(data=="true"){
			    	    			$('#error_msg').html("昵称已存在！");			
									$('#error_msg').show("fast");
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
			}
			if($('input[name=email]').val().length == 0){			
				$('#error_msg').html("邮箱必须填写！");			
				$('#error_msg').show("fast");
				$('input[name=email]').focus();				
				return false;			
			}
			if(!regemail.test($('input[name=email]').val())){
				$('#error_msg').html("请输入正确邮箱地址！");			
				$('#error_msg').show("fast");	
				$('input[name=email]').focus();    
				return false;
			}else{
				var email = $('input[name=email]').val();
		    	$.ajax({
		    	    type: 'POST',
		    	    url: "<?php echo base_url('club/existUserEmail');?>",
		    	    async:false,
		    	    data: {email:email} ,
		    	    success: function(data){
			    	    		if(data=="true"){
			    	    			$('#error_msg').html("邮箱已存在！");			
									$('#error_msg').show("fast");
			    	    			$('input[name=email]').focus();
			    	    			param=false;
			    	    		}else{
			    	    			param=true;
					    	    }
			    	 		}
		    	});
		    	if(param==false){
			    	return false;
			    }
			}
		}
		if($(this).attr("id")=="next2"){
			if($('input[name=realname]').val().length == 0){			
				$('#error_msg').html("真实姓名必须填写！");			
				$('#error_msg').show("fast");	
				$('input[name=realname]').focus();			
				return false;			
			}
		    if($('input[name=phone]').val().length == 0){			
				$('#error_msg').html("电话必须填写！");			
				$('#error_msg').show("fast");	
				$('input[name=phone]').focus();			
				return false;			
			}
		}
		$('#error_msg').hide("fast");
		if (animating)
	        return false;
	    animating = true;
	    current_fs = $(this).parent();
	    next_fs = $(this).parent().next();
	    $('#progressbar li').eq($('fieldset').index(next_fs)).addClass('active');
	    next_fs.show();
	    current_fs.animate({ opacity: 0 }, {
	        step: function (now, mx) {
	            scale = 1 - (1 - now) * 0.2;
	            left = now * 50 + '%';
	            opacity = 1 - now;
	            current_fs.css({ 'transform': 'scale(' + scale + ')' });
	            next_fs.css({
	                'left': left,
	                'opacity': opacity
	            });
	        },
	        duration: 800,
	        complete: function () {
	            current_fs.hide();
	            animating = false;
	        },
	        easing: 'easeInOutBack'
	    });
	});
	$('.previous').click(function () {
	    if (animating)
	        return false;
	    animating = true;
	    current_fs = $(this).parent();
	    previous_fs = $(this).parent().prev();
	    $('#progressbar li').eq($('fieldset').index(current_fs)).removeClass('active');
	    previous_fs.show();
	    current_fs.animate({ opacity: 0 }, {
	        step: function (now, mx) {
	            scale = 0.8 + (1 - now) * 0.2;
	            left = (1 - now) * 50 + '%';
	            opacity = 1 - now;
	            current_fs.css({ 'left': left });
	            previous_fs.css({
	                'transform': 'scale(' + scale + ')',
	                'opacity': opacity
	            });
	        },
	        duration: 800,
	        complete: function () {
	            current_fs.hide();
	            animating = false;
	        },
	        easing: 'easeInOutBack'
	    });
	});
	$('#msform').ajaxForm({			
	    beforeSubmit: function(a,f,o) {	
		    if($('input[name=year]').val().length == 0){			
				$('#error_msg').html("入粉年份必须填写！");			
				$('#error_msg').show("fast");	
				$('input[name=year]').focus();		
				return false;			
			}
		    if(!regyear.test($('input[name=year]').val())){
				$('#error_msg').html("请输入正确年份格式如2013！");			
				$('#error_msg').show("fast");	
				$('input[name=year]').focus();    
				return false;
			}
		    if($('#province').val().length == 0){			
				$('#error_msg').html("所在省份必须填写！");			
				$('#error_msg').show("fast");	
				$('input[name=province]').focus();			
				return false;			
			}
		    $('#error_msg').hide("fast");
	    },			
	    success: function(data) {	
	    	alert(data);
	    	window.location.href="<?php echo base_url('club');?>";
	    }			
	});	
	</script>
    </body>
</html>