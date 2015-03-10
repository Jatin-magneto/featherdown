<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('admin'),
	'Create',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-cogs"></i> Manage Supplier', 'url'=>array('admin')),
);
?>

<h1>Create Supplier</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>