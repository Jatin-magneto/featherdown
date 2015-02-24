<?php
/* @var $this EnvironmentController */
/* @var $model Environment */

$this->breadcrumbs=array(
	'Environments'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List Environment', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Environment', 'url'=>array('admin')),
);
?>

<h1>Create Environment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>