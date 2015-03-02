<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('index'),
	$model->region_id,
);

$this->menu=array(
	array('label'=>'List Region', 'url'=>array('index')),
	array('label'=>'Create Region', 'url'=>array('create')),
	array('label'=>'Update Region', 'url'=>array('update', 'id'=>$model->region_id)),
	array('label'=>'Delete Region', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->region_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Region', 'url'=>array('admin')),
);
?>

<h1>View Region #<?php echo $model->region_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'region_id',
		'region_name',
		'country_id',
		'state_id',
		'city',
		'region_slug',
		'region_abbreviation',
		'environments',
		'isactive',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
