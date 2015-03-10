<?php
/* @var $this OwnerController */
/* @var $model Owner */

$this->breadcrumbs=array(
	'Owners'=>array('admin'),
	'Update',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-plus-circle"></i> Add Owner', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Owner', 'url'=>array('admin')),
);
?>

<h1>Update Owner </h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>