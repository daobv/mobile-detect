<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'user-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        //'enableAjaxValidation'=>true,
    )); ?>

        <div class="widget first">
            <div class="head"><h5 class="iList">Thông tin tài khoản</div>
            <div class="rowElem">
                <label><?php echo $form->labelEx($model,'username'); ?></label>
                <div class="formRight"><?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255,'disabled'=>true)); ?></div>
                <div class="fix"><?php echo $form->error($model,'username'); ?></div>
            </div>
            <div class="rowElem">
                <label><?php echo $form->labelEx($model,'password'); ?>
                    <div class="formRight"><?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255,'value'=>'','style'=>"width:400px")); ?></div>
                    <div class="fix"><?php echo $form->error($model,'password'); ?></div>
            </div>
            <div class="rowElem buttons">
                <?php echo CHtml::submitButton($model->isNewRecord ? 'Tạo' : 'Lưu'); ?>
            </div>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->