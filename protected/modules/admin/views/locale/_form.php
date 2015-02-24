<?php
/* @var $this LocaleController */
/* @var $model Locale */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'locale-form',
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
	<?php $environment_cond = Yii::app()->session['environment_cond']; ?>
	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', CHtml::listData( Country::model()->findAll(array('condition'=>"$environment_cond")), 'country_id', 'country_name'),
                array('class'=>'span3', 'prompt' => 'Select Country')); ?>
		<?php echo $form->error($model,'country_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language_id'); ?>
		<?php //echo $form->textField($model,'language_id',array('size'=>50,'maxlength'=>50));
        $models = Language::model()->findAll();
        $list = CHtml::listData($models,'language_id', 'name');
        echo $form->dropDownList($model,'language_id', $list, array('prompt'=>'Select Language')); ?>
		<?php echo $form->error($model,'language_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'currency_id'); ?>
		<?php //echo $form->textField($model,'language_id',array('size'=>50,'maxlength'=>50));
        $models = Currency::model()->findAll();
        $list = CHtml::listData($models,'currency_id', 'currency_name');
        echo $form->dropDownList($model,'currency_id', $list, array('prompt'=>'Select Currency')); ?>
		<?php echo $form->error($model,'currency_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locale'); ?>
		<?php echo $form->textField($model,'locale',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'locale',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locale_slug'); ?>
		<?php echo $form->textField($model,'locale_slug',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'locale_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_short'); ?>
		<?php echo $form->textField($model,'date_short',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'date_short',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_long'); ?>
		<?php echo $form->textField($model,'date_long',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'date_long',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locale_pricing'); ?>
		<?php echo $form->textField($model,'locale_pricing',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'locale_pricing',array(),false); ?>
	</div>	
	
	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','environment_url');
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
		$("#Locale_locale").bind("keyup", function(){
			var title1 = document.getElementById("Locale_locale").value;
			var slug = slugify(title1);
			jQuery("#Locale_locale_slug").val(slug);
		});
            
		$("#Locale_locale_slug").bind("keyup", function(){
			var title2 = document.getElementById("Locale_locale_slug").value;
			var slug = slugify(title2);
			jQuery("#Locale_locale_slug").val(slug);
		});
	});
</script>