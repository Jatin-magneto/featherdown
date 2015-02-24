<?php
/* @var $this Payment RulesController */
/* @var $data Payment Rules */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_rule_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->payment_rule_id), array('view', 'id'=>$data->payment_rule_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('template_id')); ?>:</b>
	<?php echo CHtml::encode($data->template_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('request_send_before')); ?>:</b>
	<?php echo CHtml::encode($data->request_send_before); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_before_days')); ?>:</b>
	<?php echo CHtml::encode($data->payment_before_days); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('payment_term')); ?>:</b>
	<?php echo CHtml::encode($data->payment_term); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('environments')); ?>:</b>
	<?php echo CHtml::encode($data->environments); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	<?php /*
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