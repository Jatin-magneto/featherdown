<?php
/* @var $this LocationTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Location Types',
);

$this->menu=array(
	array('label'=>'Create LocationType', 'url'=>array('create')),
	array('label'=>'Manage LocationType', 'url'=>array('admin')),
);
?>

<h1>Location Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
