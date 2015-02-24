<?php
/* @var $this EnvironmentController */
/* @var $model Environment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'environment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
        'clientOptions'=> array(
        'validateOnSubmit'=>true,
        'afterValidate'=>'js:function(form, data, hasError) {if (!hasError){ $.blockUI(); return true; }}',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'environment_name'); ?>
		<?php echo $form->textField($model,'environment_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'environment_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environment_url'); ?>
		<?php echo $form->textField($model,'environment_url',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'environment_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language_id'); ?>
		<?php //echo $form->textField($model,'language_id',array('size'=>50,'maxlength'=>50));
        $models = Language::model()->findAll();
        $list = CHtml::listData($models,'language_id', 'name');
        echo $form->dropDownList($model,'language_id', $list, array('prompt'=>'Select language')); ?>
		<?php echo $form->error($model,'language_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environment_currency'); ?>
		<?php echo $form->textField($model,'environment_currency',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'environment_currency'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environment_currency_symbol'); ?>
		<?php echo $form->textField($model,'environment_currency_symbol',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'environment_currency_symbol'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environment_desc'); ?>
		<?php echo $form->textArea($model,'environment_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'environment_desc'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class' => 'btn btn-success', 'id'=> "btnsubmit", 'name' => 'btnsubmit')); ?>
		<?php if(Yii::app()->user->usertype == 1){ ?>		
		<?php echo CHtml::button('Cancel', array('class'=>'btn btn-default','onclick' => 'js:document.location.href="'.Yii::app()->baseUrl.'/'.$this->uniqueid.'/admin"')); ?>
		<?php } ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->