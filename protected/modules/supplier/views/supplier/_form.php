<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'enableClientValidation'=>true,
	'clientOptions'=> array(
	'validateOnSubmit'=>true,
	'afterValidate'=>'js:function(form, data, hasError) {if (!hasError){ $.blockUI(); return true; } else {my_custom_validation()}}',
	),
)); ?>

<?php
	$tabs = array();

	$tabs['User'] = array(
	'id'=>'userTab',
	'content'=>$this->renderPartial('_formUser', array(
	'form' => $form,
	'model'=>$model,
	),
	true),
	);
	
	$tabs['User Details'] = array(
	'id'=>'userDetailsTab',
	'content'=>$this->renderPartial('_formUserDetails', array(
	'form' => $form,
	'model'=>$model,
	),
	true),
	);
	
	$tabs['Contact'] = array(
	'id'=>'userContactTab',
	'content'=>$this->renderPartial('_formContact', array(
	'form' => $form,
	'model'=>$model,
	),
	true),
	);
	
	$tabs['Other'] = array(
	'id'=>'userOtherTab',
	'content'=>$this->renderPartial('_formOther', array(
	'form' => $form,
	'model'=>$model,
	),
	true),
	);
	
	$this->widget('zii.widgets.jui.CJuiTabs', array(
	'tabs' => $tabs,
	'options' => array(
	'collapsible' => false,
	),
	));
?>
	
	
	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit',array('class' => 'btn btn-success', 'id'=> "btnsubmit", 'name' => 'btnsubmit')); ?>
		<?php if(Yii::app()->user->usertype == 1){ ?>		
		<?php echo CHtml::button('Cancel', array('class'=>'btn btn-default','onclick' => 'js:document.location.href="'.Yii::app()->baseUrl.'/'.$this->uniqueid.'/admin"')); ?>
		<?php } ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	
