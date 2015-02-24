<?php
/* @var $this Tax GroupController */
/* @var $model Tax Group */

$this->breadcrumbs=array(
	'Tax Groups'=>array('admin'),
	'Manage',
);

$this->menu=array(
	////array('label'=>'List Tax Group', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Tax Group', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Tax Group', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Tax Group', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tax-group-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Tax Groups</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tax-group-grid',
    'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'tax_group_id',
        'title',
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
