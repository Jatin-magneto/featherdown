<?php
/* @var $this AdminController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Admins',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Admin', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Admin', 'url'=>array('admin')),
);
?>

<h1>Admins</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
