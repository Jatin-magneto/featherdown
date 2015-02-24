<?php
/* @var $this Payment RulesController */
/* @var $model Payment Rules */

$this->breadcrumbs=array(
	'Booking Payment Rules'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List Payment Rules', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Payment Rules', 'url'=>array('admin')),
);
?>

<h1>Create Payment Rules</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>