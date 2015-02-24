<?php
/* @var $this AdminController */
/* @var $model Admin */

$this->breadcrumbs=array(
	'Admins'=>array('index'),
	$model->admin_id=>array('view','id'=>$model->admin_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Admin', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Admin', 'url'=>array('create')),
	//array('label'=>'View Admin', 'url'=>array('view', 'id'=>$model->admin_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage Admin', 'url'=>array('admin')),
);
?>

<h1>Update Admin <?php echo $model->admin_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>