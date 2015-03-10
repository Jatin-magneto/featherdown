<?php
/* @var $this LocationTypeController */
/* @var $model LocationType */

$this->breadcrumbs=array(
	'Location Types'=>array('admin'),
	'Create',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-cogs"></i> Manage Location Type', 'url'=>array('admin')),
);
?>

<h1>Create Location Type</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>