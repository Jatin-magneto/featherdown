<?php
/* @var $this SaleTypeController */
/* @var $model SaleType */

$this->breadcrumbs=array(
	'Sale Types'=>array('admin'),
	//$model->sale_type_id=>array('view','id'=>$model->sale_type_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List SaleType', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Sale Type', 'url'=>array('create')),
	////array('label'=>'View SaleType', 'url'=>array('view', 'id'=>$model->sale_type_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Sale Type', 'url'=>array('admin')),
);
?>

<h1>Update Sale Type</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>