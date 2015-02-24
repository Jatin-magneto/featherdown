<?php
/* @var $this CurrencyController */
/* @var $model Currency */

$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	$model->currency_id=>array('view','id'=>$model->currency_id),
	'Update',
);

$this->menu=array(
    array('label'=>'<i class="fa fa-plus-circle"></i> Add Currency', 'url'=>array('create')),
    array('label'=>'<i class="fa fa-cogs"></i> Manage Currency', 'url'=>array('admin')),
);
?>

<h1>Update Currency</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>