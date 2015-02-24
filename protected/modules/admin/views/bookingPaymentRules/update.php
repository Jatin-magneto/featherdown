<?php
/* @var $this Payment RulesController */
/* @var $model Payment Rules */

$this->breadcrumbs=array(
	'Booking Payment Rules'=>array('admin'),
//	$model->payment_rule_id=>array('view','id'=>$model->payment_rule_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List Payment Rules', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Payment Rules', 'url'=>array('create')),
	////array('label'=>'View Payment Rules', 'url'=>array('view', 'id'=>$model->payment_rule_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Payment Rules', 'url'=>array('admin')),
);
?>

<h1>Update Payment Rules <?php //echo $model->payment_rule_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>