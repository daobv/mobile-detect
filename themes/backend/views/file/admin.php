<div class="content">
    <div class="title"><h5>Quản Lý Files</h5>
        <div class="button" style="float:right">
            <?php echo CHtml::link(CHtml::button('Tạo mới'), Yii::app()->createUrl('file/create')); ?>
        </div>
    </div>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'file-grid',
    'dataProvider' => $model->search(),
    'filter' => $model,
    'itemsCssClass' => 'display',
    'filterCssClass' => 'ui-state-default',
    'summaryCssClass' => 'head',
    'summaryText' => '<h5 class="iFrames"><div style="padding-left:40px"> Quản Lý Files</div></h5><label>Hiển thị từ {start} đến {end} trên {count} bản ghi</label>',
    'rowCssClass' => array('gradeA odd', 'gradeA even'),
    'pagerCssClass' => 'dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers',
	'columns'=>array(
        array(
            'class'=>'CLinkColumn',
            'labelExpression'=>'$data->name',
            'urlExpression'=>'Yii::app()->createUrl("statistic/admin",array("id"=>$data->id))',
        ),
        array(
            'header'=>"File Url",
            'type'=>'raw',
            'filter'=>'',
            'value'=>'Yii::app()->getBaseUrl(true)."/file/".$data->slug',
        ),
        array(
            'header'=>"JAR",
            'type'=>'raw',
            'filter'=>'',
            'value'=>'File::model()->getFileClick($data->id,"day","jar")'
        ),
        array(
            'header'=>"APK",
            'type'=>'raw',
            'filter'=>'',
            'value'=>'File::model()->getFileClick($data->id,"day","apk")'
        ),
        array(
            'header'=>"IOS",
            'type'=>'raw',
            'filter'=>'',
            'value'=>'File::model()->getFileClick($data->id,"day","ipa")'
        ),
        array(
            'header'=>"Total",
            'type'=>'raw',
            'filter'=>'',
            'value'=>'File::model()->getFileClick($data->id,"total")'
        ),
		array(
			'class'=>'CButtonColumn',
            'template' => '{update}{delete}',
		),
	),
)); ?>

</div>
