<?php
/* @var $this EnvironmentContentController */
/* @var $model EnvironmentContent */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'environment-content-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'primary_table_id'); ?>
		<?php echo $form->textField($model,'primary_table_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'primary_table_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language_id'); ?>
		<?php echo $form->textField($model,'language_id'); ?>
		<?php echo $form->error($model,'language_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'env_title'); ?>
		<?php echo $form->textField($model,'env_title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'env_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'env_sub_title'); ?>
		<?php echo $form->textField($model,'env_sub_title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'env_sub_title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'env_title_slug'); ?>
		<?php echo $form->textField($model,'env_title_slug',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'env_title_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'env_desc'); ?>
		<?php echo $form->textArea($model,'env_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'env_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'primary_table_flag'); ?>
		<?php echo $form->textField($model,'primary_table_flag'); ?>
		<?php echo $form->error($model,'primary_table_flag'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class' => 'btn btn-success', 'id'=> "btnsubmit", 'name' => 'btnsubmit')); ?>
		<?php if(Yii::app()->user->usertype == 1){ ?>		
		<?php echo CHtml::button('Cancel', array('class'=>'btn btn-default','onclick' => 'js:document.location.href="'.Yii::app()->baseUrl.'/'.$this->uniqueid.'/admin"')); ?>
		<?php } ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->