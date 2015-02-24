<?php
/* @var $this Tax GroupController */
/* @var $model Tax Group */

$this->breadcrumbs=array(
	'Tax Groups'=>array('index'),
	$model->tax_group_id,
);

$this->menu=array(
	//array('label'=>'List Tax Group', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax Group', 'url'=>array('create')),
	array('label'=>'Update Tax Group', 'url'=>array('update', 'id'=>$model->tax_group_id)),
	array('label'=>'Delete Tax Group', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tax_group_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Tax Group', 'url'=>array('admin')),
);
?>

<h1>View Tax Group #<?php echo $model->tax_group_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tax_group_id',
		'environments',
		'isactive',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
