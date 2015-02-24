<?php
/* @var $this ProvinceController */
/* @var $model Province */

$this->breadcrumbs=array(
	'Provinces'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List Province', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Province', 'url'=>array('admin')),
);
?>

<h1>Create Province</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>