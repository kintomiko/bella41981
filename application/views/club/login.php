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
            <h1>姚贝娜全国后援会</h1>
            <form id="loginForm" action="<?php echo base_url('club/loginForm');?>" method="post">
                <input type="text" name="username" class="username" placeholder="账号">
                <input type="password" name="password" class="password" placeholder="密码">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
            <div class="connect" align="right" style="margin-top:0;">
                <a class="twitter" style="width:40px;padding-right:10px;text-decoration:none;" href="<?php echo base_url('club/reg');?>">注册</a>
            	<a class="twitter" style="width:80px;padding-right:10px;text-decoration:none;" href="<?php echo base_url('club/forgetPwd');?>">忘记密码</a>
            </div>
        </div>
        <!-- Javascript -->
        <script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized.3.2.7.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized-init.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/scripts.js');?>"></script>
        <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
		<script>
		$('#loginForm').ajaxForm({				
		    beforeSubmit: function(a,f,o) {	
		    },			
		    success: function(data) {	
		    	if(data=="true"){
		    		window.location.href="<?php echo base_url('portal');?>";
			    }else{
				    alert("账号或密码错误！");
				}
		    }			
		});	
		</script>
     </body>
</html>