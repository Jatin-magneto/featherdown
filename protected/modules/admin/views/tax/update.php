<?php
/* @var $this TaxController */
/* @var $model Tax */

$this->breadcrumbs=array(
	'Taxes'=>array('admin'),
	//$model->title=>array('view','id'=>$model->tax_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List Tax', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax', 'url'=>array('create')),
	////array('label'=>'View Tax', 'url'=>array('view', 'id'=>$model->tax_id)),
	array('label'=>'<i class="fa fa-cogs"></i>  Manage Tax', 'url'=>array('admin')),
);
?>

<h1>Update Tax <?php //echo $model->tax_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>