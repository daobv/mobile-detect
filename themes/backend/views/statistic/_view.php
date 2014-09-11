<?php
/* @var $this StatisticController */
/* @var $data Statistic */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('day')); ?>:</b>
	<?php echo CHtml::encode($data->day); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_id')); ?>:</b>
	<?php echo CHtml::encode($data->file_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('apk')); ?>:</b>
	<?php echo CHtml::encode($data->apk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ipa')); ?>:</b>
	<?php echo CHtml::encode($data->ipa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jar')); ?>:</b>
	<?php echo CHtml::encode($data->jar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date')); ?>:</b>
	<?php echo CHtml::encode($data->date); ?>
	<br />


</div>