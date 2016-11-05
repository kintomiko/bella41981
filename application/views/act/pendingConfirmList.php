<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <a href="#" class="show-sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <ol class="breadcrumb pull-left">
            <li><a href="club/dashboard" class="ajax-link">首页</a></li>
            <li><a id="actList" href="act/actList" class="ajax-link">全部</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-th-list"></i>
                    <span>待确认列表</span>
                </div>
            </div>
            <div class="box-content no-padding">
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
                    <thead>
                    <tr>
                        <th>活动标题</th>
                        <th>发起者</th>
                        <th>所在区域</th>
                        <th>积分奖励</th>
                        <th>活动时间</th>
                        <th>待确认用户ID</th>
                        <th>待确认用户昵称</th>
                        <th>待确认用户EMAIL</th>
                        <th>待确认用户等级</th>
                        <th style="width:40px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Start: list_row -->
                    <?php  foreach ($confirmList as $k=>$row){?>
                        <tr>
                            <td><?php echo $row->act->TITLE;?></td>
                            <td><?php echo $row->act->STARTER_NAME;?></td>
                            <td><?php echo $row->act->PROVINCE_CODE;?></td>
                            <td><?php echo $row->act->CREDIT;?></td>
                            <td><?php echo $row->act->START_ON." ~ ".$row->act->END_ON;?></td>
                            <td><?php echo $row->toUser->CODE;?></td>
                            <td><?php echo $row->toUser->NICKNAME;?></td>
                            <td><?php echo $row->toUser->EMAIL;?></td>
                            <td><?php echo $row->toUser->GRADE;?></td>
                            <td><a class="ajax-link" href="act/viewPendingConfirm?act_id=<?php echo $row->act->ID;?>&to_user_id=<?php echo $row->toUser->USER_ID;?>" title="确认"><i class="fa fa-edit"></i></a>
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
</script>



