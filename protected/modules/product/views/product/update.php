<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
    	//$model->title=>array('view','id'=>$model->product_id),
	'Update',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Product', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Product', 'url'=>array('admin')),
);
?>

<h1>Update Product</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>