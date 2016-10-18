<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="#">操作记录</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-group"></i>
					<span>操作记录</span>
				</div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-2">
					<thead>
						<tr>
							<th id="createdate">操作时间</th>
							<th>操作内容</th>
							<th>操作人</th>
							<th>操作对象</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php  foreach ($operateList as $row){?>
						<tr>
							<td><?php echo $row->CREATEDATE;?></td>
							<td><?php echo $row->CONTENT;?></td>
							<td><?php echo $row->NICKNAME;?></td>
							<td><?php echo $row->OBJ;?></td>
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
	TestTable2();
}

$(document).ready(function() {
	// Add Drag-n-Drop feature
	WinMove();
	AllTables();
	$(this).find('label input[type=Search]').attr('class', 'form-control');
	$(this).find('label input[type=Search]').attr('placeholder', '搜 索');
	$(this).find('label select[name=datatable-1_length]').attr('class', 'form-control');
});
function delAdmin(name,id){
	if(confirm("是否撤销"+name+"的管理员权利？")){
		$.ajax({
    	    type: 'POST',
    	    url: "<?php echo base_url('club/delAdmin');?>",
    	    async:false,
    	    data: {id:id} ,
    	    success: function(data){
	    	    		if(data=="true"){
	    	    			alert("撤销成功！");
	    	    			$('#adminList').click();
	    	    		}else{
	    	    			alert("撤销失败！");
			    	    }
	    	 		}
    	});
	}
}
</script>



