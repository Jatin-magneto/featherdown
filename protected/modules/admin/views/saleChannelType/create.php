<?php
/* @var $this SaleChannelTypeController */
/* @var $model SaleChannelType */

$this->breadcrumbs=array(
	'Sale Channel'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List SaleChannelType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Sale Channel', 'url'=>array('admin')),
);
?>

<h1>Create Sale Channel</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>