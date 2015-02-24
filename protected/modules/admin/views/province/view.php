<?php
/* @var $this ProvinceController */
/* @var $model Province */

$this->breadcrumbs=array(
	'Provinces'=>array('index'),
	$model->province_id,
);

$this->menu=array(
	//array('label'=>'List Province', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Province', 'url'=>array('create')),
	array('label'=>'Update Province', 'url'=>array('update', 'id'=>$model->province_id)),
	array('label'=>'Delete Province', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->province_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Province', 'url'=>array('admin')),
);
?>

<h1>View Province #<?php echo $model->province_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'province_id',
		'province_name',
		'country_id',
		'province_slug',
		'province_abbreviation',
		'environments',
		'isactive',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
