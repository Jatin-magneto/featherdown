<?php
/* @var $this EnvironmentController */
/* @var $model Environment */

$this->breadcrumbs=array(
	'Environments'=>array('admin'),
	//$model->environment_id,
);

$this->menu=array(
	////array('label'=>'List Environment', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Environment', 'url'=>array('create')),
	array('label'=>'Update Environment', 'url'=>array('update', 'id'=>$model->environment_id)),
	array('label'=>'Delete Environment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->environment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Environment', 'url'=>array('admin')),
);
?>

<h1>View Environment #<?php echo $model->environment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'environment_id',
		'environment_name',
		'environment_url',
		'language_id',
		'environment_desc',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
