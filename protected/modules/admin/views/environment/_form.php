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
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=> array(
        'validateOnSubmit'=>true,
        'afterValidate'=>'js:function(form, data, hasError) {if (!hasError){ $.blockUI(); return true; }}',
    ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
	<div class="row">
		<?php echo $form->labelEx($model,'env_title'); ?>
		<?php echo $form->textField($model,'env_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'env_title',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'env_slug'); ?>
		<?php echo $form->textField($model,'env_slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'env_slug'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'account_view_id'); ?>
		<?php echo $form->textField($model,'account_view_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'account_view_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'account_center_id'); ?>
		<?php echo $form->textField($model,'account_center_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'account_center_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'debtor_id'); ?>
		<?php echo $form->textField($model,'debtor_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'debtor_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'sales_journal_id'); ?>
		<?php echo $form->textField($model,'sales_journal_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sales_journal_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'purchase_journal_id'); ?>
		<?php echo $form->textField($model,'purchase_journal_id',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'purchase_journal_id',array(),false); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class' => 'btn btn-success', 'id'=> "btnsubmit", 'name' => 'btnsubmit')); ?>
		<?php if(Yii::app()->user->usertype == 1){ ?>		
		<?php echo CHtml::button('Cancel', array('class'=>'btn btn-default','onclick' => 'js:document.location.href="'.Yii::app()->baseUrl.'/'.$this->uniqueid.'/admin"')); ?>
		<?php } ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script>
	$(document).ready(function(){
	
		$("#Environment_env_title").bind("keyup", function(){
		   var title1 = document.getElementById("Environment_env_title").value;
		   var slug = slugify(title1);
		   jQuery("#Environment_env_slug").val(slug);
		  });
					
		  $("#Environment_env_slug").bind("keyup", function(){
		   var title2 = document.getElementById("Environment_env_slug").value;
		   var slug = slugify(title2);
		   jQuery("#Environment_env_slug").val(slug);
	});
})
</script>