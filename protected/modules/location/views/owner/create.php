<?php
/* @var $this OwnerController */
/* @var $model Owner */

$this->breadcrumbs=array(
	'Owners'=>array('admin'),
	'Create',
);

$this->menu=array(
        array('label'=>'<i class="fa fa-cogs"></i> Manage Owner', 'url'=>array('admin')),
);
?>

<h1>Create Owner</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>