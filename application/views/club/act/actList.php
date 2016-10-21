<div class="row">
    <div id="breadcrumb" class="col-xs-12">
        <a href="#" class="show-sidebar">
            <i class="fa fa-bars"></i>
        </a>
        <ol class="breadcrumb pull-left">
            <li><a href="club/dashboard" class="ajax-link">首页</a></li>
            <li><a id="actList" href="club/actList" class="ajax-link">全部</a></li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <div class="box-name">
                    <i class="fa fa-th-list"></i>
                    <span>活动列表</span>
                </div>
                <div class="box-icons">
                    <a href="club/actAdd" class="beauty-table-to-json ajax-link">发起活动</a>
                </div>
            </div>
            <div class="box-content no-padding">
                <table class="table table-bordered table-striped table-hover table-heading table-datatable" id="datatable-1">
                    <thead>
                    <tr>
                        <th>活动标题</th>
                        <th>发起者</th>
                        <th>状态</th>
                        <th>等级要求</th>
                        <th>区域要求</th>
                        <th>积分奖励</th>
                        <th>开始时间</th>
                        <th>参与人数</th>
                        <th style="width:40px;">操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- Start: list_row -->
                    <?php  foreach ($actList as $k=>$row){?>
                        <tr>
                            <td><?php echo $row->TITLE;?></td>
                            <td><?php echo $row->STARTER_ID;?></td>
                            <td><?php if($row->STATUS==2){?>已结束<?php }?><?php if($row->STATUS==1){?>组织中<?php }?><?php if($row->STATUS==0){?>待审批<?php }?></td>
                            <td><?php echo $row->GRADE;?></td>
                            <td><?php echo $row->PROVINCE_CODE;?></td>
                            <td><?php echo $row->CREDIT;?></td>
                            <td><?php echo $row->START_ON;?></td>
                            <td><?php echo $row->CUR_PART." / ".$row->MAX_PART;?></td>
                            <td><a class="ajax-link" href="club/approveAct?id=<?php echo $row->ID;?>" title="查看"><i class="fa fa-edit"></i></a>
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



