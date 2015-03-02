<?php
/* @var $this LedgerController */
/* @var $model Ledger */

$this->breadcrumbs=array(
	'Ledgers'=>array('index'),
	$model->ledger_id,
);

$this->menu=array(
	array('label'=>'List Ledger', 'url'=>array('index')),
	array('label'=>'Create Ledger', 'url'=>array('create')),
	array('label'=>'Update Ledger', 'url'=>array('update', 'id'=>$model->ledger_id)),
	array('label'=>'Delete Ledger', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ledger_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ledger', 'url'=>array('admin')),
);
?>

<h1>View Ledger #<?php echo $model->ledger_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'ledger_id',
		'ledger_no',
		'ledger_title',
		'ledger_slug',
		'isactive',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
