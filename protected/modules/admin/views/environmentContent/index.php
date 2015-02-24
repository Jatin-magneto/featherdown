<?php
/* @var $this EnvironmentContentController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Environment Contents',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add EnvironmentContent', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage EnvironmentContent', 'url'=>array('admin')),
);
?>

<h1>Environment Contents</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
