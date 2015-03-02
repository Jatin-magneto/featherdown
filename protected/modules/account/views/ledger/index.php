<?php
/* @var $this LedgerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ledgers',
);

$this->menu=array(
	array('label'=>'Create Ledger', 'url'=>array('create')),
	array('label'=>'Manage Ledger', 'url'=>array('admin')),
);
?>

<h1>Ledgers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
