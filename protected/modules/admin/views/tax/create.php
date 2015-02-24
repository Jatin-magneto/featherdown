<?php
/* @var $this TaxController */
/* @var $model Tax */

$this->breadcrumbs=array(
	'Taxes'=>array('admin'),
	'Create',
);

$this->menu=array(
	////array('label'=>'List Tax', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i>  Manage Tax', 'url'=>array('admin')),
);
?>

<h1>Create Tax</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>