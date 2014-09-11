
<div class="content">
    <div class="title"><h5>Danh sách thành viên</h5></div>

    <div class="table">
        <?php $this->widget('zii.widgets.grid.CGridView', array(
            'dataProvider'=>$model->search(),
            'filter'=> $model,
            'itemsCssClass'=>'display',
            'filterCssClass'=>'ui-state-default',
            'summaryCssClass' => 'head',
            'summaryText' => '<h5 class="iFrames">Danh sách thành viên</h5><label>Hiển thị từ {start} đến {end} trên {count} bản ghi</label>',
            'rowCssClass'=>array('gradeA odd', 'gradeA even'),
            'pagerCssClass'=>'dataTables_paginate fg-buttonset ui-buttonset fg-buttonset-multi ui-buttonset-multi paging_full_numbers',
            'columns'=>array(
                array(
                    'name'=>'user_id',
                    'value'=>'1 + $row + ($this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize)',
                    'filter'=>false,
                ),
                'first_name',
                'last_name',
                array(
                    'name'=>'email',
                    'type'=>'raw',
                    'value'=>'CHtml::link(CHtml::encode($data->email), $data->getAdminUrl())'
                ),
                'created_date',
                array(
                    'name'=>'state',
                    'filter'=>array(1=>'Active', 0=>'Non Active'),
                    'value'=>'$data->getState()'
                ),
                array(
                    'name'=>'state',
                    'filter'=>CHtml::listData(UserRole::model()->findAll(),'user_role_id','role_name'),
                    'value'=>'$data->getUserRole()'
                ),
                array(
                    'class'=>'CButtonColumn',
                ),
            ),
        )); ?>
    </div>
</div>