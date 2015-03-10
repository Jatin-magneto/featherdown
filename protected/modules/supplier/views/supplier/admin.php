<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'<i class="fa fa-plus-circle"></i> Add Supplier', 'url'=>array('create')),
	array('label'=>'<i class="fa fa-pencil-square-o"></i> Edit Supplier', 'url'=>array('#')),
	array('label'=>'<i class="fa fa-trash"></i> Delete Supplier', 'url'=>array('#')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#supplier-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Suppliers</h1>
<?php
    foreach(Yii::app()->user->getFlashes() as $key => $message) {
        echo '<div class="alert alert-link alert-' . $key . '">' . $message . "</div>\n";
    }
?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'supplier-grid',
	'itemsCssClass' => 'table table-striped table-bordered table-hover',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'class'           => 'CCheckBoxColumn',
			'selectableRows'  => 2,
			'id'=>'cgridview-check-boxes',
		),
		'supplier_id',
		'username',
		'email',
		'first_name',
		'last_name',
		/*
		'pre_name',
		'initials',
		'middle_name',
		'addr_title',
		'addr_street',
		'addr_street_2',
		'addr_street_no',
		'addr_street_no_sufx',
		'addr_postal_code',
		'addr_city_id',
		'addr_state_id',
		'addr_country_id',
		'inv_title',
		'inv_street',
		'inv_street_2',
		'inv_street_no',
		'inv_street_no_sufx',
		'inv_postal_code',
		'inv_city_id',
		'inv_state_id',
		'inv_country_id',
		'bsn',
		'dob',
		'phone',
		'mobile',
		'fax',
		'website',
		'newsletter',
		'brochure',
		'remarks',
		'last_login',
		'environments',
		'default_env_id',
		'default_env_only',
		'creditorid',
		'accountview_costid',
		'last_invoiceid',
		'created_on',
		'created_by',
		'updated_on',
		'updated_by',
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
	),
)); ?>
