<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a id="productList" href="club/productList" class="ajax-link">商品列表</a></li>
		</ol>
	</div>
</div>
<div class="row">
	<div class="col-xs-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
					<i class="fa fa-th-list"></i>
					<span>商品列表</span>
				</div>
				<div class="box-icons">
					<a href="club/productAdd" class="beauty-table-to-json ajax-link">添加</a>
				</div>
			</div>
			<div class="box-content no-padding">
				<table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
					<thead>
						<tr>
							<th style="width:100px;">展示</th>
							<th>商品名称</th>
							<th>兑换积分</th>
							<th>剩余库存</th>
							<th>已兑换</th>
							<th>状态</th>
							<th>更新时间</th>
							<th style="width:40px;">操作</th>
						</tr>
					</thead>
					<tbody>
					<!-- Start: list_row -->
					<?php  foreach ($productList as $k=>$row){?>
						<tr>
							<td><img src="<?php echo $row->IMAGEURL;?>" style="width:100px;"/></td>
							<td><a href="<?php echo $row->TAOBAO;?>" target="_blank" ><?php echo $row->NAME;?></a></td>
							<td><?php echo $row->GRADE;?></td>
							<td><?php echo $row->STOCK;?></td>
							<td><?php echo $row->COUNT;?></td>
							<td><?php if($row->STATUS==1){?>在售<?php }?><?php if($row->STATUS==0){?>已下架<?php }?></td>
							<td><?php echo $row->DATE;?></td>
							<td><a class="ajax-link" href="club/updateProduct?id=<?php echo $row->ID;?>" title="编辑"><i class="fa fa-edit"></i></a>
							<?php if($row->STATUS==1){?>&nbsp;<a href="#" onclick="product('<?php echo $row->ID;?>',0);" title="下架"><i class="fa fa-hand-o-down"></i></a><?php }?>
							<?php if($row->STATUS==0){?>&nbsp;<a href="#" onclick="product('<?php echo $row->ID;?>',1);" title="上架"><i class="fa fa-hand-o-up"></i></a><?php }?>
							</td>
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
	if($('table').width()<476){
		$('#datatable-1').dataTable().fnSetColumnVis( 0, false );
		$('#datatable-1').dataTable().fnSetColumnVis( 3, false );
		$('#datatable-1').dataTable().fnSetColumnVis( 5, false );
		if($('table').width()<421){
			$('#datatable-1').dataTable().fnSetColumnVis( 1, false );
			$('#datatable-1').dataTable().fnSetColumnVis( 4, false );
		}
	}
});
function product(id,status){
	var str="";
	if(status==1){
		str="上架";
	}else{
		str="下架";
	}
	if(confirm("确定"+str+"？")){
		$.ajax({
    	    type: 'POST',
    	    url: "<?php echo base_url('club/upOrDownPro');?>",
    	    async:false,
    	    data: {id:id,status:status} ,
    	    success: function(data){
	    	    		if(data=="true"){
	    	    			alert(str+"成功！");
	    	    			$('#productList').click();
	    	    		}else{
	    	    			alert(str+"失败！");
			    	    }
	    	 		}
    	});
	}
}
</script>



