<?php
/* @var $this EnvironmentContentController */
/* @var $model EnvironmentContent */

$this->breadcrumbs=array(
	'Environment Contents'=>array('index'),
	$model->environment_content_id=>array('view','id'=>$model->environment_content_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List EnvironmentContent', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add EnvironmentContent', 'url'=>array('create')),
	//array('label'=>'View EnvironmentContent', 'url'=>array('view', 'id'=>$model->environment_content_id)),
	array('label'=>'<i class="fa fa-cogs"></i> Manage EnvironmentContent', 'url'=>array('admin')),
);
?>

<h1>Update EnvironmentContent <?php echo $model->environment_content_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>