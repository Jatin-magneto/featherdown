<?php
/* @var $this EmailSettingsController */
/* @var $model EmailSettings */

$this->breadcrumbs=array(
	'Email Settings'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List EmailSettings', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Email Settings', 'url'=>array('admin')),
);
?>

<h1>Create Email Settings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>