<?php
/* @var $this LedgerCategoryController */
/* @var $model LedgerCategory */

$this->breadcrumbs=array(
	'Ledger Categories'=>array('admin'),
	'Create',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-cogs"></i> Manage Ledger Category', 'url'=>array('admin')),
);
?>

<h1>Create Ledger Category</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>