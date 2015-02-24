<?php
/* @var $this EnvironmentContentController */
/* @var $model EnvironmentContent */

$this->breadcrumbs=array(
	'Environment Contents'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List EnvironmentContent', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage EnvironmentContent', 'url'=>array('admin')),
);
?>

<h1>Create EnvironmentContent</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>