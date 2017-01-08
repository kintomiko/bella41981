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
        .shadow{
            box-shadow:0 0 25px #0F1FA2 !important;
        }
        .check{
            position:absolute;
            border-width:18px;
            border-color: #BA2727 transparent transparent #BA2727;
            border-style: solid;
        }
        input{
            border:1px solid #dbdbdb;
            color:#797979;
            padding:10px;
        }
        .float-input{
            width: 100%;
            padding-right:0;
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
            <div class="portfolio-box with-4-col home-portfolio">
                <div class="container">
                    <div class="col-md-3">
                        <form id="contact-form" class="contact-work-form2">
                            <div class="text-input">
                                <div class="float-input">
                                    <input name="mail" id="mail2" type="text" placeholder="活动名称">
                                    <span><i class="fa fa-bullhorn"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <input name="mail" id="mail2" type="text" placeholder="简介">
                                    <span><i class="fa fa-bars"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <input name="name" id="name2" type="text" placeholder="最低参与人数">
                                    <span><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <select placeholder="简介">
                                        <optgroup label="活动所在省份">
                                            <option value="">无</option>
                                            <?php  foreach ($province as $row){?>
                                                <option value="<?php echo $row->CODE;?>"><?php echo $row->NAME;?></option>
                                            <?php } ?>
                                        </optgroup>
                                    </select>
                                    <span><i class="fa fa-users"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input name="" id="mail2" type="text" placeholder="地点">
                                    <span><i class="fa fa-location-arrow"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="活动开始时间"  id="actStart"  name ="Q_startDate_D_GT"/>
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                                </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="活动结束时间"  id="actEnd"  name ="Q_startDate_D_GT"/>
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="报名开始时间"  id="enterStart"  name ="Q_startDate_D_GT"/>
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                                </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="报名结束时间"  id="enterEnd"  name ="Q_startDate_D_GT"/>
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="textarea-input">
                                <textarea name="comment" rows="10" placeholder="详述及要求"></textarea>
                                <span><i class="fa fa-file-text-o"></i></span>
                            </div>
                            <a class="btn btn-default act" onclick="enter();">我要报名</a>
                        </form>
                    </div>
                    <div class="col-md-9">
                    <ul class="filter">
                        <li><a href="#" class="active" data-filter="*"><i class="fa fa-th"></i>全部</a></li>
                        <?php  foreach ($actTemType as $row){?>
                            <li><a href="#" data-filter=".tem-<?php echo $row->LIMIT;?>">规模 <?php echo $row->LIMIT;?>人</a></li>
                        <?php } ?>
                    </ul>

                    <div class="portfolio-container isotope" style="width:100%;overflow: hidden; position: relative; height: 618px;">
                        <?php  foreach ($actTemLIst as $row){?>
                            <div class="col-md-3 work-post isotope-item tem-<?php echo $row->LIMIT;?>">
                                <div class="check" hidden >
                                    <div style="height:15px; width:15px;"></div>
                                </div>
                                <ul class="pricing-table basic">
                                    <li class="title">
                                        <p><?php echo $row->TITLE;?></p>
                                        <span><?php echo $row->DESC;?></span>
                                    </li>
                                    <li>
                                        <p>发起人得分 <?php echo $row->STARTER_CREDIT;?></p>
                                    </li>
                                    <li>
                                        <p>参与人得分 <?php echo $row->PERSON_CREDIT;?></p>
                                    </li>
                                    <li>
                                        <p><?php echo $row->PERSON_GRADE;?>级以上可参加</p>
                                    </li>
                                    <li>
                                        <p><?php if($row->STARTER_GRADE==0){?>荣誉会员<?php }else{ echo $row->STARTER_GRADE; }?>级以上可发起</p>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>

                    </div>
                        </div>



                </div>
            </div>
            <div>


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
    <script src="<?php echo base_url('assets/js/jquery.isotope.min.js');?>"></script>
    <script src="<?php echo base_url('assets/lib/laydate/laydate.js');?>"></script>
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
            $('.isotope-item').click(function(){
                $(".shadow").removeClass("shadow");
                $(".check").hide();
                $(this).find(".pricing-table").addClass("shadow");
                $(this).find(".check").show();
            })
            laydate.skin('yalan');
            laydate(actStart);
            laydate(actEnd);
            laydate(enterStart);
            laydate(enterEnd);
        })
        var actStart = {
            elem: '#actStart',
            format: 'YYYY-MM-DD hh:mm',
            min: laydate.now(), //设定最小日期为当前日期
            //max: '2099-06-16 23:59:59', //最大日期
            istime: true,
            istoday: false,
            choose: function(datas){
                actEnd.min = datas; //开始日选好后，重置结束日的最小日期
                actEnd.start = datas;//将结束日的初始值设定为开始日
                enterStart.max=datas;
            }
        };
        var actEnd = {
            elem: '#actEnd',
            format: 'YYYY-MM-DD hh:mm',
            min: laydate.now(),
            //max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function(datas){
                actStart.max = datas; //结束日选好后，重置开始日的最大日期
                enterEnd.max=datas;
            }
        };
        var enterStart = {
            elem: '#enterStart',
            format: 'YYYY-MM-DD hh:mm',
            min: laydate.now(), //设定最小日期为当前日期
            istime: true,
            istoday: false,
            choose: function(datas){
                enterEnd.min = datas; //开始日选好后，重置结束日的最小日期
                enterEnd.start = datas //将结束日的初始值设定为开始日
                actStart.min=datas;
            }
        };
        var enterEnd = {
            elem: '#enterEnd',
            format: 'YYYY-MM-DD hh:mm',
            min: laydate.now(),
            //max: '2099-06-16 23:59:59',
            istime: true,
            istoday: false,
            choose: function(datas){
                enterStart.max = datas; //结束日选好后，重置开始日的最大日期
                actEnd.min=datas;
            }
        };

        function enter(){
            <?php if(isset($_SESSION['user'])){?>
            //alert("登录过了")
            <?php }else{ ?>
            //alert("请先登录！");
            <?php }?>
        }
    </script>
</body>
</html>