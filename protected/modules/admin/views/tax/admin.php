<?php
/* @var $this TaxController */
/* @var $model Tax */

$this->breadcrumbs=array(
	'Taxes'=>array('admin'),
	'Manage',
);

$this->menu=array(
	////array('label'=>'List Tax', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Tax', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Tax', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tax-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Taxes</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tax-grid',
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'tax_id',
		'title',
		//'tax_group_id',
        array(
            'name'=>'taxgrouptitle',
            'value'=>'$data->taxgroup->title'
        ),
		//'country_id',
        array(
            'name'=>'countryname',
            'value'=>'$data->country->country_name'
        ),
		//'province_id',
        //array(
        //    'name'=>'provincename',
        //    'value'=>'$data->state->province_name'
        //),
        'code',
		
        //'publish_from',
        array(
            'name'=>'publish_from',
            'value'=>'Yii::app()->dateFormatter->format("MM-dd-yyyy",strtotime($data->publish_from))'
        ),
		//'publish_until',
        array(
            'name'=>'publish_until',
			'value'=>'Yii::app()->dateFormatter->format("MM-dd-yyyy",strtotime($data->publish_until))'            
            //'value'=>'Yii::app()->dateFormatter->formatDateTime("MM/d/y h:i",strtotime($data->publish_until))'
        ),
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
