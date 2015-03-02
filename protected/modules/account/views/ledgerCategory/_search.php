<?php
/* @var $this LedgerCategoryController */
/* @var $model LedgerCategory */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'ledger_category_id'); ?>
		<?php echo $form->textField($model,'ledger_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ledger_cat_title'); ?>
		<?php echo $form->textField($model,'ledger_cat_title',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sales_group_id'); ?>
		<?php echo $form->textField($model,'sales_group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'purchase_group_id'); ?>
		<?php echo $form->textField($model,'purchase_group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ledger_sales'); ?>
		<?php echo $form->textField($model,'ledger_sales'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ledger_purchase'); ?>
		<?php echo $form->textField($model,'ledger_purchase'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ledger_payment'); ?>
		<?php echo $form->textField($model,'ledger_payment'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'isactive'); ?>
		<?php echo $form->textField($model,'isactive',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_on'); ?>
		<?php echo $form->textField($model,'created_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'created_by'); ?>
		<?php echo $form->textField($model,'created_by',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_on'); ?>
		<?php echo $form->textField($model,'updated_on'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'updated_by'); ?>
		<?php echo $form->textField($model,'updated_by',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->