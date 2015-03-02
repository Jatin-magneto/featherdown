<?php
/* @var $this ProvinceController */
/* @var $model Province */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'province-form',
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
		<?php echo $form->labelEx($model,'province_name'); ?>
		<?php echo $form->textField($model,'province_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'province_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province_slug'); ?>
		<?php echo $form->textField($model,'province_slug',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'province_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province_abbreviation'); ?>
		<?php echo $form->textField($model,'province_abbreviation'); ?>
		<?php echo $form->error($model,'province_abbreviation',array(),false); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php $environment_cond = Yii::app()->session['environment_cond']; ?>
        <?php echo $form->dropDownList($model, 'country_id', CHtml::listData( Country::model()->findAll(array('condition'=>"$environment_cond")), 'country_id', 'country_name'),array('class'=>'span3', 'prompt' => 'Select a Country')); ?>
		<?php echo $form->error($model,'country_id',array(),false); ?>
	</div>

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
		$("#Province_province_name").bind("keyup", function(){
			var title1 = document.getElementById("Province_province_name").value;
			var slug = slugify(title1);
			jQuery("#Province_province_slug").val(slug);
		});
            
		$("#Province_province_slug").bind("keyup", function(){
			var title2 = document.getElementById("Province_province_slug").value;
			var slug = slugify(title2);
			jQuery("#Province_province_slug").val(slug);
		});
	});
</script>