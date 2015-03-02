<?php
/* @var $this LedgerController */
/* @var $model Ledger */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ledger-form',
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

	<?php $environment_cond = Yii::app()->session['environment_cond']; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ledger_no'); ?>
		<?php echo $form->textField($model,'ledger_no'); ?>
		<?php echo $form->error($model,'ledger_no',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ledger_title'); ?>
		<?php echo $form->textField($model,'ledger_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ledger_title',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ledger_slug'); ?>
		<?php echo $form->textField($model,'ledger_slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ledger_slug'); ?>
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
		$("#Ledger_ledger_title").bind("keyup", function(){
			var title1 = document.getElementById("Ledger_ledger_title").value;
			var slug = slugify(title1);
			jQuery("#Ledger_ledger_slug").val(slug);
		});
            
		$("#Ledger_ledger_slug").bind("keyup", function(){
			var title2 = document.getElementById("Ledger_ledger_slug").value;
			var slug = slugify(title2);
			jQuery("#Ledger_ledger_slug").val(slug);
		});
	});
</script>