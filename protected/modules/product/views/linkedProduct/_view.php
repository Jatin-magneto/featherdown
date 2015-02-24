<?php
/* @var $this LinkedProductController */
/* @var $data LinkedProduct */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('linked_product_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->linked_product_id), array('view', 'id'=>$data->linked_product_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('main_product_id')); ?>:</b>
	<?php echo CHtml::encode($data->main_product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('product_id')); ?>:</b>
	<?php echo CHtml::encode($data->product_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linked_product_quantity')); ?>:</b>
	<?php echo CHtml::encode($data->linked_product_quantity); ?>
	<br />


</div>