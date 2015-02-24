<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */

$this->breadcrumbs=array(
	'Product Categories'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List ProductCategory', 'url'=>array('index')),
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Product Category', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Product Category', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Product Category', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#product-category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Product Categories</h1>

<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'product-category-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'category_id',
		'title',
		//'parent_category_id',
		//array(
		//    'name'=>'parent_category_id',
		//    'value'=>'$data->parentname->parent_category_id'
		//),
		//'sales_group_tax_id',
		array(
		    'name'=>'taxsales_title',
		    'value'=>'$data->taxsales->title'
		),		
		array(
		    'name'=>'taxpuchase_title',
		    'value'=>'$data->taxpurchase->title'
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
