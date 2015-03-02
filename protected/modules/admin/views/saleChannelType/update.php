<?php
/* @var $this SaleChannelTypeController */
/* @var $model SaleChannelType */

$this->breadcrumbs=array(
	'Sale Channel'=>array('admin'),
	//$model->sale_channel_type_id=>array('view','id'=>$model->sale_channel_type_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List SaleChannelType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Sale Channel', 'url'=>array('create')),
	////array('label'=>'View SaleChannelType', 'url'=>array('view', 'id'=>$model->sale_channel_type_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Sale Channel', 'url'=>array('admin')),
);
?>

<h1>Update Sale Channel</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>