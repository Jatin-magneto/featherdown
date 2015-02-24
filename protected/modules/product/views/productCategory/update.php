<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	//$model->title=>array('view','id'=>$model->category_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add ProductCategory', 'url'=>array('create')),
	//array('label'=>'View ProductCategory', 'url'=>array('view', 'id'=>$model->category_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage ProductCategory', 'url'=>array('admin')),
);
?>

<h1>Update ProductCategory <?php //echo $model->category_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>