<?php
/* @var $this PaymentTypeController */
/* @var $model PaymentType */

$this->breadcrumbs=array(
	'Payment Types'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List PaymentType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage PaymentType', 'url'=>array('admin')),
);
?>

<h1>Create PaymentType</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>