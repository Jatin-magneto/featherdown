<?php
/* @var $this LedgerCategoryController */
/* @var $model LedgerCategory */

$this->breadcrumbs=array(
	'Ledger Categories'=>array('index'),
	$model->ledger_category_id,
);

$this->menu=array(
	array('label'=>'List LedgerCategory', 'url'=>array('index')),
	array('label'=>'Create LedgerCategory', 'url'=>array('create')),
	array('label'=>'Update LedgerCategory', 'url'=>array('update', 'id'=>$model->ledger_category_id)),
	array('label'=>'Delete LedgerCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ledger_category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage LedgerCategory', 'url'=>array('admin')),
);
?>

<h1>View LedgerCategory #<?php echo $model->ledger_category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ledger_category_id',
		'ledger_cat_title',
		'sales_group_id',
		'purchase_group_id',
		'ledger_sales',
		'ledger_purchase',
		'ledger_payment',
		'isactive',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
