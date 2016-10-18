<div id="messages" class="container-fluid">
	<div class="row">
		<div id="breadcrumb" class="col-xs-12">
			<a href="#" class="show-sidebar">
				<i class="fa fa-bars"></i>
			</a>
			<ol class="breadcrumb pull-left">
				<li><a href="club/dashboard" class="ajax-link">首页</a></li>
				<li><a href="#">消息</a></li>
			</ol>
		</div>
	</div>
	<div class="row" id="test">
		<div class="col-xs-12">
			<div class="row">
					<ul id="messages-menu" class="nav msg-menu">
						<li>
							<a href="" class="" id="msg-my">
								<i class="fa fa-comment-o"></i>
								<span class="hidden-xs">我的消息
								<?php if(count($myMes)!=0){?>
								(<?php echo count($myMes);?>)
								<?php }?></span>
							</a>
						</li>
						<?php if(in_array(1,explode(',',$_SESSION['user']->AUTHORITY))){?>
							<li>
								<a href="index.html" class="" id="msg-vip">
									<i class="fa fa-pencil-square-o"></i>
									<span class="hidden-xs">会员申请
									<?php if(count($vipMes)!=0){?>
									(<?php echo count($vipMes);?>)
									<?php }?></span>
								</a>
							</li>
						<?php }?>
						
						<!-- <li>
							<a href="index.html" class="" id="msg-important">
								<i class="fa fa-bookmark"></i>
								<span class="hidden-xs">Important</span>
							</a>
						</li>
						<li>
							<a href="index.html" class="" id="msg-sent">
								<i class="fa fa-reply"></i>
								<span class="hidden-xs">Sent Mail</span>
							</a>
						</li>
						<li>
							<a href="index.html" class="" id="msg-draft">
								<i class="fa fa-pencil"></i>
								<span class="hidden-xs">Drafts (2)</span>
							</a>
						</li>
						<li>
							<a href="index.html" class="" id="msg-trash">
								<i class="fa fa-trash-o"></i>
								<span class="hidden-xs">Trash</span>
							</a>
						</li> -->
					</ul>
				<div id="messages-list" class="col-xs-10 col-xs-offset-2">
					<!-- <div class="row one-list-message msg-my-item" id="msg-one1">
						<div class="col-xs-1 checkbox">
							<label>
								<input type="checkbox"> Yana Z.
								<i class="fa fa-square-o small"></i>
							</label>
						</div>
						<div class="col-xs-9 message-title"><b>Happy New Year</b> Dear friend! It's title of this message I send Dear friend! It's title of this message I send Dear friend! It's title of this message I send</div>
						<div class="col-xs-2 message-date">12/31/13</div>
					</div>
					<div class="row one-list-message msg-starred-item">
						<div class="col-xs-1 checkbox">
							<label>
								<input type="checkbox"> Linus T.
								<i class="fa fa-square-o small"></i>
							</label>
						</div>
						<div class="col-xs-9 message-title"><b>Announce new release</b> Hi. 3.11.xx is released!</div>
						<div class="col-xs-2 message-date">12/31/13</div>
					</div> 
					<div class="row one-list-message msg-my-item">
						<div class="col-xs-1 checkbox">
							<label>
								<input type="checkbox"> Barry O.
								<i class="fa fa-square-o small"></i>
							</label>
						</div>
						<div class="col-xs-9 message-title"><b>All books is buyed</b> Very nice. I receive you invoice and pay.</div>
						<div class="col-xs-2 message-date">12/31/13</div>
					</div>-->
					<?php  foreach ($myMes as $row){?>
						<div class="row one-list-message msg-my-item">
							<div class="col-xs-9 message-title"><b>系统消息</b>&nbsp;&nbsp;&nbsp; <?php echo $row->CONTENT;?></div>
							<div class="col-xs-2 message-date"><?php echo substr($row->CREATETIME,5,11);?></div>
							<botton class="btn btn-primary" id="<?php echo $row->ID;?>" style="margin:0;line-height:10px;" onclick="read(<?php echo $row->ID;?>);">已读</botton>
						</div>
					<?php }?>
					<?php  foreach ($vipMes as $row){?>
						<div class="row one-list-message msg-vip-item">
							<div class="col-xs-9 message-title"><b>会员申请</b>&nbsp;&nbsp;&nbsp; <?php echo $row->CONTENT;?></div>
							<div class="col-xs-2 message-date"><?php echo substr($row->CREATETIME,5,11);?></div>
							<botton class="btn btn-primary" id="<?php echo $row->ID;?>" style="margin:0;line-height:10px;" onclick="read(<?php echo $row->ID;?>);">已读</botton>
						</div>
					<?php }?>
					
					<div class="row one-list-message msg-one1-item" style="display: none;">
						<div class="box">
							<div class="avatar">
								<img src="img/avatar.jpg" alt="Jane" />
							</div>
							<div class="page-feed-content">
								<small class="time">Jane Devops, 12 min ago</small>
								<p>Linux is a Unix-like and POSIX-compliant computer operating system assembled under the model of free and open source software development and distribution. Maemo - Software platform developed by Nokia and then handed over to Hildon Foundation for smartphones and Internet tablets</p>
								<div class="likebox">
									<ul class="nav navbar-nav">
										<li><i class="fa fa-thumbs-up"></i> 138</li>
										<li><i class="fa fa-thumbs-down"></i> 47</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
// Add listener for redraw menu when windows resized
window.onresize = MessagesMenuWidth;
$(document).ready(function() {
	// Add class for correctly view of messages page
	$('#content').addClass('full-content');
	// Run script for change menu width
	MessagesMenuWidth();
	$('html').animate({scrollTop: 0},'slow');
});
function read(id){
	$.ajax({
	    type: 'POST',
	    url: "<?php echo base_url('club/messageUpdate');?>",
	    async:false,
	    data: {id:id} ,
	    success: function(data){
    	    		if(data=="true"){
    	    			$('#'+id).attr("disabled",true);
    	    		}
    	 		}
	});
}
</script>
