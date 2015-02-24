<?php
/* @var $this LinkedProductController */
/* @var $model LinkedProduct */

$this->breadcrumbs=array(
	'Linked Products'=>array('index'),
	$model->linked_product_id=>array('view','id'=>$model->linked_product_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List LinkedProduct', 'url'=>array('index')),
	array('label'=>'Create LinkedProduct', 'url'=>array('create')),
	array('label'=>'View LinkedProduct', 'url'=>array('view', 'id'=>$model->linked_product_id)),
	array('label'=>'Manage LinkedProduct', 'url'=>array('admin')),
);
?>

<h1>Update LinkedProduct <?php echo $model->linked_product_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>