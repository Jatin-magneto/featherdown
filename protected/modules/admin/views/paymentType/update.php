<?php
/* @var $this PaymentTypeController */
/* @var $model PaymentType */

$this->breadcrumbs=array(
	'Payment Types'=>array('admin'),
	//$model->pay_type_id=>array('view','id'=>$model->pay_type_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List PaymentType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add PaymentType', 'url'=>array('create')),
	////array('label'=>'View PaymentType', 'url'=>array('view', 'id'=>$model->pay_type_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage PaymentType', 'url'=>array('admin')),
);
?>

<h1>Update PaymentType <?php //echo $model->pay_type_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>