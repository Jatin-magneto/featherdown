<?php
/* @var $this LedgerController */
/* @var $model Ledger */

$this->breadcrumbs=array(
	'Ledgers'=>array('admin'),
	'Create',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-cogs"></i> Manage Ledger', 'url'=>array('admin')),
);
?>

<h1>Create Ledger</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>