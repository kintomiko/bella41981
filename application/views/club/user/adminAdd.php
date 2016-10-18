<div class="row">
	<div id="breadcrumb" class="col-xs-12">
		<a href="#" class="show-sidebar">
			<i class="fa fa-bars"></i>
		</a>
		<ol class="breadcrumb pull-left">
			<li><a href="club/dashboard" class="ajax-link">首页</a></li>
			<li><a href="club/adminList" class="ajax-link" id="adminList">管理员列表</a></li>
			<li><a href="#">添加管理员</a></li>
		</ol>
		
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12">
		<div class="box">
			<div class="box-header">
				<div class="box-name">
				</div>
				<div class="box-icons">
					
				</div>
				<div class="no-move"></div>
			</div>
			<div class="box-content">
				<form class="form-horizontal" id="defaultForm" role="form" action="<?php echo base_url('club/adminAddSave');?>" method="post">
					<input type="hidden" name="user_id" id="user_id" value="">
					<div class="form-group">
						<label class="col-sm-2 control-label">会员编号</label>
						<div class="col-sm-3">
							<input type="text" name="code" style="width:75%;float:left;" class="form-control" value="">
							<a type="submit" style="float:left;padding:0px 8px;" class="btn btn-warning btn-label-left" onclick="findUser();">查 找</a>
							<span class="error" id="code" style="color:red;">请填写会员编号！</span>
						</div>
					</div>
					<div class="form-group" id="nickDiv" hidden>
						<label class="col-sm-2 control-label">昵称</label>
						<div class="col-sm-3">
							<span class="col-sm-8" id="nickname" style="padding:4px 0 0;"></span>
						</div>
					</div>
					<div class="form-group" id="provinceDiv" hidden>
						<label class="col-sm-2 control-label">所属省份</label>
						<div class="col-sm-3">
							<span class="col-sm-8" id="province" style="padding:4px 0 0;"></span>
						</div>
					</div>
					<h4 class="page-header"></h4>
					<div class="row form-group">
						<label class="col-sm-2 control-label">管理权限</label>
						<div class="col-sm-10" style="float:right;">
							<?php  foreach ($province as $row){?>
								<div class="checkbox-inline" style="margin-left:0;width:100px;"><label>
									<input type="checkbox" name="auth[]" value="<?php echo $row->CODE;?>"> <?php echo $row->NAME;?> <i class="fa fa-square-o"></i>
								</label></div>
							<?php }?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-2">
							<button type="submit" class="btn btn-primary">添 加</button>
							<a class="btn btn-default" onclick="$('#adminList').click();">返 回</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$(document).ready(function() {
	$('.error').hide();
	$('.form-control').tooltip();
	WinMove();
	$('#defaultForm').ajaxForm({				
	    beforeSubmit: function(a,f,o) {	
		    $('.error').hide();
	    	var param=true;
		    if($('#user_id').val().length == 0){			
		    	$('#code').text("请查找需要升为管理员的会员！");	
			    $('#code').show("fast");	
				return false;			
			}
			return param;
	    },			
	    success: function(data) {	
	    	$('.error').hide();
	    	if(data=="true"){
		    	alert("添加成功！");
		    	$('#adminList').click();
		    }else{
			    alert("添加失败！");
			}
	    }			
	});	

	
});
function findUser(){
	if($('input[name=code]').val().length ==0){
		$('input[name=code]').focus();	
		$('#code').text("请填写会员编号！");			
		$('#code').show("fast");	
		return false;	
	}
	$('#code').hide();
	$.ajax({
	    type: 'POST',
	    url: "<?php echo base_url('club/findUserByCode');?>",
	    async:false,
	    data: {code:$('input[name=code]').val()} ,
	    dataType:"json",
	    success: function(data){
    	    		if(data==false){
    	    			alert("查询异常！");
    	    			$('#nickDiv').hide();
                	    $('#provinceDiv').hide();
                	    $('#user_id').val("");
    	    		}else{
        	    		if(data==true){
        	    			$('#code').text("该会员已是管理员！");	
        				    $('#code').show("fast");
        				    $('#nickDiv').hide();
                    	    $('#provinceDiv').hide();
                    	    $('#user_id').val("");
            	    	}else{
                	    	if(data==null){
                	    		$('#code').text("该会员不存在！");	
        					    $('#code').show("fast");
        					    $('#nickDiv').hide();
                        	    $('#provinceDiv').hide();
                        	    $('#user_id').val("");
                    	    }else{
                        	    $('#user_id').val(data.USER_ID);
                        	    $('#nickname').text(data.NICKNAME);
                        	    $('#province').text(data.CLUB);
                        	    $('#nickDiv').show("fast");
                        	    $('#provinceDiv').show("fast");
                        	}
                	    }
		    	    }
    	 		}
	});
}
</script>
