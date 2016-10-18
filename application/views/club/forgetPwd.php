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
  
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
	<body>
		<input id="base_url" type="hidden" value="<?php echo base_url();?>" />
        <div class="page-container">
            <h1>密码找回</h1>
            <form id="pwdform" action="<?php echo base_url('club/foundPwd');?>" method="post">
                <input type="text" name="name" class="username" placeholder="账号">
                <input type="text" name="email" class="password" placeholder="邮箱">
                <button type="submit">提交</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>
        <!-- Javascript -->
        <script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized.3.2.7.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized-init.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
        <script type="text/javascript">
	        $('#pwdform').ajaxForm({			
	    	    beforeSubmit: function(a,f,o) {	
	    	    	var username = $('input[name=name]').val();
	    	        var password = $('input[name=email]').val();
	    	        if(username == '') {
	    	            $('.error').fadeOut('fast', function(){
	    	                $(this).css('top', '27px');
	    	            });
	    	            $('.error').fadeIn('fast', function(){
	    	                $(this).parent().find('.username').focus();
	    	            });
	    	            return false;
	    	        }
	    	        if(password == '') {
	    	            $('.error').fadeOut('fast', function(){
	    	                $(this).css('top', '96px');
	    	            });
	    	            $('.error').fadeIn('fast', function(){
	    	                $(this).parent().find('.password').focus();
	    	            });
	    	            return false;
	    	        }
	    	    },			
	    	    success: function(data) {	
		    	    if(data=="false"){
			    	    alert("会员不存在！");
			    	}else if(data=="error"){
			    		alert("密码找回异常！");
				    }else{
					    alert("密码已下发至您的邮箱，请留意接收！");
					    window.location.href="<?php echo base_url('club');?>";
				    }
	    	    }			
	    	});
	    	$(function(){
	    		$('.page-container form .username, .page-container form .password').keyup(function(){
	    	        $(this).parent().find('.error').fadeOut('fast');
	    	    });
		    })
        </script>
     </body>
</html>