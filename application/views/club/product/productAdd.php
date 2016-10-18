<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a id="productList" href="club/productList" class="ajax-link">商品列表</a></li>
			<li><a href="#">添加商品</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
				<i class="fa fa-plus-square"></i>添加商品
				</div>
				<div class="box-icons">
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="productForm" role="form" action="<?php echo base_url('club/productInsert');?>" method="post">
					<div class="form-group">
						<label class="col-sm-2 control-label">商品名称</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="name"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">兑换积分</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="grade" style="width:85px;"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">剩余库存</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="stock" style="width:85px;"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">图片地址</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="imageurl"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">淘宝链接</label>
						<div class="col-sm-3">
							<input type="text" class="form-control" name="taobao" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">描述</label>
						<div class="col-sm-3">
							<textarea name="description" rows="2" cols="40" maxlength="39" class="form-control"></textarea>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary">保 存</button>
							<a class="btn btn-default" onclick="$('#productList').click();">返 回</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).ready(function() {
	$('.form-control').tooltip();
	WinMove();
	var regnum = new RegExp("^[0-9]*$");
	$('#productForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
		    if($('input[name=name]').val().length == 0){			
				$('input[name=nickname]').focus();			
				alert("请填写商品名称！");		
				return false;			
			}
		    if($('input[name=grade]').val().length == 0){			
				$('input[name=grade]').focus();			
				alert("请填写兑换积分！");		
				return false;			
			}
		    if(!regnum.test($('input[name=grade]').val())){			
				$('input[name=grade]').focus();			
				alert("兑换积分格式不正确，请填写正确数字！");		
				return false;			
			}
		    if($('input[name=stock]').val().length == 0){			
				$('input[name=stock]').focus();			
				alert("请填写剩余库存！");		
				return false;			
			}
		    if(!regnum.test($('input[name=stock]').val())){			
				$('input[name=stock]').focus();			
				alert("剩余库存格式不正确，请填写正确数字！");		
				return false;			
			}
		    if($('input[name=imageurl]').val().length == 0){			
				$('input[name=imageurl]').focus();			
				alert("请填写图片地址！");		
				return false;			
			}
			if($('input[name=taobao]').val().length == 0){			
				$('input[name=taobao]').focus();			
				alert("请填写淘宝链接！");		
				return false;			
			}
	    },			
	    success: function(data) {			
	    	alert(data);
	    	$('#productList').click();
	    }			
	});	
});
</script>
