<?php
/* @var $this LocaleController */
/* @var $model Locale */

$this->breadcrumbs=array(
    'Create',
);

$this->menu=array(
    array('label'=>'<i class="fa fa-cogs"></i> Manage Locale', 'url'=>array('admin')),
);


?>

<h1>Create Locale</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>