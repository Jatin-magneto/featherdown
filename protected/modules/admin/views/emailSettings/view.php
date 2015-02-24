<?php
/* @var $this EmailSettingsController */
/* @var $model EmailSettings */

$this->breadcrumbs=array(
	'Email Settings'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List EmailSettings', 'url'=>array('index')),
	array('label'=>'Create EmailSettings', 'url'=>array('create')),
	array('label'=>'Update EmailSettings', 'url'=>array('update', 'id'=>$model->email_settings_id)),
	array('label'=>'Delete EmailSettings', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->email_settings_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmailSettings', 'url'=>array('admin')),
);
?>

<h1>View EmailSettings #<?php echo $model->email_settings_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email_settings_id',
		'title',
		'template_id',
		'email_ids',
		'isactive',
		'environments',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
