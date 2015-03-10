<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('admin'),
	'Update',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-plus-circle"></i> Add Supplier', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Supplier', 'url'=>array('admin')),
);
?>

<h1>Update Supplier </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>