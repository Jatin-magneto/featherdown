<?php
/* @var $this TaxController */
/* @var $model Tax */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tax-form',
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

	<?php $environment_cond = (Yii::app()->session['environment_cond'] == '')?'true':Yii::app()->session['environment_cond']; ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'tax_group_id'); ?>
		<?php echo $form->dropDownList($model, 'tax_group_id',CHtml::listData(TaxGroup::model()->findAll(array('condition'=>"$environment_cond")),'tax_group_id','title'),array('class'=>'span3', 'prompt' => 'Select a Tax Group')); ?>  
		<?php echo $form->error($model,'tax_group_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'country_id'); ?>
		<?php echo $form->dropDownList($model, 'country_id', CHtml::listData( Country::model()->findAll(array('condition'=>"$environment_cond")), 'country_id', 'country_name'),
                    array(
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('Country/dynamicprovince'),
                        'update'=>'#Tax_province_id', //selector to update
                    ),
                    'class'=>'span3', 'prompt' => 'Select Country')); ?>
		<?php echo $form->error($model,'country_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'province_id'); ?>
		<?php
			if($model->country_id != ''){
			    $country = " country_id = ".$model->country_id." and ";
			}else{	    
			    $country = "false and ";
			}
		?>
		<?php echo $form->dropDownList($model, 'province_id', CHtml::listData( Province::model()->findAll(array('condition'=>"$country $environment_cond")), 'province_id', 'province_name'),array( 'multiple' => 'multiple','size'=>'4','class'=>'span3', 'prompt' => 'Select Province')); ?>
		<?php echo $form->error($model,'province_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value'); ?>
		<?php echo $form->textField($model,'value'); ?>
		<?php echo $form->error($model,'value',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'value_type'); ?>
		<?php //echo $form->textField($model,'value_type',array('size'=>50,'maxlength'=>50)); ?>
        <?php echo $form->radioButtonList($model, 'value_type', array('Percentage'=>'Percentage', 'Vast'=>'Vast'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'value_type',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vat_margin_value'); ?>
		<?php echo $form->textField($model,'vat_margin_value'); ?>
		<?php echo $form->error($model,'vat_margin_value',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'vat_margin_value_type'); ?>
        <?php echo $form->radioButtonList($model, 'vat_margin_value_type', array('Percentage'=>'Percentage', 'Vast'=>'Vast'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'vat_margin_value_type',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code'); ?>
		<?php echo $form->error($model,'code',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'title',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title_slug'); ?>
		<?php echo $form->textField($model,'title_slug',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'title_slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publish_from'); ?>
		<?php //echo $form->textField($model,'publish_from'); ?>
        <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'publish_from', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language'=>'',
                    'options'=>array(
                        'regional'=>'',
                        "dateFormat"=>'mm-dd-yy',
					//'minDate'=>'0',
                    ) // jquery plugin options
                ));
            ?>
		<?php echo $form->error($model,'publish_from',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'publish_until'); ?>
		<?php //echo $form->textField($model,'publish_until'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'publish_until', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language'=>'',
                    'options'=>array(
                        'regional'=>'',
                        "dateFormat"=>'mm-dd-yy',
						//'minDate'=>'0',
                    ) // jquery plugin options
                ));
		?>
		<?php echo $form->error($model,'publish_until',array(),false); ?>
		<div style="display: none;" id="Tax_publish_until_em_mis" class="errorMessage">Publish Until date must be greater than Publish From date.</div>
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
		$("#Tax_publish_from").attr('readonly', 'readonly');
		$("#Tax_publish_until").attr('readonly', 'readonly');
		
		$("#Tax_title").bind("keyup", function(){
			var title1 = document.getElementById("Tax_title").value;
			var slug = slugify(title1);
			jQuery("#Tax_title_slug").val(slug);
		});
            
		$("#Tax_title_slug").bind("keyup", function(){
			var title2 = document.getElementById("Tax_title_slug").value;
			var slug = slugify(title2);
			jQuery("#Tax_title_slug").val(slug);
		});
		var date_validate = 0;
		$('#Tax_publish_until,#Tax_publish_from').change(function(){
			
			var x 	= $('#Tax_publish_from').val();
			var str = x.replace('-','');
			var x 	= str.replace('-','');
			
			var y = $('#Tax_publish_until').val();
			var str = y.replace('-','');
			var y 	= str.replace('-','');
			
			if (parseInt(x) > parseInt(y)) {
				date_validate = 1;
				$('#Tax_publish_until_em_mis').show();				
				return false;
			}else{
				date_validate = 0;
				$('#Tax_publish_until_em_mis').hide();
			}
		})
		//$('#btnsubmit').click(function(){
		//	if (date_validate == 0) {
		//		this.form.submit();
		//	} else {
		//		return false;
		//	}
		//})
	});
</script>