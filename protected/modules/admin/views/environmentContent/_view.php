<?php
/* @var $this EnvironmentContentController */
/* @var $data EnvironmentContent */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('environment_content_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->environment_content_id), array('view', 'id'=>$data->environment_content_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('primary_table_id')); ?>:</b>
	<?php echo CHtml::encode($data->primary_table_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language_id')); ?>:</b>
	<?php echo CHtml::encode($data->language_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('env_title')); ?>:</b>
	<?php echo CHtml::encode($data->env_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('env_sub_title')); ?>:</b>
	<?php echo CHtml::encode($data->env_sub_title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('env_title_slug')); ?>:</b>
	<?php echo CHtml::encode($data->env_title_slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('env_desc')); ?>:</b>
	<?php echo CHtml::encode($data->env_desc); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('primary_table_flag')); ?>:</b>
	<?php echo CHtml::encode($data->primary_table_flag); ?>
	<br />

	*/ ?>

</div>