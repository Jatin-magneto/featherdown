<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('index'),
	$model->title,
);

$this->menu=array(
	//array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add ProductCategory', 'url'=>array('create')),
	array('label'=>'Update ProductCategory', 'url'=>array('update', 'id'=>$model->category_id)),
	array('label'=>'Delete ProductCategory', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->category_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage ProductCategory', 'url'=>array('admin')),
);
?>

<h1>View ProductCategory #<?php echo $model->category_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'category_id',
		'title',
		'parent_category_id',
		'sales_group_tax_id',
		'purchase_group_tax_id',
		'isactive',
		'environments',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
	),
)); ?>
