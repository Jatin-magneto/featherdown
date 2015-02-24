<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	'Create',
);

$this->menu=array(	
    array('label'=>'<i class="fa fa-cogs"></i> Manage Admin', 'url'=>array('admin')),
);
?>

<h1>Create Admin</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>