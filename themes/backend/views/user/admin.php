<div class="content">
    <div class="title"><h5>Quản Lý Thông Tin Tài Khoản</h5>
        <div class="button" style="float:right">
            <?php echo CHtml::link(CHtml::button('Tạo mới'), Yii::app()->createUrl('user/create')); ?>
        </div>
    </div>
    <div class="table">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'id' => 'slider-grid',
            'dataProvider' => $model->search(),
            'filter' => $model,
            'itemsCssClass' => 'display',
            'filterCssClass' => 'ui-state-default',
            'summaryCssClass' => 'head',
            'summaryText' => '<h5 class="iFrames">Quản lý Tài Khoản</h5><label>Hiển thị từ {start} đến {end} trên {count} bản ghi</label>',
            'rowCssClass' => array('gradeA odd', 'gradeA even'),
            'pagerCssClass' => 'dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers',
            'columns' => array(
                array(
                    'name'=>"username",
                    'type'=>'raw',
                    'filter'=>"",
                ),


                array(
                    'class' => 'CButtonColumn',
                    'template'=>'{update}{delete}',
                ),
            ),
        )); ?>
    </div>
</div>

