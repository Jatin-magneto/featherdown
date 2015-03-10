<?php
/* @var $this SupplierController */
/* @var $data Supplier */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('supplier_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->supplier_id), array('view', 'id'=>$data->supplier_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('locale_id')); ?>:</b>
	<?php echo CHtml::encode($data->locale_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pre_name')); ?>:</b>
	<?php echo CHtml::encode($data->pre_name); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('initials')); ?>:</b>
	<?php echo CHtml::encode($data->initials); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_title')); ?>:</b>
	<?php echo CHtml::encode($data->addr_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_street')); ?>:</b>
	<?php echo CHtml::encode($data->addr_street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_street_2')); ?>:</b>
	<?php echo CHtml::encode($data->addr_street_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_street_no')); ?>:</b>
	<?php echo CHtml::encode($data->addr_street_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_street_no_sufx')); ?>:</b>
	<?php echo CHtml::encode($data->addr_street_no_sufx); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_postal_code')); ?>:</b>
	<?php echo CHtml::encode($data->addr_postal_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_city_id')); ?>:</b>
	<?php echo CHtml::encode($data->addr_city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->addr_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('addr_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->addr_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_title')); ?>:</b>
	<?php echo CHtml::encode($data->inv_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_street')); ?>:</b>
	<?php echo CHtml::encode($data->inv_street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_street_2')); ?>:</b>
	<?php echo CHtml::encode($data->inv_street_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_street_no')); ?>:</b>
	<?php echo CHtml::encode($data->inv_street_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_street_no_sufx')); ?>:</b>
	<?php echo CHtml::encode($data->inv_street_no_sufx); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_postal_code')); ?>:</b>
	<?php echo CHtml::encode($data->inv_postal_code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_city_id')); ?>:</b>
	<?php echo CHtml::encode($data->inv_city_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_state_id')); ?>:</b>
	<?php echo CHtml::encode($data->inv_state_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('inv_country_id')); ?>:</b>
	<?php echo CHtml::encode($data->inv_country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('bsn')); ?>:</b>
	<?php echo CHtml::encode($data->bsn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dob')); ?>:</b>
	<?php echo CHtml::encode($data->dob); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('phone')); ?>:</b>
	<?php echo CHtml::encode($data->phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mobile')); ?>:</b>
	<?php echo CHtml::encode($data->mobile); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fax')); ?>:</b>
	<?php echo CHtml::encode($data->fax); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('website')); ?>:</b>
	<?php echo CHtml::encode($data->website); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('newsletter')); ?>:</b>
	<?php echo CHtml::encode($data->newsletter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('brochure')); ?>:</b>
	<?php echo CHtml::encode($data->brochure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('remarks')); ?>:</b>
	<?php echo CHtml::encode($data->remarks); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_login')); ?>:</b>
	<?php echo CHtml::encode($data->last_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('environments')); ?>:</b>
	<?php echo CHtml::encode($data->environments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_env_id')); ?>:</b>
	<?php echo CHtml::encode($data->default_env_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('default_env_only')); ?>:</b>
	<?php echo CHtml::encode($data->default_env_only); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('creditorid')); ?>:</b>
	<?php echo CHtml::encode($data->creditorid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('accountview_costid')); ?>:</b>
	<?php echo CHtml::encode($data->accountview_costid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_invoiceid')); ?>:</b>
	<?php echo CHtml::encode($data->last_invoiceid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	*/ ?>

</div>