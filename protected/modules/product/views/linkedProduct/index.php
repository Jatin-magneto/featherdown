<?php
/* @var $this LinkedProductController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Linked Products',
);

$this->menu=array(
	array('label'=>'Create LinkedProduct', 'url'=>array('create')),
	array('label'=>'Manage LinkedProduct', 'url'=>array('admin')),
);
?>

<h1>Linked Products</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
