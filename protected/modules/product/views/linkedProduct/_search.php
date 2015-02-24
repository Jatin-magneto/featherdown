<?php
/* @var $this LinkedProductController */
/* @var $model LinkedProduct */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'linked_product_id'); ?>
		<?php echo $form->textField($model,'linked_product_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'main_product_id'); ?>
		<?php echo $form->textField($model,'main_product_id',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'product_id'); ?>
		<?php echo $form->textField($model,'product_id',array('size'=>18,'maxlength'=>18)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'linked_product_quantity'); ?>
		<?php echo $form->textField($model,'linked_product_quantity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->