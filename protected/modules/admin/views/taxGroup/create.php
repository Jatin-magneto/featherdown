<?php
/* @var $this Tax GroupController */
/* @var $model Tax Group */

$this->breadcrumbs=array(
	'Tax Groups'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List Tax Group', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Tax Group', 'url'=>array('admin')),
);
?>

<h1>Create Tax Group</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>