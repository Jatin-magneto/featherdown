<?php
/* @var $this SaleTypeController */
/* @var $model SaleType */

$this->breadcrumbs=array(
	'Sale Types'=>array('index'),
	$model->sale_type_id,
);

$this->menu=array(
	//array('label'=>'List SaleType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add SaleType', 'url'=>array('create')),
	array('label'=>'Update SaleType', 'url'=>array('update', 'id'=>$model->sale_type_id)),
	array('label'=>'Delete SaleType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->sale_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage SaleType', 'url'=>array('admin')),
);
?>

<h1>View SaleType #<?php echo $model->sale_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sale_type_id',
		'isactive',
		'environments',
		'created_by',
		'created_on',
		'updated_by',
		'updated_on',
	),
)); ?>
