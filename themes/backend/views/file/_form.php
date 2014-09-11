<?php
/* @var $this FileController */
/* @var $model File */
/* @var $form CActiveForm */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'file-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation' => false,
    )); ?>

        <div class="widget first">
            <div class="head"><h5 class="iList">Tạo Mới</div>
            <?php echo $form->errorSummary($model); ?>

            <div class="rowElem">
                <label><?php echo $form->labelEx($model, 'name'); ?></label>
                <div class="formRight"><?php echo $form->textField($model, 'name',
                        array('size' => 60, 'maxlength' => 255)); ?></div>
                <div class="fix"> <?php echo $form->error($model, 'name'); ?></div>
            </div>
            <div class="rowElem">
                <label><?php echo $form->labelEx($model, 'apk'); ?></label>
                <div class="formRight"><?php echo $form->textField($model, 'apk',
                        array('size' => 60, 'maxlength' => 255)); ?></div>
                <div class="fix"><?php echo $form->error($model, 'apk'); ?></div>
            </div>
            <div class="rowElem">
                <label><?php echo $form->labelEx($model, 'ipa'); ?></label>
                <div class="formRight"><?php echo $form->textField($model, 'ipa',
                        array('size' => 60, 'maxlength' => 255)); ?></div>
                <div class="fix"><?php echo $form->error($model, 'ipa'); ?></div>
            </div>
            <div class="rowElem">
                <label><?php echo $form->labelEx($model, 'jar'); ?></label>
                <div class="formRight"><?php echo $form->textField($model, 'jar',
                        array('size' => 60, 'maxlength' => 255)); ?></div>
                <div class="fix"><?php echo $form->error($model, 'jar'); ?></div>
            </div>
            <div class="rowElem buttons">
                <?php echo CHtml::submitButton('Save'); ?>
            </div>
        </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
    $(document).ready(function(){
        function string_to_slug(str) {
            str = str.replace(/^\s+|\s+$/g, ''); // trim
            str = str.toLowerCase();

            // remove accents, swap ñ for n, etc
            var from = "àáảãâầấậẩẫăằắặẳẵạèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹđÀÁẠẢÃÂẦẤẬẨẪĂẰẮẶẲẴÈÉẸẺẼÊỀẾỆỂỄÌÍỊỈĨÒÓỌỎÕÔỒỐỘỔỖƠỜỚỢỞỠÙÚỤỦŨƯỪỨỰỬỮỲÝỴỶỸĐ ";
            var to   = "aaaaaaaaaaaaaaaaaeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyydAAAAAAAAAAAAAAAAAEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYYD-";
            for (var i=0, l=from.length ; i<l ; i++) {
                str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
            }

            str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
                .replace(/\s+/g, '-') // collapse whitespace and replace by -
                .replace(/-+/g, '-'); // collapse dashes

            return str;
        }
        $("#FileForm_name").keyup(function(){
            var str = string_to_slug($(this).val());
            $("#FileForm_slug").val(str);
        });
    });

</script>