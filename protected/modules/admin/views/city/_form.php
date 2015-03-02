<?php
/* @var $this CityController */
/* @var $model City */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'city-form',
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
		<?php echo $form->labelEx($model,'city_name'); ?>
		<?php echo $form->textField($model,'city_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_slug'); ?>
		<?php echo $form->textField($model,'city_slug',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'city_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_abbreviation'); ?>
		<?php echo $form->textField($model,'city_abbreviation'); ?>
		<?php echo $form->error($model,'city_abbreviation',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', CHtml::listData( Country::model()->findAll(array('condition'=>"$environment_cond")), 'country_id', 'country_name'),
                    array(
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('Country/dynamicprovincecity'),
                        'update'=>'#City_state_id', //selector to update
                    ),
                    'class'=>'span3', 'prompt' => 'Select Country')); ?>
		<?php echo $form->error($model,'country_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'state_id'); ?>
		<?php
			if($model->country_id != ''){
			    $country = " country_id = ".$model->country_id." and ";
			}else{	    
			    $country = "false and ";
			}
		?>
		<?php echo $form->dropDownList($model, 'state_id', CHtml::listData( Province::model()->findAll(array('condition'=>"$country $environment_cond")), 'province_id', 'province_name'),array('class'=>'span3', 'prompt' => 'Select Province')); ?>
		<?php //echo $form->dropDownList($model, 'state_id', CHtml::listData( Province::model()->findAll(array('condition'=>"$environment_cond")), 'province_id', 'province_name'),array('class'=>'span3', 'prompt' => 'Select a Province')); ?>
		<?php echo $form->error($model,'state_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
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
		$("#City_city_name").bind("keyup", function(){
			var title1 = document.getElementById("City_city_name").value;
			var slug = slugify(title1);
			jQuery("#City_city_slug").val(slug);
		});
            
		$("#City_city_slug").bind("keyup", function(){
			var title2 = document.getElementById("City_city_slug").value;
			var slug = slugify(title2);
			jQuery("#City_city_slug").val(slug);
		});
	});
</script>