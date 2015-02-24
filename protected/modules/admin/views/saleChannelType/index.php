<?php
/* @var $this SaleChannelTypeController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sale Channel Types',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add SaleChannelType', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage SaleChannelType', 'url'=>array('admin')),
);
?>

<h1>Sale Channel Types</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
