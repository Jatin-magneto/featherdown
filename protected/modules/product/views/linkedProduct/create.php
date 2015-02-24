<?php
/* @var $this LinkedProductController */
/* @var $model LinkedProduct */

$this->breadcrumbs=array(
	'Linked Products'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List LinkedProduct', 'url'=>array('index')),
	array('label'=>'Manage LinkedProduct', 'url'=>array('admin')),
);
?>

<h1>Create LinkedProduct</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>