<?php
/* @var $this ProductController */
/* @var $model Product */

$this->breadcrumbs=array(
	'Products'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Product', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Product', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Product', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Products</h1>

<?php
if(isset($_GET['Err'])){
	echo ($_GET['Err'] == 'DeleteErr')?'<script>alert("Can not delete this record(s). Foreign constraint violation.");</script>':'';	
}
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'product_id',
		'product_code',		
		array(
			'header' => 'Title',
			'name'=>'title',
			'value'=>'$data->title'
		),
		//'product_category_id',
		array(
			'header' => 'Product Category',
			'name'=>'productcategory',
			'value'=>'$data->category->title'
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
