<?php
/* @var $this LedgerCategoryController */
/* @var $data LedgerCategory */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_category_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ledger_category_id), array('view', 'id'=>$data->ledger_category_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_cat_title')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_cat_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sales_group_id')); ?>:</b>
	<?php echo CHtml::encode($data->sales_group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('purchase_group_id')); ?>:</b>
	<?php echo CHtml::encode($data->purchase_group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_sales')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_sales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_purchase')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_purchase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_payment')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_payment); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
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