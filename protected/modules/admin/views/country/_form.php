<?php
/* @var $this CountryController */
/* @var $model Country */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'country-form',
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
		<?php echo $form->labelEx($model,'country_name'); ?>
		<?php echo $form->textField($model,'country_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'country_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_slug'); ?>
		<?php echo $form->textField($model,'country_slug',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'country_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_abbreviation'); ?>
		<?php echo $form->textField($model,'country_abbreviation'); ?>
		<?php echo $form->error($model,'country_abbreviation',array(),false); ?>
 </div>
    <?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'country_flag'); ?>
		<?php echo $form->textField($model,'country_flag',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'country_flag'); ?>
	</div>
    */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php //echo $form->textArea($model,'environments',array('rows'=>6, 'cols'=>50)); ?>
        <?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','env_title');
              echo $form->checkBoxList($model,'environments',$list,array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
  <?php echo $form->error($model,'environments',array(),false); ?>
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
		$("#Country_country_name").bind("keyup", function(){
			var title1 = document.getElementById("Country_country_name").value;
			var slug = slugify(title1);
			jQuery("#Country_country_slug").val(slug);
		});
            
		$("#Country_country_slug").bind("keyup", function(){
			var title2 = document.getElementById("Country_country_slug").value;
			var slug = slugify(title2);
			jQuery("#Country_country_slug").val(slug);
		});
	});
</script>