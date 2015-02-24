<?php
/* @var $this ProductCategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Categories',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add ProductCategory', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage ProductCategory', 'url'=>array('admin')),
);
?>

<h1>Product Categories</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
