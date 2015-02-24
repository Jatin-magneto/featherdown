<?php
/* @var $this CountryController */
/* @var $model Country */

$this->breadcrumbs=array(
	'Countries'=>array('admin'),
	//$model->country_id=>array('view','id'=>$model->country_id),
	'Update',
);

$this->menu=array(
	////array('label'=>'List Country', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Country', 'url'=>array('create')),
	////array('label'=>'View Country', 'url'=>array('view', 'id'=>$model->country_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Country', 'url'=>array('admin')),
);
?>

<h1>Update Country <?php //echo $model->country_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>