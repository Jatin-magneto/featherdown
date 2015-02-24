<?php
/* @var $this Tax GroupController */
/* @var $model Tax Group */

$this->breadcrumbs=array(
	'Tax Groups'=>array('admin'),
	//$model->tax_group_id=>array('view','id'=>$model->tax_group_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List Tax Group', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax Group', 'url'=>array('create')),
	////array('label'=>'View Tax Group', 'url'=>array('view', 'id'=>$model->tax_group_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Tax Group', 'url'=>array('admin')),
);
?>

<h1>Update Tax Group <?php //echo $model->tax_group_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>