function my_custom_validation(){
	
	var environment_status = 0;
	$('.environment_validation').each(function(i, obj) {
		var my_id = this.id;
		if($('#'+my_id).is(':checked'))
			environment_status = 1;
	});
	
	
	if ($('#Supplier_username_em_').css('display') == 'block' || $('#Supplier_password_em_').css('display') == 'block' || $('#Supplier_repeat_password_em_').css('display') == 'block' || $('#Supplier_locale_id_em_').css('display') == 'block' || ($('#Supplier_isactive_0').is(':checked') == false && $('#Supplier_isactive_1').is(':checked') == false)) {
		$('#ui-id-1').trigger('click');
	}else if ($('#Supplier_first_name_em_').css('display') == 'block' || $('#Supplier_last_name_em_').css('display') == 'block' || $('#Supplier_addr_title_em_').css('display') == 'block' || $('#Supplier_addr_street_em_').css('display') == 'block' || $('#Supplier_addr_postal_code_em_').css('display') == 'block' || $('#Supplier_addr_city_id_em_').css('display') == 'block' || $('#Supplier_addr_state_id_em_').css('display') == 'block' || $('#Supplier_addr_country_id_em_').css('display') == 'block' || $('#Supplier_inv_title_em_').css('display') == 'block' || $('#Supplier_inv_street_em_').css('display') == 'block' || $('#Supplier_inv_postal_code_em_').css('display') == 'block' || $('#Supplier_inv_city_id_em_').css('display') == 'block' || $('#Supplier_inv_state_id_em_').css('display') == 'block' || $('#Supplier_inv_country_id_em_').css('display') == 'block' || ($('#Supplier_gender_0').is(':checked') == false && $('#Supplier_gender_1').is(':checked') == false && $('#Supplier_gender_2').is(':checked') == false)) {
		$('#ui-id-2').trigger('click');
	}else if ($('#Supplier_mobile_em_').css('display') == 'block' || $('#Supplier_email_em_').css('display') == 'block' || ($('#Supplier_newsletter_0').is(':checked') == false && $('#Supplier_newsletter_1').is(':checked') == false) || ($('#Supplier_brochure_0').is(':checked') == false && $('#Supplier_brochure_1').is(':checked') == false)) {
		$('#ui-id-3').trigger('click');
	}else if (environment_status == 0 || $('#Supplier_default_env_id_em_').css('display') == 'block' || $('#Supplier_creditorid_em_').css('display') == 'block' || $('#Supplier_accountview_costid_em_').css('display') == 'block' || (!$('#Supplier_default_env_only_0').is(':checked') == false && !$('#Supplier_default_env_only_1').is(':checked') == false)) {
		$('#ui-id-4').trigger('click');
	}
	
	//if ($.trim($('#Supplier_username').val()) == '' || $.trim($('#Supplier_password').val())== '' || $.trim($('#Supplier_repeat_password').val())== '' || $.trim($('#Supplier_locale_id').val())== '' || ($('#Supplier_isactive_0').is(':checked') == false && $('#Supplier_isactive_1').is(':checked') == false)) {
	//	$('#ui-id-1').trigger('click');
	//}else if ($('#Supplier_first_name_em_').css('display') == 'block' || $.trim($('#Supplier_last_name').val())== '' || $.trim($('#Supplier_addr_title').val())== '' || $.trim($('#Supplier_addr_street').val())== '' || $.trim($('#Supplier_addr_postal_code').val()) == '' || $.trim($('#Supplier_addr_city_id').val()) == '' || $.trim($('#Supplier_addr_state_id').val())== '' || $.trim($('#Supplier_addr_country_id').val())== '' || ($('#Supplier_gender_0').is(':checked') == false && $('#Supplier_gender_1').is(':checked') == false && $('#Supplier_gender_2').is(':checked') == false)) {
	//	$('#ui-id-2').trigger('click');
	//}else if ($.trim($('#Supplier_mobile').val()) == '' || $.trim($('#Supplier_email').val())== '' || ($('#Supplier_newsletter_0').is(':checked') == false && $('#Supplier_newsletter_1').is(':checked') == false) || ($('#Supplier_brochure_0').is(':checked') == false && $('#Supplier_brochure_1').is(':checked') == false)) {
	//	$('#ui-id-3').trigger('click');
	//}else if (environment_status == 0 || $.trim($('#Supplier_default_env_id').val()) == '' || $.trim($('#Supplier_creditorid').val())== '' || $.trim($('#Supplier_accountview_costid').val())== '' || (!$('#Supplier_default_env_only_0').is(':checked') == false && !$('#Supplier_default_env_only_1').is(':checked') == false)) {
	//	$('#ui-id-4').trigger('click');
	//}
}
$(document).ready(function(){
	//$('#btnsubmit').click(function(){
		
	
	
	$("#Supplier_dob").attr('readonly', 'readonly');
	$("#Supplier_last_login").attr('readonly', 'readonly');
	$("#Supplier_last_invoiceid").attr('readonly', 'readonly');
	
	
    $('#i_a_0').click(function(){
        if($('#i_a_0').prop('checked')){
            $('#Supplier_inv_title').val($('#Supplier_addr_title').val());
            $('#Supplier_inv_street').val($('#Supplier_addr_street').val());
            $('#Supplier_inv_street_2').val($('#Supplier_addr_street_2').val());
	    $('#Supplier_inv_street_no').val($('#Supplier_addr_street_no').val());
            $('#Supplier_inv_street_no_sufx').val($('#Supplier_addr_street_no_sufx').val());
            $('#Supplier_inv_postal_code').val($('#Supplier_addr_postal_code').val());	    
            $('#Supplier_inv_country_id').val($('#Supplier_addr_country_id').val());			
			$('#Supplier_inv_country_id').trigger('change');			
			window.setTimeout(function(){$('#Supplier_inv_state_id option[value='+$('#Supplier_addr_state_id').val()+']').attr('selected','selected')}, 2000);
			$('#Supplier_inv_state_id').trigger('change');
			window.setTimeout(function(){$('#Supplier_inv_city_id option[value='+$('#Supplier_addr_city_id').val()+']').attr('selected','selected')}, 2000);			
        } else {
            //Clear on uncheck
            $('#Supplier_inv_title').val("");
            $('#Supplier_inv_street').val("");
            $('#Supplier_inv_street_2').val("");
            $('#Supplier_inv_street_no_sufx').val("");
	    $('#Supplier_inv_postal_code').val("");
            $('#Supplier_inv_city_id').val("");
            $('#Supplier_inv_state_id').val("");
            $('#Supplier_inv_country_id').val("");
	    $('#Supplier_inv_street_no').val("");
        };

    });

	$("#Supplier_addr_title").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_title").val(stt);
		}
	});
	$("#Supplier_addr_street").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_street").val(stt);
		}
	});
	$("#Supplier_addr_street_2").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_street_2").val(stt);
		}
	});
	$("#Supplier_addr_street_no_sufx").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_street_no_sufx").val(stt);
		}
	});
	$("#Supplier_addr_postal_code").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_postal_code").val(stt);
		}
	});
	$("#Supplier_addr_street_no").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_street_no").val(stt);
		}
	});
	$("#Supplier_addr_city_id").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_city_id").val(stt);
		}
	});
	$("#Supplier_addr_state_id").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_state_id").val(stt);
		}
	});
	$("#Supplier_addr_country_id").keyup(function(event) {
		if($('#i_a_0').prop('checked')){
			var stt=$(this).val();
			$("#Supplier_inv_country_id").val(stt);
		}
	});
});
</script>

