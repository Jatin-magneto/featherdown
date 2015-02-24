<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	'Create',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-cogs"></i> Manage Product', 'url'=>array('admin')),
);
?>

<h1>Create Product</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'model2'=>$model2)); ?>