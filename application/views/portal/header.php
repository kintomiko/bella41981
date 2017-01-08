<!--/**-->
<!-- * Created by IntelliJ IDEA.-->
<!-- * User: 90-->
<!-- * Date: 2016/10/28-->
<!-- * Time: 10:59-->
<!-- */-->
<div class="navbar navbar-default navbar-fixed-top">
    <!-- <div class="top-line">
       <div class="container">
           <p>
               <span><i class="fa fa-weibo"></i><a style="color:#9CA2A3;" href="http://weibo.com/yaobeinafans?from=myfollow_all&is_all=1" target="_blank">姚贝娜全国歌迷会</a></span>
               <span><i class="fa fa-diamond"></i>392457740</span>
           </p>
       </div>
   </div>  -->
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
                <li><a class="index" page="index" href="<?php echo base_url('portal');?>">首页</a></li>
                <!-- <li class="drop"><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/index.html">Sliders</a>
                    <ul class="drop-down">
                        <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/index.html">Home Default</a></li>
                        <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/home-shop.html">Home Shop</a></li>
                        <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/home-portfolio.html">Home Portfolio</a></li>
                        <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/home-blog.html">Home blog</a></li>
                        <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/single-page.html">Single Page</a></li>
                        <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/home-boxed.html">Home Boxed</a></li>
                        <li class="drop"><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/index.html#">Level 3</a>
                            <ul class="drop-down level3">
                                <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/index.html#">Level 3</a></li>
                                <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/index.html#">Level 3</a></li>
                                <li><a href="http://demo.cssmoban.com/cssthemes3/mbts_23_convertible/index.html#">Level 3</a></li>
                            </ul>
                        </li>
                    </ul>
                </li> -->
                <li style="margin-left:20px;"><a class="activity" page="activity" href="<?php echo base_url('portal/activity');?>">活动</a></li>
                <li style="margin-left:20px;"><a class="shop" page="shop" href="<?php echo base_url('portal/shop');?>">积分兑换</a></li>
                <li style="margin-left:15px;"><a href="https://item.taobao.com/item.htm?spm=a1z10.1-c.w137644-14153656859.39.gcSLMC&id=531690193912" target="_blank">友情赞助</a></li>
                <li class="drop" style="margin-left:20px;width:45px;"><a class="help" href="#">帮助</a>
                    <ul class="drop-down">
                        <li><a page="help" href="<?php echo base_url('portal/regGuide');?>">注册指南</a></li>
                        <li><a page="help" href="<?php echo base_url('portal/numerical');?>">积分说明</a></li>
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
                <li style="margin-left:0px;"><a style="color:red;" href="" target="_blank"></a></li>
            </ul>
        </div>
    </div>
</div>