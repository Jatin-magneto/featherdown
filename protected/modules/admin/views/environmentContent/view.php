<?php
/* @var $this EnvironmentContentController */
/* @var $model EnvironmentContent */

$this->breadcrumbs=array(
	'Environment Contents'=>array('index'),
	$model->environment_content_id,
);

$this->menu=array(
	//array('label'=>'List EnvironmentContent', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add EnvironmentContent', 'url'=>array('create')),
	array('label'=>'Update EnvironmentContent', 'url'=>array('update', 'id'=>$model->environment_content_id)),
	array('label'=>'Delete EnvironmentContent', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->environment_content_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'<i class="fa fa-cogs"></i> Manage EnvironmentContent', 'url'=>array('admin')),
);
?>

<h1>View EnvironmentContent #<?php echo $model->environment_content_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'environment_content_id',
		'primary_table_id',
		'language_id',
		'env_title',
		'env_sub_title',
		'env_title_slug',
		'env_desc',
		'primary_table_flag',
	),
)); ?>
