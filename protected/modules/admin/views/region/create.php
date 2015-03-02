<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-cogs"></i> Manage Region', 'url'=>array('admin')),
);
?>

<h1>Create Region</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>