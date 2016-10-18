<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="#">会员申请列表</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-group"></i>
					<span>会员申请列表</span>
				</div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable appro" id="datatable-1">
					<thead>
						<tr>
							<th>序号</th>
							<th>昵称</th>
							<th>百度贴吧ID</th>
							<th>新浪微博</th>
							<th>QQ</th>
							<th>所属省份</th>
							<th>申请时间</th>
							<th style="width:30px;">操作</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php  foreach ($user as $k=>$row){?>
						<tr>
							<td><?php echo $k+1;?></td>
							<td><?php echo $row->NICKNAME;?></td>
							<td><?php echo $row->BAIDU; ?></td>
							<td><?php echo $row->SINA; ?></td>
							<td><?php echo $row->QQ; ?></td>
							<td><?php echo $row->CLUB;?></td>
							<td><?php echo substr($row->CREATE_TIME,0,16);?></td>
							<td><a class="ajax-link" href="club/approvalInfo?id=<?php echo $row->USER_ID;?>" title="审批"><i class="fa fa-edit"></i></a></td>
						</tr> 
					<?php }?>
					<!-- End: list_row -->
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
// Run Datables plugin and create 3 variants of settings
function AllTables(){
	TestTable1(7);
}
$(document).ready(function() {
	//LoadDataTablesScripts(AllTables);
	//WinMove(); 
	AllTables(); 
	$(this).find('label input[type=Search]').attr('class', 'form-control');
	$(this).find('label input[type=Search]').attr('placeholder', '搜 索');
	$(this).find('label select[name=datatable-1_length]').attr('class', 'form-control');
	if($(window).width()<476){
		$('.appro').dataTable().fnSetColumnVis( 3, false );
		$('.appro').dataTable().fnSetColumnVis( 5, false );
		if($(window).width()<421){
			$('.appro').dataTable().fnSetColumnVis( 0, false );
			$('.appro').dataTable().fnSetColumnVis( 4, false );
			$('.appro').dataTable().fnSetColumnVis( 6, false );
		}
	}
});
</script>



