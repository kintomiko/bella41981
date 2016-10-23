<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <a href="#" class="show-sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <ol class="breadcrumb pull-left">
            <li><a href="club/dashboard" class="ajax-link">首页</a></li>
        </ol>

    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-plus-square"></i>活动详情
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
                        <label class="col-sm-2 control-label">状态</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;">
                                <?php if($act->STATUS==400){?>已拒绝<?php }?>
                                <?php if($act->STATUS==300){?>已结束<?php }?>
                                <?php if($act->STATUS==200){?>组织中<?php }?>
                                <?php if($act->STATUS==100){?>待审批<?php }?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">参与者积分奖励</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->CREDIT ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">人数上限</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->MAX_PART ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">人数下限</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->MIN_PART ;?></span>
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
                        <label class="col-sm-2 control-label">结束时间</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->END_ON ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">报名开始时间</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->REG_START_ON ;?></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">报名结束时间</label>
                        <div class="col-sm-3">
                            <span class="col-sm-8" style="padding:4px 0 0;"><?php echo $act->REG_END_ON ;?></span>
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
                    <div class="box-content no-padding">
                        <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
                            <thead>
                            <tr>
                                <th>参与者</th>
                                <th>状态</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!-- Start: list_row -->
                            <?php  foreach ($participants as $k=>$row){?>
                                <tr>
                                    <td><?php echo $row->USER_ID;?></td>
                                    <td><?php if($row->STATUS==1){?>已确认<?php }?><?php if($row->STATUS==0){?>已加入<?php }?></td>

                                </tr>
                            <?php }?>
                            <!-- End: list_row -->
                            </tbody>
                        </table>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
<!--                            for super admin-->
                            <?php if(in_array('0', explode(",", $_SESSION['user']->AUTHORITY))){?>
                                <button type="submit" class="btn btn-primary" name="action" value="approve">审批通过</button>
                                <button type="submit" class="btn btn-primary" name="action" value="reject">拒绝活动</button>
                            <?php } ?>
<!--                            for all-->
                            <button type="submit" class="btn btn-primary" name="action" value="join" <?php if ($isInAct){?> disabled <?php } ?> >
                                <?php if ($isInAct){?> 已加入 <?php }else{ ?>参与活动 <?php } ?>
                            </button>
<!--                            <a class="btn btn-default" onclick="window.history.back()">返 回</a>-->
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
                debugger;
                    if(data=="true"){
                        alert("成功！");
                    }else{
                        alert("失败！");
                    }
                location.reload();
            }
        });
    })
</script>