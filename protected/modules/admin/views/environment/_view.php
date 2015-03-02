<?php
/* @var $this EnvironmentController */
/* @var $data Environment */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('environment_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->environment_id), array('view', 'id'=>$data->environment_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('environment_name')); ?>:</b>
	<?php echo CHtml::encode($data->environment_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('environment_url')); ?>:</b>
	<?php echo CHtml::encode($data->environment_url); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('environment_desc')); ?>:</b>
	<?php echo CHtml::encode($data->environment_desc); ?>
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