<?php
/* @var $this LocationController */
/* @var $model Location */

$this->breadcrumbs=array(
	'Locations'=>array('admin'),
	'Update',
);

$this->menu=array(
    array('label'=>'<i class="fa fa-plus-circle"></i> Add Location', 'url'=>array('create')),
    array('label'=>'<i class="fa fa-cogs"></i> Manage Location', 'url'=>array('admin')),
);
?>

<h1>Update Location </h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>