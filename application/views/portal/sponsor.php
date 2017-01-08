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
            border-width:16px;
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
                        <form id="contact-form" action="<?php echo base_url('portal/sponAct');?>" class="contact-work-form2" method="post">
                            <input type="hidden" name="temId" value=""/>
                            <div class="text-input">
                                <div class="float-input">
                                    <input name="title" type="text" placeholder="活动名称" maxlength="20">
                                    <span><i class="fa fa-bullhorn"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <input name="brief" type="text" placeholder="简介" maxlength="50">
                                    <span><i class="fa fa-bars"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <input name="imgUrl" type="text" placeholder="活动宣传图地址" >
                                    <span><i class="fa fa-picture-o"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <input name="min_part" type="number" placeholder="最低参与人数" >
                                    <span><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input" >
                                    <select name="province_code">
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
                                    <input name="location" type="text" placeholder="地点" >
                                    <span><i class="fa fa-location-arrow"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="活动开始时间"  id="actStart"  name ="start_on" />
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                                </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="活动结束时间"  id="actEnd"  name ="end_on" />
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="报名开始时间"  id="enterStart"  name ="reg_start_on" />
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                                </div>
                            <div class="text-input">
                                <div class="float-input">
                                    <input type="text" placeholder="报名结束时间"  id="enterEnd"  name ="reg_end_on" />
                                    <span><i class="fa fa-calendar"></i></span>
                                </div>
                            </div>
                            <div class="textarea-input">
                                <textarea name="desc" rows="10" placeholder="详述及要求"></textarea>
                                <span><i class="fa fa-file-text-o"></i></span>
                            </div>
                            <input class="btn btn-default act" type="submit" value="发 起 活 动" style="font-size:16px;">
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
                                <input type="hidden" value="<?php echo $row->ID;?>"/>
                                <div class="check" hidden >
                                    <div style="height:8px; width:8px;"></div>
                                </div>
                                <ul class="pricing-table basic">
                                    <li class="title">
                                        <p style="font-size:18px;"><?php echo $row->TITLE;?><span>（限<?php echo $row->LIMIT;?>人）</span></p>
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
                                        <p><?php if($row->STARTER_GRADE==0){
                                                if($row->STATUS==0){
                                                    ?>活动管理员<?php
                                                }else{
                                                    ?>荣誉会员<?php
                                                }}else{ echo $row->STARTER_GRADE; }?>级以上可发起</p>
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
    <script src="<?php echo base_url('assets/lib/layer/layer.js');?>"></script>
    <script src="<?php echo base_url('assets/js/jquery.form.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/script.js');?>"></script>
    <script>
        $(function(){
            $("#content").css("min-height",$(window).height()-88+"px");
            $('.isotope-item').click(function(){
                $(".shadow").removeClass("shadow");
                $(".check").hide();
                $(this).find(".pricing-table").addClass("shadow");
                $(this).find(".check").show();
                var temid=$(this).find("input").val();
                $("input[name=temId]").val(temid);
            });
            $('#contact-form').ajaxForm({
                beforeSubmit: function(a,f,o) {
                    <?php if(isset($_SESSION['user'])){?>
                    if($("input[name=title]").val()==false){
                        layer.msg('请填写活动名称！');
                        return false;
                    }
                    if($("input[name=brief]").val()==false){
                        layer.msg('请填写活动简介！');
                        return false;
                    }
                    if($("input[name=min_part]").val()==false){
                        layer.msg('请填写最低参与人数！');
                        return false;
                    }
                    if($("input[name=min_part]").val()<2){
                        layer.msg('最低参与人数至少为2！');
                        return false;
                    }
                    if($("input[name=location]").val()==false){
                        layer.msg('请填写活动地点！');
                        return false;
                    }
                    if($("input[name=start_on]").val()==false){
                        layer.msg('请选择活动开始时间！');
                        return false;
                    }
                    if($("input[name=end_on]").val()==false){
                        layer.msg('请选择活动结束时间！');
                        return false;
                    }
                    if($("input[name=reg_start_on]").val()==false){
                        layer.msg('请选择报名开始时间！');
                        return false;
                    }
                    if($("input[name=reg_end_on]").val()==false){
                        layer.msg('请选择报名结束时间！');
                        return false;
                    }
                    if($("input[name=temId]").val()==false){
                        layer.msg('请选择一种活动！');
                        return false;
                    }
                    return true;
                    <?php }else{ ?>
                    layer.msg('请先登录！');
                    return false;
                    <?php }?>
                },
                dataType:"json",
                success: function(data) {
                    if(data.success){
                        layer.msg(data.msg);
                        $("#contact-form :input").not(":button, :submit").val("");
                        $('textarea').val("");
                    }else{
                        layer.msg(data.msg);
                    }
                }
            });
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
            init:false,
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
    </script>
</body>
</html>