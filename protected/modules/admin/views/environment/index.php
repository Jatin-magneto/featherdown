<?php
/* @var $this EnvironmentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Environments',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Environment', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Environment', 'url'=>array('admin')),
);
?>

<h1>Environments</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
