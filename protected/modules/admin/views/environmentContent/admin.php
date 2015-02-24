<?php
/* @var $this EnvironmentContentController */
/* @var $model EnvironmentContent */

$this->breadcrumbs=array(
	'Environment Contents'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List EnvironmentContent', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add EnvironmentContent', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#environment-content-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Environment Contents</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'environment-content-grid',
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'environment_content_id',
		'primary_table_id',
		'language_id',
		'env_title',
		'env_sub_title',
		'env_title_slug',
		/*
		'env_desc',
		'primary_table_flag',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
