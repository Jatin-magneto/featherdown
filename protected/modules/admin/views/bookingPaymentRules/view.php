<?php
/* @var $this Payment RulesController */
/* @var $model Payment Rules */

$this->breadcrumbs=array(
	'Booking Payment Rules'=>array('index'),
	$model->payment_rule_id,
);

$this->menu=array(
	//array('label'=>'List Payment Rules', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Payment Rules', 'url'=>array('create')),
	array('label'=>'Update Payment Rules', 'url'=>array('update', 'id'=>$model->payment_rule_id)),
	array('label'=>'Delete Payment Rules', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->payment_rule_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Payment Rules', 'url'=>array('admin')),
);
?>

<h1>View Payment Rules #<?php echo $model->payment_rule_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'payment_rule_id',
		'template_id',
		'request_send_before',
		'payment_before_days',
		'payment_term',
		'environments',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
