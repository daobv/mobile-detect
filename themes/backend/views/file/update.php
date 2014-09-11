<?php
/* @var $this FileController */
/* @var $model File */


?>
<div class="content">
    <div class="title"><h5>Quản Lý Files</h5>

        <div class="button" style="float:right">
            <?php echo CHtml::link(CHtml::button('Tạo mới'), Yii::app()->createUrl('file/create')); ?>
        </div>
    </div>
        <?php $this->renderPartial('_form', array('model' => $model)); ?>
</div>