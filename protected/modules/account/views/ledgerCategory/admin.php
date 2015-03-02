<?php
/* @var $this LedgerCategoryController */
/* @var $model LedgerCategory */

$this->breadcrumbs=array(
	'Ledger Categories'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Ledger Category', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Ledger Category', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Ledger Category', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#ledger-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Ledger Categories</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ledger-category-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'ledger_category_id',
		//'sales_group_id',
		/*array(
			'header'=>'Sales Group',
			'name'=>'salesgroup',
			'value'=>'$data->salesgroup->title'
		),
		'purchase_group_id',
		'ledger_sales',
		'ledger_purchase',
		'ledger_payment', */
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
