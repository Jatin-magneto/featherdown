<?php
/* @var $this EmailSettingsController */
/* @var $model EmailSettings */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'email-settings-form',
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
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'template_id'); ?>
		<?php echo $form->textField($model,'template_id'); ?>
		<?php echo $form->error($model,'template_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_ids'); ?>
		<?php echo $form->textArea($model,'email_ids',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'email_ids'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->radioButtonList($model, 'isactive', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php //echo $form->textArea($model,'environments',array('rows'=>6, 'cols'=>50)); ?>
		<?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','env_title');
		echo $form->checkBoxList($model,'environments',$list,array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'environments'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class' => 'btn btn-success', 'id'=> "btnsubmit", 'name' => 'btnsubmit')); ?>
		<?php if(Yii::app()->user->usertype == 1){ ?>		
		<?php echo CHtml::button('Cancel', array('class'=>'btn btn-default','onclick' => 'js:document.location.href="'.Yii::app()->baseUrl.'/'.$this->uniqueid.'/admin"')); ?>
		<?php } ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->