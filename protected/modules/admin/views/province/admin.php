<?php
/* @var $this ProvinceController */
/* @var $model Province */

$this->breadcrumbs=array(
	'Provinces'=>array('admin'),
	'Manage',
);

$this->menu=array(
	////array('label'=>'List Province', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Province', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Province', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Province', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#province-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Provinces</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'province-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'province_id',
		'province_name',
		//'country_id',
        array(
            'name'=>'countryname',
            'value'=>'$data->country->country_name'
        ),
		'province_slug',
		'province_abbreviation',
		//'environments',
		/*
		'isactive',
		*/
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
		
//		array(
//			'class'=>'CButtonColumn',
//            'template'=>'{update}{delete}',
//		),
	),
)); ?>
