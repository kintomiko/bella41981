<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <a href="#" class="show-sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <ol class="breadcrumb pull-left">
            <li><a href="club/dashboard" class="ajax-link">首页</a></li>
            <li><a id="actList" href="club/actList" class="ajax-link">全部活动</a></li>
            <li><a href="#">发起活动</a></li>
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
                <form class="form-horizontal" id="actForm" role="form" action="<?php echo base_url('club/actInsert');?>" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">活动标题</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="title"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">参与者积分奖励</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="credit" style="width:85px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">人数上限</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="max_part" style="width:85px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">人数下限</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="min_part" style="width:85px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">参与会员等级限制</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="grade" style="width:85px;"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">所属地区</label>
                        <select class="form-control" id="province" name="province_code" style="border: solid 1px rgba(162, 159, 159, 0.33);-webkit-appearance: initial;">
                            <option value="" selected>区域要求</option>
                            <?php  foreach ($provinces as $row){?>
                                <option value="<?php echo $row->CODE;?>"><?php echo $row->NAME;?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">开始时间</label>
                        <div class="col-sm-3">
                            <input type="text" id="start_on" name="start_on" class="form-control b_input_date" readonly>
                            <span class="fa fa-calendar txt-danger form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">结束时间</label>
                        <div class="col-sm-3">
                            <input type="text" id="end_on" name="end_on" class="form-control b_input_date" readonly>
                            <span class="fa fa-calendar txt-danger form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">报名开始时间</label>
                        <div class="col-sm-3">
                            <input type="text" id="reg_start_on" name="reg_start_on" class="form-control b_input_date" readonly>
                            <span class="fa fa-calendar txt-danger form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">报名结束时间</label>
                        <div class="col-sm-3">
                            <input type="text" id="reg_end_on" name="reg_end_on" class="form-control b_input_date" readonly>
                            <span class="fa fa-calendar txt-danger form-control-feedback"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">详细地址</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" name="location" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">描述</label>
                        <div class="col-sm-3">
                            <textarea name="desc" rows="2" cols="40" maxlength="39" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-2">
                            <button type="submit" class="btn btn-primary">保 存</button>
                            <a class="btn btn-default" onclick="$('#actList').click();">返 回</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.b_input_date').datepicker({
            changeMonth: true,
            changeYear: true,
            defaultDate :""
        });
        $( ".b_input_date" ).datepicker( "option", "dateFormat", "yy-mm-dd" );
        $('.form-control').tooltip();
        WinMove();
        var regnum = new RegExp("^[0-9]*$");
        $('#actForm').ajaxForm({
            beforeSubmit: function(a,f,o) {

            },
            success: function(data) {
                alert(data);
                $('#actList').click();
            }
        });
    });
</script>
