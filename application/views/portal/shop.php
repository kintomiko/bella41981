<!DOCTYPE html>
<html lang="en" class="no-js webkit chrome win js"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>姚贝娜全国后援会</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="<?php echo base_url('assets/image/favicon.png');?>" >
	<link href="<?php echo base_url('assets/css/portal/css');?>" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/portal/fullwidth.css');?>" media="screen">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/portal/bootstrap.css');?>" type="text/css" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/portal/font-awesome.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/portal/style.css');?>" media="screen">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/portal/responsive.css');?>" media="screen">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	
<style type="text/css">
.detail-ads3,.detail-ads,[class^="in-ads-"],.wide-bg-dark > .wide-main > .page-in-main:first-child > .page-banner,.wide-main > .page-in-main:first-child + .in-media-side {display:none!important;display:none}
.navbar-fixed-top{
	top: 0;
}
header .navbar-nav > li > a{
	padding:15px 0 17px !important;
}
.navbar-header a{
	padding:10px 0 0 !important;
}
</style>
</head>
<body>
	<!-- Container -->
	<div id="container">
		<header class="clearfix active">
			<div class="navbar navbar-default navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="http://www.bella41981.com"><img alt="" style="height:40px;" src="<?php echo base_url('assets/image/portal/logo.png');?>"></a>
					</div>
					<div class="navbar-collapse collapse">
						<ul class="nav navbar-nav navbar-right">
							<li><a href="<?php echo base_url('');?>">首页</a></li>
							<li style="margin-left:20px;"><a class="active" href="#">积分兑换</a></li>
							<li style="margin-left:15px;"><a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w137644-14153656859.39.gcSLMC&id=531690193912" target="_blank">友情赞助</a></li>
							<li class="drop" style="margin-left:20px;width:45px;"><a href="#">帮助</a>
								<ul class="drop-down">
									<li><a href="<?php echo base_url('portal/regGuide');?>">注册指南</a></li>
									<li><a href="<?php echo base_url('portal/numerical');?>">积分说明</a></li>
								</ul>
							</li>
							<?php if(isset($_SESSION['user'])){?>
								<li><a><?php echo $_SESSION['user']->NICKNAME;?>
									<i class="fa fa-diamond" style="color:rgba(243, 184, 46, 0.98);"></i> LV.<?php echo $_SESSION['user']->GRADE;?>
								</a></li>
								<li style="margin-left:15px;"><a href="<?php echo base_url('club');?>">我的海岸</a></li>
								<li style="width:50px;margin-left:10px;"><a href="<?php echo base_url('club/logout');?>">退出</a></li>
							<?php }else{ ?>
								<li><a href="<?php echo base_url('club/login');?>">登录</a></li>
								<li style="width:50px;margin-left:10px;"><a href="<?php echo base_url('club/reg');?>">注册</a></li>
							<?php }?>
                            <li style="margin-left:0px;"><a style="color:red;" href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w137644-14153656859.40.MdDGWA&id=535566192988" target="_blank">赈灾捐款入口</a></li>
						</ul>
					</div>
				</div>
			</div>
		</header>
		<div id="slider">
			<div class="fullwidthbanner-container" style="overflow: visible;">
				<div class="fullwidthbanner revslider-initialised tp-simpleresponsive" id="revslider-784">
			<div class="tp-bannershadow tp-shadow1" style="width: 1349px;"></div><div class="tp-bullets simplebullets round" style="bottom: 40px; left: 50%; margin-left: -36px;"><div class="bullet first selected"></div><div class="bullet"></div><div class="bullet last"></div><div class="tpclear"></div></div><div style="position: absolute; top: 290px; margin-top: -56px; left: 20px; display: none;" class="tp-leftarrow tparrows default"></div><div style="position: absolute; top: 290px; margin-top: -56px; right: 20px; display: none;" class="tp-rightarrow tparrows default"></div></div>
		</div>
		<div id="content">
			<div class="shop-page" style="padding-top:100px;">
				<div class="container">
					<?php if(isset($_SESSION['user'])){?>
						<h4>当前可用积分：<?php echo $_SESSION['user']->CREDIT;?></h4></br>
					<?php }?>
					<div class="row">
						<div class="col-md-9 shop-section">
							<div class="row footer-widgets">
								<?php  foreach ($product as $row){?>
									<div class="col-md-4">
										<div class="product-post">
											<div class="product-post-gal" style="border:1px solid #dbdbdb;border-bottom:none;">
												<img alt="" src="<?php echo $row->IMAGEURL;?>">
												<span class="price"><i class="fa fa-bookmark-o"></i> <?php echo $row->GRADE;?></span>
											</div>
											<div class="product-post-content">
												<h5><?php echo $row->NAME;?></h5></br>
												<div align="left" style="height:60px;">
													<p>剩余库存：<?php echo $row->STOCK;?></p>
													<p><?php echo $row->DESCRIPTION;?></p>
												</div>
												<ul class="product-list">
													<li><a class="shop" title="兑换" onclick="cash(<?php echo $row->ID;?>,<?php echo $row->GRADE;?>,<?php echo $row->STOCK;?>);"><i class="fa fa-shopping-cart"></i></a></li>
													<li><a class="rev" title="下单" href="<?php echo $row->TAOBAO;?>" target="_blank"><i class="fa fa-external-link-square"></i></a></li>
												</ul>
											</div>
										</div>
									</div>
								<?php }?>
							</div>
							<div class="row" style="margin-bottom:20px;padding:0 20px;">
								<p>下单前请先与客服沟通好在下单，以防客服因繁忙无法回复。以上礼品均凭积分免费兑换，邮费自理，下单时请备注好会员编号，客服将以此为凭证核对。正确下单后客服会帮助修改礼品价格，待修改后，在请付款！</p>
							</div>
						</div>
						<div class="col-md-3 shop-sidebar">
							<div class="sidebar-widgets">
								<!-- <div class="shop-widget">
									<h4>热门礼品</h4>
									<ul class="category-shop-list">
										<li>
											<a class="accordion-link" href="#">Watches <span>(4)</span></a>
										</li>
									</ul>
								</div> -->
								<div class="shop-widget">
									<h4>热门礼品</h4>
									<ul class="popular-product">
										<?php  foreach ($hotProduct as $row){?>
											<li>
												<img alt="" src="<?php echo $row->IMAGEURL;?>">
												<div>
													<h5><?php echo $row->NAME;?></h5>
													<span>已兑换 <?php echo $row->COUNT;?></span>
												</div>
											</li>
										<?php }?>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<footer>
			<div class="footer-line">
				<div class="container">
					<p>© 2016 BellaClub,  All Rights Reserved.</p>
					<a class="go-top" href="#"></a>
				</div>
			</div>
		</footer>
	</div>
	<script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>"></script>
	<!-- <script type="text/javascript" src="assets/new/Convertible_files/jquery.min.js"></script> 
	<script type="text/javascript" src="assets/new/Convertible_files/bootstrap.js"></script>-->
	<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>
	<script type="text/javascript" src="<?php echo base_url('assets/js/script.js');?>"></script>
	<script>
		function cash(productId,credit,stock){
			<?php if(isset($_SESSION['user'])){?>
				if(stock<=0){
					alert("库存不足无法兑换！");
				}else{
					var r=confirm("确定兑换本礼品？");
					if (r==true){
						$.ajax({
						    type: 'POST',
						    url: "<?php echo base_url('portal/addCash');?>",
						    async:false,
						    data: {productId:productId} ,
						    success: function(data){
					    	    		if(data=="false"){
					    	    			alert("兑换异常！");
					    	    		}else{
					        	    		alert(data);
					        	    		window.location.reload();
							    	    }
					    	 		}
						});
					}
				}
			<?php }else{ ?>
				alert("请先登录！");
			<?php }?>
		}
	</script>
</body>
</html>