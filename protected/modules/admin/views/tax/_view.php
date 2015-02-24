<?php
/* @var $this TaxController */
/* @var $data Tax */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->tax_id), array('view', 'id'=>$data->tax_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tax_group_id')); ?>:</b>
	<?php echo CHtml::encode($data->tax_group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('country_id')); ?>:</b>
	<?php echo CHtml::encode($data->country_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('province_id')); ?>:</b>
	<?php echo CHtml::encode($data->province_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value')); ?>:</b>
	<?php echo CHtml::encode($data->value); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('value_type')); ?>:</b>
	<?php echo CHtml::encode($data->value_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('vat_margin_value')); ?>:</b>
	<?php echo CHtml::encode($data->vat_margin_value); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('vat_margin_value_type')); ?>:</b>
	<?php echo CHtml::encode($data->vat_margin_value_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title_slug')); ?>:</b>
	<?php echo CHtml::encode($data->title_slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_from')); ?>:</b>
	<?php echo CHtml::encode($data->publish_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('publish_until')); ?>:</b>
	<?php echo CHtml::encode($data->publish_until); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('environments')); ?>:</b>
	<?php echo CHtml::encode($data->environments); ?>
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