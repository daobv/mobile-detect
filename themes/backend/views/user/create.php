<?php
/* @var $this UserController */
/* @var $model User */


?>

<div class="content">
    <div class="title"><h5>Thêm Mới Tài Khoản</h5>
        <div class="button" style="float:right">
            <?php echo CHtml::link(CHtml::button('Danh Sách'), Yii::app()->createUrl('adminUser/admin')); ?>
        </div>
    </div>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>