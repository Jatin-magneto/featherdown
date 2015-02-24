<?php
/* @var $this EmailSettingsController */
/* @var $model EmailSettings */

$this->breadcrumbs=array(
	'Email Settings'=>array('admin'),
	//$model->title=>array('view','id'=>$model->email_settings_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List EmailSettings', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Email Settings', 'url'=>array('create')),
	//array('label'=>'View EmailSettings', 'url'=>array('view', 'id'=>$model->email_settings_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Email Settings', 'url'=>array('admin')),
);
?>

<h1>Update Email Settings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>