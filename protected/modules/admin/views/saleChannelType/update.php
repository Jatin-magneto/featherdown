<?php
/* @var $this SaleChannelTypeController */
/* @var $model SaleChannelType */

$this->breadcrumbs=array(
	'Sales Channel'=>array('admin'),
	//$model->sale_channel_type_id=>array('view','id'=>$model->sale_channel_type_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List SaleChannelType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Sales Channel', 'url'=>array('create')),
	////array('label'=>'View SaleChannelType', 'url'=>array('view', 'id'=>$model->sale_channel_type_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Sales Channel', 'url'=>array('admin')),
);
?>

<h1>Update Sales Channel</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>