<?php
/* @var $this CurrencyController */
/* @var $model Currency */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'currency-form',
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

	<?php //echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_name'); ?>
		<?php echo $form->textField($model,'currency_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'currency_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_slug'); ?>
		<?php echo $form->textField($model,'currency_slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'currency_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_abrv'); ?>
		<?php echo $form->textField($model,'currency_abrv',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'currency_abrv',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currency_symbol'); ?>
		<?php echo $form->textField($model,'currency_symbol',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'currency_symbol',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->radioButtonList($model, 'isactive', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'isactive',array(),false); ?>
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
		$("#Currency_currency_name").bind("keyup", function(){
			var title1 = document.getElementById("Currency_currency_name").value;
			var slug = slugify(title1);
			jQuery("#Currency_currency_slug").val(slug);
		});
            
		$("#Currency_currency_slug").bind("keyup", function(){
			var title2 = document.getElementById("Currency_currency_slug").value;
			var slug = slugify(title2);
			jQuery("#Currency_currency_slug").val(slug);
		});
	});
</script>