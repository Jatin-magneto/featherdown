<?php
/* @var $this LocaleController */
/* @var $model Locale */

$this->breadcrumbs=array(
	'Locales'=>array('admin'),
	'Manage',
);

$this->menu=array(	
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Locale',  'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Locale', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Locale', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#locale-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Locales</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'locale-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'locale_id',
		array(
            'name'=>'country_name',
            'value'=>'$data->country->country_name'
        ),		
		array(
            'name'=>'currency_name',
            'value'=>'$data->currency->currency_name'
        ),
		'locale',
		'locale_slug',
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
