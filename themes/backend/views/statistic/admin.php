<?php
?>
<form class="form-inline" id="report_form" method="get" style="padding-top:30px">
    <div class="input-prepend input-append"
         style="display: inline-block; margin: 0px; height: 30px;  margin-right: 5px;">
                <span class="add-on"><a href="#"><i
                            class="icon-step-backward"></i></a></span>
            <span class="reportrange input-large uneditable-input" style="width: 200px">
               <span id="report-rang-custom"><?php echo date("m/d/Y", strtotime('-6 day')); ?> - <?php echo date("d/m/Y"); ?></span>
            </span>
        <span class="add-on reportrange"><i class="icon-calendar icon-large"></i></span>
                <span class="add-on"><a href="#"><i
                            class="icon-step-forward"></i></a></span>
    </div>
</form>
<link rel="stylesheet" type="text/css" media="all"
      href="<?php echo Yii::app()->theme->baseUrl; ?>/css/daterangepicker-bs2.css"/>
<script type="text/javascript"
        src="<?php echo Yii::app()->theme->baseUrl; ?>/js/moment.js"></script>`
<script type="text/javascript"
        src="<?php echo Yii::app()->theme->baseUrl; ?>/js/daterangepicker.js"></script>

<script type="text/javascript">
    $('.reportrange').daterangepicker(
        {
            format: 'DD/MM/YYYY',
            startDate: '<?php echo date("d/m/Y", strtotime('-6 day'));?>',
            endDate: '<?php echo date("d/m/Y");?>',
            separator: 'to',
            locale: {
                applyLabel: 'Xem',
                cancelLabel: 'Hủy',
                fromLabel: 'Từ ngày',
                toLabel: 'Tới ngày',
                customRangeLabel: 'Tùy chỉnh',
                daysOfWeek: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
                monthNames: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                firstDay: 1
            },
            ranges: {
                'Hôm nay': [moment(), moment()],
                'Hôm qua': [moment().subtract('days', 1), moment().subtract('days', 1)],
                '7 ngày trước': [moment().subtract('days', 6), moment()],
                '30 ngày trước': [moment().subtract('days', 29), moment()],
                'Tháng này': [moment().startOf('month'), moment().endOf('month')],
                'Tháng trước': [moment().subtract('month', 1).startOf('month'), moment().subtract('month', 1).endOf('month')],
                'Tất cả': [new Date('2013-01-01'), moment()]
            }
        },
        function(start, end) {
            $('#report-rang-custom').html(start.format('DD/MM/YYYY') + ' - ' + end.format('DD/MM/YYYY'));
            var start_date = start.format('YYYY-MM-DD');
            var end_date = end.format('YYYY-MM-DD');
            $('#statistic-grid').yiiGridView('update', {
                        url: "<?php echo Yii::app()->createUrl('statistic/admin',array('id'=>$_GET['id'])); ?>",
                        data: "start_date="+ convert_date(start_date) +"&end_date="+ convert_date(end_date)
            });
        }
        /*function (start, end) {
            $('#filter-date').val('specific');
            $('#filter-startdate').val(start.format('YYYY-MM-DD'));
            $('#filter-enddate').val(end.format('YYYY-MM-DD'));
            var start_date = start.format('YYYY-MM-DD');
            var end_date = end.format('YYYY-MM-DD');
        }*/
    );
    function convert_date(date_check) {
        var res = date_check.split('-');
        //console.log(res);
        var day_get = res[2];
        var month_get = res[1];
        var year_get = res[0].toString();
        return  day_get+ month_get + year_get;
    }
</script>
<div class="content">
    <div class="title"><h5>Thống Kê Luợt Click</h5>
    </div>
<?php

    $this->widget('zii.widgets.grid.CGridView', array(
    'id' => 'statistic-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'display',
    'filterCssClass' => 'ui-state-default',
    'summaryCssClass' => 'head',
    'summaryText' => '<h5 class="iFrames"><div style="padding-left:40px">Thống Kê</div></h5><label>Hiển thị từ {start} đến {end} trên {count} bản ghi</label>',
    'rowCssClass' => array('gradeA odd', 'gradeA even'),
    'pagerCssClass' => 'dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers',
    'columns' => array(
        array(
            'name' => 'day',
            'value' => 'Yii::app()->dateFormatter->format("dd/MM/yyyy",strtotime($data->day))',
            'htmlOptions' => array('width' => '200px'),
            'filter' => ''
        ),
        array(
            'name' => 'file_id',
            'value' => 'File::model()->getFileNameById($data->file_id)',
            'filter' => '',
            'htmlOptions' => array('width' => '200px'),
        ),

        array(
            'name' => 'apk',
            'value' => '$data->apk',
            'filter' => '',
            'htmlOptions' => array('width' => '100px'),
        ),
        array(
            'name' => 'ipa',
            'value' => '$data->ipa',
            'filter' => '',
            'htmlOptions' => array('width' => '100px'),
        ),
        array(
            'name' => 'jar',
            'value' => '$data->jar',
            'filter' => '',
            'htmlOptions' => array('width' => '100px'),
        ),

    ),
)); ?>
</div>
<script type="text/javascript">
    $('document').ready(function () {
        $(".ui-state-default").remove();
    })
</script>
