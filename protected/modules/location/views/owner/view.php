<?php
/* @var $this SupplierController */
/* @var $model Supplier */

$this->breadcrumbs=array(
	'Suppliers'=>array('index'),
	$model->supplier_id,
);

$this->menu=array(
	array('label'=>'List Supplier', 'url'=>array('index')),
	array('label'=>'Create Supplier', 'url'=>array('create')),
	array('label'=>'Update Supplier', 'url'=>array('update', 'id'=>$model->supplier_id)),
	array('label'=>'Delete Supplier', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->supplier_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Supplier', 'url'=>array('admin')),
);
?>

<h1>View Supplier #<?php echo $model->supplier_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'supplier_id',
		'username',
		'password',
		'locale_id',
		'isactive',
		'gender',
		'pre_name',
		'initials',
		'first_name',
		'middle_name',
		'last_name',
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
		'email',
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
	),
)); ?>
