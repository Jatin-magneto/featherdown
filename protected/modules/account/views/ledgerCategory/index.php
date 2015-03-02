<?php
/* @var $this LedgerCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Ledger Categories',
);

$this->menu=array(
	array('label'=>'Create LedgerCategory', 'url'=>array('create')),
	array('label'=>'Manage LedgerCategory', 'url'=>array('admin')),
);
?>

<h1>Ledger Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
