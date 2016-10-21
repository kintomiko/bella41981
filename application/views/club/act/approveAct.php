<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <a href="#" class="show-sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <ol class="breadcrumb pull-left">
            <li><a href="club/dashboard" class="ajax-link">首页</a></li>
            <li><a id="approveActList" href="club/approveActList" class="ajax-link">活动审批</a></li>
            <li><a href="#">审批活动</a></li>
        </ol>

    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-plus-square"></i>发起活动
                </div>
                <div class="box-icons">
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content">
                <form class="form-horizontal" id="actForm" role="form" action="<?php echo base_url('club/doApproveAct');?>" method="post">
                    <input type="hidden" name="act_id" value="<?php echo $act->ID ;?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">活动标题</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->TITLE ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">发起者</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->STARTER_ID ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">参与者积分奖励</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->CREDIT ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">参与人数</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->CUR_PART." / ".$act->MAX_PART ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">等级要求</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->GRADE ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">区域要求</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->PROVINCE_CODE ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">开始时间</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->START_ON ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">详细地址</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->LOCATION ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->DESC ;?></span>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                            <?php if(in_array('0', explode(",", $_SESSION['user']->AUTHORITY))){?><button type="submit" class="btn btn-primary">审批通过</button><?php } ?>
                            <a class="btn btn-default" onclick="$('#approveActList').click();">返 回</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#actForm').ajaxForm({
            beforeSubmit: function(a,f,o) {
                return true;
            },
            success: function(data) {
                //if(data=="true"){
                alert("提交成功！");
                $('#approveActList').click();
                //}else{
                //	alert(data);
                //}
            }
        });
    })
</script>