<?php
/* @var $this SaleChannelTypeController */
/* @var $model SaleChannelType */

$this->breadcrumbs=array(
	'Sale Channel Types'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List SaleChannelType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Sales Channel', 'url'=>array('admin')),
);
?>

<h1>Create Sales Channel</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>