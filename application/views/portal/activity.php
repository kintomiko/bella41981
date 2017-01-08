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
        #content{
            padding-top:100px;
        }
        .act-view{
            padding:20px 10px;
            margin:0 auto;
            box-shadow:0 0 35px #aeaeae;
            -webkit-box-shadow:0 0 35px #DDDDDD;
            overflow:auto;
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
            <div class="container">
                <div class="row">
                    <div class="col-md-4" style="float:right;">
                        <div class="search-widget widget">
                            <form id="form" action="<?php echo base_url('portal/activity');?>" method="post">
                                <input type="search" name="title" placeholder="活动名称" value="<?php echo $title;?>">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <ul class="">
                            <?php  foreach ($actList as $row){?>
                                <li class="act-view">
                                    <div class="col-md-2">
                                            <?php if(date('Y-m-d H:i:s')<$row->REG_START_ON){ ?>
                                                <h3 style="color:#E0F435;"><i class="fa fa-bookmark-o fa-2x"></i> 准备报名</h3>
                                            <?php }?>
                                            <?php if(date('Y-m-d H:i:s')>$row->REG_START_ON && date('Y-m-d H:i:s')<$row->REG_END_ON){ ?>
                                                <h3 style="color:green;"><i class="fa fa-bookmark fa-2x"></i> 报名中 . . </h3>
                                            <?php }?>
                                            <?php if(date('Y-m-d H:i:s')>$row->REG_END_ON && date('Y-m-d H:i:s')<$row->END_ON){ ?>
                                                <h3 style="color:#DB0B0B;"><i class="fa fa-ban fa-2x"></i>报名结束</h3>
                                            <?php }?>
                                            <?php if(date('Y-m-d H:i:s')>$row->END_ON){ ?>
                                                <h3 style="color:grey;"><i class="fa fa-2x"></i> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;活动结束</h3>
                                            <?php }?>

                                    </div>
                                    <div class="col-md-10">
                                        <h3><a href="<?php echo base_url('portal/activityInfo') ?>/<?php echo $row->ID;?>"><?php echo $row->TITLE;?></a></h3>
                                        <div style="text-align: right;"><i class="fa fa-user"></i> <?php echo $row->NICKNAME;?> &nbsp;&nbsp;<i class="fa fa-clock-o"></i> <?php echo substr($row->START_ON,0,16);?></div>
                                    </div>
                                </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12" style="padding-top:20px;">
                        <ul class="pagination-list" style="text-align: right;">
                            <?php echo $this->pagination->create_links(); ?>
                        </ul>
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
            $('.pagination-list a').click(function(e){
                e.preventDefault();
                var a=parseInt($(this).attr("data-ci-pagination-page"));
                $('#form').attr("action",$('#form').attr("action")+"/"+a)
                $('#form').submit();
            })
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