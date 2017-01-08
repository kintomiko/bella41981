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
        .act{
            background-color: #267EE0;
            color: #fff;
            font-family: "黑体";
            font-weight: 600;
            font-size: 22px;
            padding: 10px 24px;
            border: transparent;
            border-bottom: 2px solid #147744;
            border-radius: 5px;
        }
        .act:hover{
            color: #fff;
            background-color: #0E5AB9;
            border-color: #000;
        }
        .tab-links a.active{
            color:#007aff;
        }
    </style>
</head>
<body>
<!-- Container -->
<div id="container">
    <header class="clearfix active">
        <?php include 'header.php'; ?>
    </header>
    <div id="slider">
        <div id="content">
            <div class="shop-page" style="padding-top:140px;">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?php echo $act->URL;?>" style="width:100%;"/>
                        </div>
                        <div class="col-md-6" style="padding-top:10px;">
                            <h2><?php echo $act->TITLE;?></h2>
                            <p><?php echo $act->BRIEF;?></p></br>
                            <p><label>活动积分：</label><span><?php echo $act->CREDIT;?></span></p>
                            <p><label>活动地点：</label><span><?php echo $act->LOCATION;?></span></p>
                            <p><label>活动时间：</label><span><?php echo substr($act->START_ON,0,16);?></span> —
                                <span><?php echo substr($act->END_ON,0,16);?></span>
                            </p>
                            <p><label>报名时间：</label><span><?php echo substr($act->REG_START_ON,0,16);?></span> —
                                <span><?php echo substr($act->REG_END_ON,0,16);?></span>
                            </p>
                            <p><label>活动人限：</label><span><?php echo $act->MIN_PART;?></span> -
                                <span><?php echo $act->MAX_PART;?></span>人
                            </p>
                            <p><label>已报人数：</label><span><?php echo $act->MAX_PART;?></span>人
                            </p>
                            <span style="font-size:20px;color:red;font-weight:bold;">报名进行中 . . . . . .</span>
                            <div style="padding-top:15px;"><a class="btn btn-default act" onclick="enter();">我要报名</a></div>
                        </div>
                    </div>
                    <div class="row" style="padding-top:20px;">
                        <div class="col-md-12">
                            <div class="sidebar-widgets" style="padding-top:15px;">
                                <div class="tabs-widget widget">
                                    <ul class="tab-links" style="display:inline-flex;min-width: 240px;">
                                        <li><a class="tab-link1 active" href="#">活动详述</a></li>
                                        <li><a class="tab-link2" href="#">已报名</a></li>
                                        <li><a class="tab-link3" href="#">其它信息</a></li>
                                    </ul><div class="tab-box">
                                        <div class="tab-content active" style="display: block;">
                                            <?php echo $act->DESC;?>
                                        </div>
                                        <div class="tab-content" style="display: none;">
                                            暂无
                                        </div>
                                        <div class="tab-content" style="display: none;">
                                            <div><label>活动省份：</label><span><?php echo $act->PROVINCE;?></span></div>
                                            <div><label>发 起 人 &nbsp;：</label><span><?php echo $act->NICKNAME;?></span></div>
                                        </div>
                                    </div>
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
        $(function(){
            $("#content").css("min-height",$(window).height()-88+"px");
        })
        function enter(){
            <?php if(isset($_SESSION['user'])){?>
            alert("登录过了")
            <?php }else{ ?>
            alert("请先登录！");
            <?php }?>
        }
    </script>
</body>
</html>