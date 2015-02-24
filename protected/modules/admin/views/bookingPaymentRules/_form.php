<?php
/* @var $this Payment RulesController */
/* @var $model Payment Rules */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'booking-payment-rules-form',
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
));
?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
	
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
		<?php echo $form->labelEx($model,'request_send_before'); ?>
		<?php echo $form->textField($model,'request_send_before'); ?>
		<?php echo $form->error($model,'request_send_before'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'start_date', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language'=>'',
                    'options'=>array(
                        'regional'=>'',
                        "dateFormat"=>'mm-dd-yy',
                    ) // jquery plugin options
		));
		?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'end_date', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language'=>'',
                    'options'=>array(
                        'regional'=>'',
                        "dateFormat"=>'mm-dd-yy',
                    ) // jquery plugin options
		));
		?>
		<?php echo $form->error($model,'end_date'); ?>
		<div style="display: none;" id="BookingPaymentRules_end_date_em_mis" class="errorMessage">End date must be greater than Start date.</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_day'); ?>
		<?php echo $form->textField($model,'start_day',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'start_day'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'end_day'); ?>
		<?php echo $form->textField($model,'end_day',array('size'=>3,'maxlength'=>3)); ?>
		<?php echo $form->error($model,'end_day'); ?>
	</div>
	
	<?php if($model->isNewRecord!='1'){
		$id = $model->payment_rule_id;
		$instalments = BookingPaymentRulesInst::model()->findAll(array('condition'=>"payment_rule_id=$id"));
		//pre($instalments);
		$Percent0 = $instalments[0]->percent;
		$day0 = $instalments[0]->day;
	} ?>
	<div class='row groupdp'>
	
		<label>Percent</label>
		<input type=text id="BookingPaymentRulesInst_percent0" name="BookingPaymentRulesInst_percent[0]" value="<?php echo isset($Percent0)?$Percent0:''; ?>">
	
	
	
		<label class='daylabel'>Day</label>
		<input type=text id="BookingPaymentRulesInst_day0" name="BookingPaymentRulesInst_day[0]" value="<?php echo isset($day0)?$day0:''; ?>">
		<?php echo CHtml::link('+', '', array('onClick'=>'addInst()', 'class'=>'add btn btn-success btn-xs'));?>
		<?php //echo CHtml::link('-', '', array('onClick'=>'remInst()', 'class'=>'rem btn btn-danger btn-xs'));?>
	
	</div>
	<div id="additional-inputs">
		<?php
		if($model->isNewRecord!='1'){
			$i = 0;
			$rows = count($instalments);
			foreach($instalments as $inst){ 
			if($i!=0){ ?>
			<div class='row groupdp'>
				<label>Percent</label>
				<input type=text id="BookingPaymentRulesInst_percent<?php echo $i; ?>" name="BookingPaymentRulesInst_percent[<?php echo $i; ?>]" value="<?php echo $inst->percent; ?>">
				<label class='daylabel'>Day</label>
				<input type=text id="BookingPaymentRulesInst_day<?php echo $i; ?>" name="BookingPaymentRulesInst_day[<?php echo $i; ?>]" value="<?php echo $inst->day; ?>">
				<?php echo CHtml::link('-', '', array('onClick'=>"remInst($i)", 'class'=>'rem btn btn-danger btn-xs'));?>
			</div>
		<?php	}
			$i++;
			} ?>
			<input type='hidden' id='rows' value=<?php echo $rows-1; ?> >
			<?php
		}else{ ?>
		<input type='hidden' id='rows' value=0 >
		<?php } ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php //echo $form->textArea($model,'environments',array('rows'=>6, 'cols'=>50)); ?>
		<?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','environment_url');
                echo $form->checkBoxList($model,'environments',$list,array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'environments'); ?>
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
function addInst()
{
	var id="BookingPaymentRulesInst_percent";
	var id2="BookingPaymentRulesInst_day";
	var size=$("#rows").val();
	var size = parseInt(size,10)+1;
	$("#rows").val(size);
	$("#additional-inputs").append("<div class = 'row groupdp'><label>Percent</label><input type=text id="+id+size+" name="+id+"["+size+"]><label class='daylabel'>Day</label><input type=text id="+id2+size+" name="+id2+"["+size+"]><a class='rem btn btn-danger btn-xs' onclick='remInst("+size+")'>-</a></div>");
}
function remInst(id)
{
	//var size=$("#rows").val();
	//var size = parseInt(size,10)-1;
	//$("#rows").val(size);
	$('#BookingPaymentRulesInst_percent'+id).parent('div').remove();
	$('#BookingPaymentRulesInst_day'+id).parent('div').remove();	
}

$(document).ready(function(){
	var date_validate = 0;
	$('#BookingPaymentRules_end_date').change(function(){
		
		var x 	= $('#BookingPaymentRules_start_date').val();
		var str = x.replace('-','');
		var x 	= str.replace('-','');
		
		var y = $('#BookingPaymentRules_end_date').val();
		var str = y.replace('-','');
		var y 	= str.replace('-','');
		
		if (parseInt(x) > parseInt(y)) {
			date_validate = 1;
			$('#BookingPaymentRules_end_date_em_mis').show();
			$('#BookingPaymentRules_end_date_em_mis').parent('div').addClass('error');
			$('#BookingPaymentRules_end_date_em_mis').parent('div').removeClass('success');
			return false;
		}else{
			date_validate = 0;
			$('#BookingPaymentRules_end_date_em_mis').hide();
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