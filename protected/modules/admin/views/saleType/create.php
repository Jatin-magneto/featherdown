<?php
/* @var $this SaleTypeController */
/* @var $model SaleType */

$this->breadcrumbs=array(
	'Sale Types'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List SaleType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Sale Type', 'url'=>array('admin')),
);
?>

<h1>Create Sale Type</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>