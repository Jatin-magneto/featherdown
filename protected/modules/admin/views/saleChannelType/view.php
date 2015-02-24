<?php
/* @var $this SaleChannelTypeController */
/* @var $model SaleChannelType */

$this->breadcrumbs=array(
	'Sale Channel Types'=>array('index'),
	$model->sale_channel_type_id,
);

$this->menu=array(
	//array('label'=>'List SaleChannelType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add SaleChannelType', 'url'=>array('create')),
	array('label'=>'Update SaleChannelType', 'url'=>array('update', 'id'=>$model->sale_channel_type_id)),
	array('label'=>'Delete SaleChannelType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sale_channel_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage SaleChannelType', 'url'=>array('admin')),
);
?>

<h1>View SaleChannelType #<?php echo $model->sale_channel_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sale_channel_type_id',
		'isactive',
		'environments',
		'created_by',
		'created_on',
		'updated_by',
		'updated_on',
	),
)); ?>
