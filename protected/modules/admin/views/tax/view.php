<?php
/* @var $this TaxController */
/* @var $model Tax */

$this->breadcrumbs=array(
	'Taxes'=>array('index'),
	$model->title,
);

$this->menu=array(
	//array('label'=>'List Tax', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax', 'url'=>array('create')),
	array('label'=>'Update Tax', 'url'=>array('update', 'id'=>$model->tax_id)),
	array('label'=>'Delete Tax', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->tax_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Tax', 'url'=>array('admin')),
);
?>

<h1>View Tax #<?php echo $model->tax_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'tax_id',
		'tax_group_id',
		'country_id',
		'province_id',
		'value',
		'value_type',
		'vat_margin_value',
		'vat_margin_value_type',
		'code',
		'title',
		'title_slug',
		'isactive',
		'publish_from',
		'publish_until',
		'environments',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
