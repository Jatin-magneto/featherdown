<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('admin'),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Region', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Region', 'url'=>array('admin')),
);
?>

<h1>Update Region </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>