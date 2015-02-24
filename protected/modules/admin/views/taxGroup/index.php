<?php
/* @var $this Tax GroupController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tax Groups',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax Group', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Tax Group', 'url'=>array('admin')),
);
?>

<h1>Tax Groups</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
