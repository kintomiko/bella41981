<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="#">会员管理</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-group"></i>
					<span>会员列表</span>
				</div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>会员号</th>
							<th>昵称</th>
							<th>性别</th>
							<th>所属省份</th>
							<th>入会时间</th>
							<th style="width:55px;">操作</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php  foreach ($user as $k=>$row){?>
						<tr>
							<td><?php echo $row->CODE;?></td>
							<td><?php echo $row->NICKNAME;?></td>
							<td><?php if($row->SEX==1){?>男<?php }?><?php if($row->SEX==2){?>女<?php }?></td>
							<td><?php echo $row->CLUB;?></td>
							<td><?php echo substr($row->IN_DATE,0,16);?></td>
							<td><a class="ajax-link" href="club/getUserInfo?id=<?php echo $row->USER_ID;?>" title="查看"><i class="fa fa-eye"></i></a>
							 &nbsp;<a class="ajax-link" href="club/toUpdateUser?id=<?php echo $row->USER_ID;?>" title="编辑"><i class="fa fa-edit"></i></a></td>
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
	TestTable1(5);
}
$(document).ready(function() {
	//LoadDataTablesScripts(AllTables);
	//WinMove();
	AllTables();
	$(this).find('label input[type=Search]').attr('class', 'form-control');
	$(this).find('label input[type=Search]').attr('placeholder', '搜 索');
	$(this).find('label select[name=datatable-1_length]').attr('class', 'form-control');
	if($('table').width()<476){
		$('#datatable-1').dataTable().fnSetColumnVis( 2, false );
		$('#datatable-1').dataTable().fnSetColumnVis( 3, false );
		if($('table').width()<421){
			$('#datatable-1').dataTable().fnSetColumnVis( 4, false );
		}
	}
});
</script>



