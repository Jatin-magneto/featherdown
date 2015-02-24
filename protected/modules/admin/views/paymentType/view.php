<?php
/* @var $this PaymentTypeController */
/* @var $model PaymentType */

$this->breadcrumbs=array(
	'Payment Types'=>array('admin'),
	//$model->pay_type_id,
);

$this->menu=array(
	////array('label'=>'List PaymentType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add PaymentType', 'url'=>array('create')),
	array('label'=>'Update PaymentType', 'url'=>array('update', 'id'=>$model->pay_type_id)),
	array('label'=>'Delete PaymentType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pay_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage PaymentType', 'url'=>array('admin')),
);
?>

<h1>View PaymentType #<?php echo $model->pay_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pay_type_id',
		'environments',
		'isactive',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
