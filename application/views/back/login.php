<!doctype html>
<html lang="en" class="no-js">
<head>
  <meta charset="utf-8">
  <title>Bella41981 - Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:400,700'>
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/reset.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/supersized.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/login/style.css');?>">
  
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  <script>		
	javascript:window.history.forward(1);
	</script>
</head>
	<body>
        <div class="page-container">
            <h1>Login</h1>
            <form action="<?php echo base_url('back/loginForm');?>" method="post">
                <input type="text" name="username" class="username" placeholder="Username">
                <input type="password" name="password" class="password" placeholder="Password">
                <button type="submit">登录</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>
        <!-- Javascript -->
        <script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized.3.2.7.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/supersized-init.js');?>"></script>
        <script src="<?php echo base_url('assets/js/login/scripts.js');?>"></script>

    </body>
</html>