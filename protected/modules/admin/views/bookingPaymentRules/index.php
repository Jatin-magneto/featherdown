<?php
/* @var $this Payment RulesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Booking Payment Rules',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Payment Rules', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Payment Rules', 'url'=>array('admin')),
);
?>

<h1>Booking Payment Rules</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
