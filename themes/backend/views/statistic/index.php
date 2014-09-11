<?php
/* @var $this StatisticController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Statistics',
);

$this->menu=array(
	array('label'=>'Create Statistic', 'url'=>array('create')),
	array('label'=>'Manage Statistic', 'url'=>array('admin')),
);
?>

<h1>Statistics</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
