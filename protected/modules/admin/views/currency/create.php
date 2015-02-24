<?php
/* @var $this CurrencyController */
/* @var $model Currency */

$this->breadcrumbs=array(
	'Currencies'=>array('index'),
	'Create',
);

$this->menu=array(  
    array('label'=>'<i class="fa fa-cogs"></i> Manage Currency', 'url'=>array('admin')),
);
?>

<h1>Create Currency</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>