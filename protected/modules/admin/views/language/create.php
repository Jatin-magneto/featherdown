<?php
/* @var $this LanguageController */
/* @var $model Language */

$this->breadcrumbs=array(
	'Languages'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Language', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Language', 'url'=>array('admin')),
);
?>

<h1>Create Language</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>