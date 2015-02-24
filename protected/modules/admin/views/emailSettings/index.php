<?php
/* @var $this EmailSettingsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Email Settings',
);

$this->menu=array(
	array('label'=>'Create EmailSettings', 'url'=>array('create')),
	array('label'=>'Manage EmailSettings', 'url'=>array('admin')),
);
?>

<h1>Email Settings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
