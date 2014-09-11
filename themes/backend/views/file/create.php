<?php
/* @var $this FileController */
/* @var $model File */


?>
<div class="content">
    <div class="title"><h5>Thêm Mới File Và Url</h5>
        <div class="button" style="float:right">
            <?php echo CHtml::link(CHtml::button('Danh Sách'), Yii::app()->createUrl('file/admin')); ?>
        </div>
    </div>
    <?php $this->renderPartial('_form', array('model'=>$model)); ?>
</div>