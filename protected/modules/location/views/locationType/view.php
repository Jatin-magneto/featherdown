<?php
/* @var $this LocationTypeController */
/* @var $model LocationType */

$this->breadcrumbs=array(
	'Location Types'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List LocationType', 'url'=>array('index')),
	array('label'=>'Create LocationType', 'url'=>array('create')),
	array('label'=>'Update LocationType', 'url'=>array('update', 'id'=>$model->location_type_id)),
	array('label'=>'Delete LocationType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->location_type_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LocationType', 'url'=>array('admin')),
);
?>

<h1>View LocationType #<?php echo $model->location_type_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'location_type_id',
		'title',
		'isactive',
		'environments',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
