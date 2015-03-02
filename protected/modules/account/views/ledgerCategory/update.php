<?php
/* @var $this LedgerCategoryController */
/* @var $model LedgerCategory */

$this->breadcrumbs=array(
	'Ledger Categories'=>array('admin'),
	'Update',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-plus-circle"></i> Add Ledger Category', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Ledger Category', 'url'=>array('admin')),
);
?>

<h1>Update Ledger Category </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>