<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'admin-login-form',
    'enableClientValidation'=>true,
    'clientOptions'=>array(
        'validateOnSubmit'=>true,
    ),
)); ?>
<div class="loginWrapper mainForm">

        <div class="head"><h5 class="iUser"> <div style="padding-left:40px"> Login </div></h5></div>
			<div class="loginRow noborder">
				<?php echo $form->labelEx($model,'username', array('for'=>'req1')); ?>
				<div class="loginInput"><?php echo $form->textField($model,'username', array('class'=>'validate[required]','id'=>'req1')); ?></div>
				<div class="fix"><?php echo $form->error($model,'username'); ?></div>
			</div>
			<div class="loginRow noborder">
                <?php echo $form->labelEx($model,'password', array('for'=>'req2')); ?>
				<div class="loginInput"><?php echo $form->passwordField($model,'password', array('class'=>'validate[required]','id'=>'req2')); ?></div>
				<div class="fix"><?php echo $form->error($model,'password'); ?></div>
			</div>
			<div class="loginRow">
				<div class="rememberMe">
					<?php echo $form->labelEx($model,'rememberMe',array('for'=>'check2','style'=>'line-height: 20px;')); ?>
                    <?php echo $form->checkBox($model,'rememberMe',array('id'=>'check2','style'=>'margin-top: 7px;')); ?>
				</div>
				<?php echo CHtml::submitButton('Login', array('class'=>'greyishBtn submitForm')); ?>
				<div class="fix"><?php echo $form->error($model,'rememberMe'); ?></div>
			</div>

</div>
<?php $this->endWidget(); ?>