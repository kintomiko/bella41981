<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>90Zone</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/blue.css');?>" id="link_theme" />
        <link rel="stylesheet" href="<?php echo base_url('assets/lib/qtip2/jquery.qtip.min.css');?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css');?>" />
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=PT+Sans" />
        <!--[if lte IE 8]>
            <link rel="stylesheet" href="css/ie.css" />
            <script src="js/ie/html5.js"></script>
			<script src="js/ie/respond.min.js"></script>
			<script src="lib/flot/excanvas.min.js"></script>
        <![endif]-->
		
		<script>
			//* hide all elements & show preloader
			document.documentElement.className += 'js';
		</script>
		<script type="text/javascript">
			function link(str){
				$('#content').attr('src',$('#base_url').val()+str);
			}
			function logout(){
				window.location.href=$('#base_url').val()+"back/logout";
			}
		</script>
		<style>
			.main_content{
				padding-top:47px;
				padding-bottom:0;
				margin-right:0;
				margin-left:0;
				padding-right:0;
				padding-left:10px;
			}
			.antiscroll-inner{
				display:none;
			}
			.sidebar_switch {
				hidden:true;
			}
			
		</style>
    </head>
    <body>
		<div id="loading_layer" style="display:none"><img src="<?php echo base_url('assets/image/ajax_loader.gif');?>" alt="" /></div>
		<div id="maincontainer" class="clearfix">
			<!-- header -->
            <header>
                <div class="navbar navbar-fixed-top">
                    <div class="navbar-inner">
                        <div class="container-fluid" >
                            <a class="brand" href="#"><i class="icon-home icon-white"></i> 90 ZONE</a>
                            <ul class="nav user_menu pull-right">
                                <!-- <li class="hidden-phone hidden-tablet">
                                    <div class="nb_boxes clearfix">
                                        <a data-toggle="modal" data-backdrop="static" href="#myMail" class="label ttip_b" title="New messages">25 <i class="splashy-mail_light"></i></a>
                                        <a data-toggle="modal" data-backdrop="static" href="#myTasks" class="label ttip_b" title="New tasks">10 <i class="splashy-calendar_week"></i></a>
                                    </div>
                                </li>  -->
								<!-- <li class="divider-vertical hidden-phone hidden-tablet"></li> -->
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->NICKNAME ;?><b class="caret"></b></a>
                                    <ul class="dropdown-menu">
										<!-- <li><a href="user_profile.html">My Profile</a></li>
										<li><a href="javascrip:void(0)">Another action</a></li>
										<li class="divider"></li> -->
										<li><a href="#" onclick="logout();">退出</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <nav>
                                <div class="nav-collapse">
                                    <ul class="nav">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-list-alt icon-white"></i> Bella <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="javascript:void(0);" onclick="link('bella/videoList')" >视频总汇</a></li>
                                                <li><a href="javascript:void(0);" onclick="link('bella/musicList')" >音频列表</a></li>
                                            </ul>
                                        </li>
                                        <!-- <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-th icon-white"></i> Components <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="alerts_btns.html">Alerts & Buttons</a></li>
                                                <li><a href="icons.html">Icons</a></li>
                                                <li><a href="notifications.html">Notifications</a></li>
                                                <li><a href="tables.html">Tables</a></li>
												<li><a href="tables_more.html">Tables (more examples)</a></li>
                                                <li><a href="tabs_accordion.html">Tabs & Accordion</a></li>
                                                <li><a href="tooltips.html">Tooltips, Popovers</a></li>
                                                <li><a href="typography.html">Typography</a></li>
												<li><a href="widgets.html">Widget boxes</a></li>
												<li class="dropdown">
													<a href="#">Sub menu <b class="caret-right"></b></a>
													<ul class="dropdown-menu">
														<li><a href="#">Sub menu 1.1</a></li>
														<li><a href="#">Sub menu 1.2</a></li>
														<li><a href="#">Sub menu 1.3</a></li>
														<li>
															<a href="#">Sub menu 1.4 <b class="caret-right"></b></a>
															<ul class="dropdown-menu">
																<li><a href="#">Sub menu 1.4.1</a></li>
																<li><a href="#">Sub menu 1.4.2</a></li>
																<li><a href="#">Sub menu 1.4.3</a></li>
															</ul>
														</li>
													</ul>
												</li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-wrench icon-white"></i> Plugins <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="charts.html">Charts</a></li>
                                                <li><a href="calendar.html">Calendar</a></li>
                                                <li><a href="datatable.html">Datatable</a></li>
                                                <li><a href="file_manager.html">File Manager</a></li>
                                                <li><a href="floating_header.html">Floating List Header</a></li>
                                                <li><a href="google_maps.html">Google Maps</a></li>
                                                <li><a href="gallery.html">Gallery Grid</a></li>
                                                <li><a href="wizard.html">Wizard</a></li>
                                            </ul>
                                        </li>
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"><i class="icon-file icon-white"></i> Pages <b class="caret"></b></a>
                                            <ul class="dropdown-menu">
                                                <li><a href="chat.html">Chat</a></li>
                                                <li><a href="error_404.html">Error 404</a></li>
												<li><a href="mailbox.html">Mailbox</a></li>
                                                <li><a href="search_page.html">Search page</a></li>
                                                <li><a href="user_profile.html">User profile</a></li>
												<li><a href="user_static.html">User profile (static)</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                        </li> -->
                                        <li class="dropdown">
                                            <a data-toggle="modal" data-backdrop="static" class="dropdown-toggle" href="#myMail"><i class="icon-book icon-white"></i> 使用说明</a>
                                        </li>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="modal hide fade" id="myMail">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">×</button>
                        <h3>使用说明</h3>
                    </div>
                    <div class="modal-body">
                        <div class="alert alert-info">使用说明仅针对表格</div>
                        <table class="table table-condensed table-striped" data-rowlink="a">
                            <tbody>
                                <tr>
                                    <td>1.点击“表头”可对相对应的列进行排序。</td>
                                </tr>
                                <tr>
                                    <td>2.“查找”内容的区域为表格全部内容。</td>
                                   
                                </tr>
                                <tr>
                                    <td>3.遇到需要跨列查找的信息，例如想查询在北京唱的也许明天，可输入“北京+空格+也许明天”，支持多列同时查找，中间需以空格分割。</td>
                                    
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn">关闭</button>
                    </div>
                </div>
            </header>
            
            <!-- main content -->
            <input id="base_url" type="hidden" value="<?php echo base_url();?>" />
            <div id="contentwrapper">
            <div class="main_content">
            	<iframe id="content" frameborder=0 border="0" marginwidth="0" src="" style="width:100%;height:570px;" onLoad="iFrameHeight()"></iframe>
            </div>
            </div>
			<!-- sidebar -->
            <a href="javascript:void(0)" class="sidebar_switch off_switch ttip_r" title="Hide Sidebar">Sidebar switch</a>
            <div class="sidebar">
				<div class="antiScroll">
					<div class="antiscroll-inner">
						<div class="antiscroll-content" style="width:223px;">
							<div class="sidebar_inner">
								<form action="index.php?uid=1&amp;page=search_page" class="input-append" method="post" >
									<input autocomplete="off" name="query" class="search_query input-medium" size="16" type="text" placeholder="Search..." /><button type="submit" class="btn"><i class="icon-search"></i></button>
								</form>
								<div id="side_accordion" class="accordion">
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseOne" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-folder-close"></i> Content
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseOne">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Articles</a></li>
													<li><a href="javascript:void(0)">News</a></li>
													<li><a href="javascript:void(0)">Newsletters</a></li>
													<li><a href="javascript:void(0)">Comments</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseTwo" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-th"></i> Modules
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseTwo">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Content blocks</a></li>
													<li><a href="javascript:void(0)">Tags</a></li>
													<li><a href="javascript:void(0)">Blog</a></li>
													<li><a href="javascript:void(0)">FAQ</a></li>
													<li><a href="javascript:void(0)">Formbuilder</a></li>
													<li><a href="javascript:void(0)">Location</a></li>
													<li><a href="javascript:void(0)">Profiles</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseThree" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-user"></i> Account manager
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseThree">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li><a href="javascript:void(0)">Members</a></li>
													<li><a href="javascript:void(0)">Members groups</a></li>
													<li><a href="javascript:void(0)">Users</a></li>
													<li><a href="javascript:void(0)">Users groups</a></li>
												</ul>
												
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseFour" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-cog"></i> Configuration
											</a>
										</div>
										<div class="accordion-body collapse" id="collapseFour">
											<div class="accordion-inner">
												<ul class="nav nav-list">
													<li class="nav-header">People</li>
													<li class="active"><a href="javascript:void(0)">Account Settings</a></li>
													<li><a href="javascript:void(0)">IP Adress Blocking</a></li>
													<li class="nav-header">System</li>
													<li><a href="javascript:void(0)">Site information</a></li>
													<li><a href="javascript:void(0)">Actions</a></li>
													<li><a href="javascript:void(0)">Cron</a></li>
													<li class="divider"></li>
													<li><a href="javascript:void(0)">Help</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapseLong" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
												<i class="icon-leaf"></i> Long content (scrollbar)
											</a>
										</div>
									</div>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a href="#collapse7" data-parent="#side_accordion" data-toggle="collapse" class="accordion-toggle">
											   <i class="icon-th"></i> Calculator
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            
            <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery.actual.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/jquery.cookie.min.js');?>"></script>
			<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js');?>"></script>
			<script src="<?php echo base_url('assets/lib/qtip2/jquery.qtip.min.js');?>"></script>
			<script src="<?php echo base_url('assets/js/ios-orientationchange-fix.js');?>"></script>
			<script src="<?php echo base_url('assets/lib/antiscroll/antiscroll.js');?>"></script>
			<script src="<?php echo base_url('assets/js/gebo_common.js');?>"></script>
			<script>
				$(document).ready(function() {
					//* show all elements & remove preloader
					setTimeout('$("html").removeClass("js")',1000);
					$('.ssw_trigger').remove();
					$('.sidebar_switch').remove();
					//$('.sidebar_switch').hide();
				});
			</script>
		</div>
	</body>
</html>