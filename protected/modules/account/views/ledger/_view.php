<?php
/* @var $this LedgerController */
/* @var $data Ledger */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->ledger_id), array('view', 'id'=>$data->ledger_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_no')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_title')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ledger_slug')); ?>:</b>
	<?php echo CHtml::encode($data->ledger_slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isactive')); ?>:</b>
	<?php echo CHtml::encode($data->isactive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_on')); ?>:</b>
	<?php echo CHtml::encode($data->created_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_on')); ?>:</b>
	<?php echo CHtml::encode($data->updated_on); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('updated_by')); ?>:</b>
	<?php echo CHtml::encode($data->updated_by); ?>
	<br />

	*/ ?>

</div>