<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="club/cashAdmin" class="ajax-link" id="cashAdmin">兑换管理</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-truck"></i>
					<span>兑换管理</span>
				</div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th>会员号</th>
							<th>昵称</th>
							<th>礼品</th>
							<th>所用积分</th>
							<th>状态</th>
							<th>兑换时间</th>
							<th style="width:55px;">操作</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php  foreach ($cashList as $k=>$row){?>
						<tr>
							<td><?php echo $row->CODE;?></td>
							<td><?php echo $row->NICKNAME;?></td>
							<td><?php echo $row->productName;?></td>
							<td><?php echo $row->GRADE;?></td>
							<td><?php if($row->STATUS==1){?>兑换成功<?php }?><?php if($row->STATUS==0){?>待确认下单<?php }?></td>
							<td><?php echo substr($row->CREATETIME,0,16);?></td>
							<td><?php if($row->STATUS==0){?><a onclick="confirmCash(<?php echo $row->ID;?>);" title="确认兑换"><i class="fa fa-edit"></i></a><?php }?></td>
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
	TestTable1(6);
}
$(document).ready(function() {
	//LoadDataTablesScripts(AllTables);
	//WinMove();
	AllTables();
	$(this).find('label input[type=Search]').attr('class', 'form-control');
	$(this).find('label input[type=Search]').attr('placeholder', '搜 索');
	$(this).find('label select[name=datatable-1_length]').attr('class', 'form-control');
	if($('table').width()<476){
		$('#datatable-1').dataTable().fnSetColumnVis( 1, false );
		if($('table').width()<421){
			$('#datatable-1').dataTable().fnSetColumnVis( 3, false );
		}
	}
});
function confirmCash(id){
	var r=confirm("确认已兑换？");
	if (r==true){
		$.ajax({
		    type: 'POST',
		    url: "<?php echo base_url('club/confirmCash');?>",
		    async:false,
		    data: {id:id} ,
		    success: function(data){
	    	    		if(data=="false"){
	    	    			alert("确认异常！");
	    	    		}else{
	        	    		alert("确认成功");
	        	    		$('#cashAdmin').click();
			    	    }
	    	 		}
		});
	}
}
</script>



