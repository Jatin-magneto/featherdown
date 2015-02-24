<?php
/* @var $this EnvironmentController */
/* @var $model Environment */

$this->breadcrumbs=array(
	'Environments'=>array('admin'),
	//$model->environment_id=>array('view','id'=>$model->environment_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List Environment', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Environment', 'url'=>array('create')),
	////array('label'=>'View Environment', 'url'=>array('view', 'id'=>$model->environment_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Environment', 'url'=>array('admin')),
);
?>

<h1>Update Environment <?php //echo $model->environment_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>