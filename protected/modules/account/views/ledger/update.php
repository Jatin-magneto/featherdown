<?php
/* @var $this LedgerController */
/* @var $model Ledger */

$this->breadcrumbs=array(
	'Ledgers'=>array('admin'),
	'Update',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-plus-circle"></i> Add Ledger', 'url'=>array('create')),
        array('label'=>'<i class="fa fa-cogs"></i> Manage Ledger', 'url'=>array('admin')),
);
?>

<h1>Update Ledger </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>