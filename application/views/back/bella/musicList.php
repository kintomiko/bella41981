<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>二傻视频总汇</title>
<meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="">
<meta name="author" content="">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/lib/bootstrap/css/bootstrap.min.css');?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/theme.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/lib/font-awesome/css/font-awesome.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/lib/jBreadcrumbs/css/BreadCrumb.css');?>" />
<script src="<?php echo base_url('assets/lib/jquery-1.8.3.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/datatable/jquery.dataTables.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/datatable/Scroller.min.js');?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/lib/datatable/gebo_datatables.js');?>" type="text/javascript"></script>
<!-- Demo page code -->
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<!--[if lt IE 7 ]> <body class="ie ie6"> <![endif]-->
<!--[if IE 7 ]> <body class="ie ie7 "> <![endif]-->
<!--[if IE 8 ]> <body class="ie ie8 "> <![endif]-->
<!--[if IE 9 ]> <body class="ie ie9 "> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<script>
function newVideo(url){
	alert(url)
	window.location.reload(url)
	//window.location.href=url;
	//window.open(url);
}
</script>
<style>
.span6 label{
	float:right;
}
.span6 label select{
	width:70px;
}
.span6 label input{
	width:400px;
}
.row {
	padding-left:30px;
}
.container-fluid{
				padding-left:10px;
			}
</style>
<body class="">
	<!--<![endif]-->
	<div class="content">
		<nav>
                        <div id="jCrumbs" class="breadCrumb module">
                            <ul>
                                <li>
                                    <a href="#"><i class="icon-home"></i></a>
                                </li>
                                <li>
                                    Bella
                                </li>
                                <li>
                                    	音频列表 
                                </li>
                            </ul>
                        </div>
                    </nav>
		<div class="container-fluid">
			<div class="row-fluid">
					<!--  <button class="btn btn-primary" onClick="window.location.href='<?php echo base_url('back/musicAdd');?>';">
					<a style="color:white;" href="<?php echo base_url('back/musicAdd');?>"><i class="icon-plus"></i> 新资源</a>
					</button>-->
				<!-- <div class="btn-toolbar">
					<button class="btn">Import</button>
					<div class="btn-group"></div>
				</div> -->
				<div class="row-fluid" style="height: 480px;">
                        <div class="span12" style="height: 480px;">
                            <table class="table table-striped table-bordered dTableR" id="dt_a" style="overflow-x: auto; overflow-y: auto;">
                                <thead>
									<tr>
										<th class="clickdate">名称</th>
										<th>分类</th>
										<th>年份</th>
										<th>原唱</th>
										<th>链接</th>
										<th>备注</th>
										<th></th>
									</tr>
								</thead>
								<tbody>
								<?php  foreach ($musicList as $row){?>
									<tr>
										<td style="width:180px;"><?php echo $row->TITLE;?></td>
										<td style="width:100px;"><?php echo $row->TYPE;?></td>
										<td style="width:35px;"><?php echo $row->YEAR;?></td>
										<td style="width:35px;"><?php echo $row->ORIGINAL;?></td>
										<td style="width:90px;"><?php if(strlen($row->URL)>0){?><a href="<?php echo $row->URL;?>" target="_Blank">试听下载</a>&nbsp;&nbsp;<?php }if(strlen($row->LOSSLESS)>0){?>
										<a href="<?php echo $row->LOSSLESS;?>" target="_Blank">无损</a><?php }?></td>
										<td ><?php echo $row->REMARK;?></td>
										<td style="width:26px;">
										<?php if($user->AUTHORITY=="0"||$user->AUTHORITY=="1"){?>
										<a href="<?php echo base_url('bella/musicUpdate/'.$row->MUSIC_ID);?>"><i class="icon-pencil"></i></a>
											<!-- <a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a> -->
										<?php }?>
										</td>
									</tr>
								<?php }?>
								</tbody>
							</table>
                        </div>
                    </div>
				<div class="modal small hide fade" id="myModal" tabindex="-1"
					role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal"
							aria-hidden="true">×</button>
						<h3 id="myModalLabel">Delete Confirmation</h3>
					</div>
					<div class="modal-body">
						<p class="error-text">
							<i class="icon-warning-sign modal-icon"></i>Are you sure you want
							to delete the user?
						</p>
					</div>
					<div class="modal-footer">
						<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
						<button class="btn btn-danger" data-dismiss="modal">Delete</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
<script>
	$(document).ready(function() {
		$('.clickdate').each(function(){$(this).click();});
		var str="<button class='btn btn-primary' onClick='window.location.href='<?php echo base_url('bella/musicAdd');?>''; >"+
		"<a style='color:white;' href='<?php echo base_url('bella/musicAdd');?>'><i class='icon-plus'></i> 新资源</a></button>";
		<?php if($user->AUTHORITY=="0"||$user->AUTHORITY=="1"){?>
		$('#dt_a_length').append(str);
		<?php }?>
	});
</script>
</html>


