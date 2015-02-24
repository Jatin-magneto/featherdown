<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Countries'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List Country', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Country', 'url'=>array('admin')),
);
?>

<h1>Create Country</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>