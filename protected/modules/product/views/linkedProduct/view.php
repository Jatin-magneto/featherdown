<?php
/* @var $this LinkedProductController */
/* @var $model LinkedProduct */

$this->breadcrumbs=array(
	'Linked Products'=>array('index'),
	$model->linked_product_id,
);

$this->menu=array(
	array('label'=>'List LinkedProduct', 'url'=>array('index')),
	array('label'=>'Create LinkedProduct', 'url'=>array('create')),
	array('label'=>'Update LinkedProduct', 'url'=>array('update', 'id'=>$model->linked_product_id)),
	array('label'=>'Delete LinkedProduct', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->linked_product_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LinkedProduct', 'url'=>array('admin')),
);
?>

<h1>View LinkedProduct #<?php echo $model->linked_product_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'linked_product_id',
		'main_product_id',
		'product_id',
		'linked_product_quantity',
	),
)); ?>
