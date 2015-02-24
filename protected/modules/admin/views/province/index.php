<?php
/* @var $this ProvinceController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Provinces',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Province', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Province', 'url'=>array('admin')),
);
?>

<h1>Provinces</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
