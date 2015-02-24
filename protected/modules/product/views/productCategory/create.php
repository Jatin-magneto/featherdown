<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Product Category', 'url'=>array('admin')),
);
?>

<h1>Create Product Category</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>