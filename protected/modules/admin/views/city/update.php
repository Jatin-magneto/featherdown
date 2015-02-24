<?php
/* @var $this CityController */
/* @var $model City */

$this->breadcrumbs=array(
	'Cities'=>array('admin'),
//	$model->city_id=>array('view','id'=>$model->city_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List City', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add City', 'url'=>array('create')),
	////array('label'=>'View City', 'url'=>array('view', 'id'=>$model->city_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage City', 'url'=>array('admin')),
);
?>

<h1>Update City <?php //echo $model->city_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>