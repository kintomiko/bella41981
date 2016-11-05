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
                    <i class="fa fa-plus-square"></i>活动参与确认
                </div>
                <div class="box-icons">
                </div>
                <div class="no-move"></div>
            </div>
            <div class="box-content">
                在<?php echo $act->START_ON ;?>举行的活动<?php echo $act->TITLE ;?>中，您对会员<?php echo $toUser->NICKNAME."(".$toUser->CODE.")" ;?>的评价如何？
                <form class="form-horizontal" id="confirmForm" role="form" action="<?php echo base_url('act/doConfirm');?>" method="post">
                    <input type="hidden" name="act_id" value="<?php echo $act->ID ;?>">
                    <input type="hidden" name="to_user_id" value="<?php echo $toUser->USER_ID ;?>">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">评价</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="comment"/>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-primary">是个好人,提交评价</button>
                            <!--                            <a class="btn btn-default" onclick="$('#actList').click();">返 回</a>-->
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $("#confirmForm").ajaxForm({
            beforeSubmit: function(a,f,o) {
                return true;
            },
            success: function(data) {
                if(data=="true"){
                    alert("成功！");
                }else{
                    alert("失败！");
                }
                location.reload();
            }
        })
    });
</script>
