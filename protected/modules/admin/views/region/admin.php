<?php
/* @var $this RegionController */
/* @var $model Region */

$this->breadcrumbs=array(
	'Regions'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Region', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Region', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Region', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#region-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Regions</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'region-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'region_id',
		'region_name',
		'region_slug',
		'region_abbreviation',
		array(
			'header' => 'Created On',
			'name'=>'created',
			'value'=>'Yii::app()->dateFormatter->format("MM-dd-yyyy HH:mm:ss",strtotime($data->created_on)) . " By " . $data->created_by'
		),
		array(
			'header'=>'Updated On',
			'name'=> 'updated',
			'value'=>'Yii::app()->dateFormatter->format("MM-dd-yyyy HH:mm:ss",strtotime($data->updated_on)) . " By " . $data->updated_by'            
		),
	),
)); ?>
