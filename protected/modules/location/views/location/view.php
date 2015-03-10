<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locations'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List Location', 'url'=>array('index')),
	array('label'=>'Create Location', 'url'=>array('create')),
	array('label'=>'Update Location', 'url'=>array('update', 'id'=>$model->location_id)),
	array('label'=>'Delete Location', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->location_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Location', 'url'=>array('admin')),
);
?>

<h1>View Location #<?php echo $model->location_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'location_id',
		'location_type_id',
		'title',
		'location_desc',
		'location_address',
		'zip_code',
		'city_id',
		'supplier_id',
		'image',
		'url',
		'supplier_form_url',
		'sort_order',
		'tax_included',
		'latitute',
		'longitude',
		'isactive',
		'environments',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
