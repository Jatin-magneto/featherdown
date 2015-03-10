<?php
/* @var $this OwnerController */
/* @var $model Owner */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'owner-form',
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
$(document).ready(function(){
	$("#Owner_dob").attr('readonly', 'readonly');
	$("#Owner_last_login").attr('readonly', 'readonly');
	$("#Owner_last_invoiceid").attr('readonly', 'readonly');
	
	
    $('#i_a_0').click(function(){
        if($('#i_a_0').prop('checked')){
            $('#Owner_inv_title').val($('#Owner_addr_title').val());
            $('#Owner_inv_street').val($('#Owner_addr_street').val());
            $('#Owner_inv_street_2').val($('#Owner_addr_street_2').val());
	    $('#Owner_inv_street_no').val($('#Owner_addr_street_no').val());
            $('#Owner_inv_street_no_sufx').val($('#Owner_addr_street_no_sufx').val());
            $('#Owner_inv_postal_code').val($('#Owner_addr_postal_code').val());
	    $('#Owner_inv_city_id').val($('#Owner_addr_city_id').val());
            $('#Owner_inv_state_id').val($('#Owner_addr_state_id').val());
            $('#Owner_inv_country_id').val($('#Owner_addr_country_id').val());
        } else {
            //Clear on uncheck
            $('#Owner_inv_title').val("");
            $('#Owner_inv_street').val("");
            $('#Owner_inv_street_2').val("");
            $('#Owner_inv_street_no_sufx').val("");
	    $('#Owner_inv_postal_code').val("");
            $('#Owner_inv_city_id').val("");
            $('#Owner_inv_state_id').val("");
            $('#Owner_inv_country_id').val("");
	    $('#Owner_inv_street_no').val("");
        };

    });
});
$("#Owner_addr_title").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_title").val(stt);
	}
});
$("#Owner_addr_street").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_street").val(stt);
	}
});
$("#Owner_addr_street_2").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_street_2").val(stt);
	}
});
$("#Owner_addr_street_no_sufx").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_street_no_sufx").val(stt);
	}
});
$("#Owner_addr_postal_code").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_postal_code").val(stt);
	}
});
$("#Owner_addr_street_no").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_street_no").val(stt);
	}
});
$("#Owner_addr_city_id").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_city_id").val(stt);
	}
});
$("#Owner_addr_state_id").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_state_id").val(stt);
	}
});
$("#Owner_addr_country_id").keyup(function(event) {
	if($('#i_a_0').prop('checked')){
	    var stt=$(this).val();
	    $("#Owner_inv_country_id").val(stt);
	}
});
function my_custom_validation(){
	
	var environment_status = 0;
	$('.environment_validation').each(function(i, obj) {
		var my_id = this.id;
		if($('#'+my_id).is(':checked'))
			environment_status = 1;
	});
	
	
	if ($('#Owner_username_em_').css('display') == 'block' || $('#Owner_password_em_').css('display') == 'block' || $('#Owner_repeat_password_em_').css('display') == 'block' || $('#Owner_locale_id_em_').css('display') == 'block' || ($('#Owner_isactive_0').is(':checked') == false && $('#Owner_isactive_1').is(':checked') == false)) {
		$('#ui-id-1').trigger('click');
	}else if ($('#Owner_first_name_em_').css('display') == 'block' || $('#Owner_last_name_em_').css('display') == 'block' || $('#Owner_addr_title_em_').css('display') == 'block' || $('#Owner_addr_street_em_').css('display') == 'block' || $('#Owner_addr_postal_code_em_').css('display') == 'block' || $('#Owner_addr_city_id_em_').css('display') == 'block' || $('#Owner_addr_state_id_em_').css('display') == 'block' || $('#Owner_addr_country_id_em_').css('display') == 'block' || $('#Owner_inv_title_em_').css('display') == 'block' || $('#Owner_inv_street_em_').css('display') == 'block' || $('#Owner_inv_postal_code_em_').css('display') == 'block' || $('#Owner_inv_city_id_em_').css('display') == 'block' || $('#Owner_inv_state_id_em_').css('display') == 'block' || $('#Owner_inv_country_id_em_').css('display') == 'block' || ($('#Owner_gender_0').is(':checked') == false && $('#Owner_gender_1').is(':checked') == false && $('#Owner_gender_2').is(':checked') == false)) {
		$('#ui-id-2').trigger('click');
	}else if ($('#Owner_mobile_em_').css('display') == 'block' || $('#Owner_email_em_').css('display') == 'block' || ($('#Owner_newsletter_0').is(':checked') == false && $('#Owner_newsletter_1').is(':checked') == false) || ($('#Owner_brochure_0').is(':checked') == false && $('#Owner_brochure_1').is(':checked') == false)) {
		$('#ui-id-3').trigger('click');
	}else if (environment_status == 0 || $('#Owner_default_env_id_em_').css('display') == 'block' || $('#Owner_creditorid_em_').css('display') == 'block' || $('#Owner_accountview_costid_em_').css('display') == 'block' || (!$('#Owner_default_env_only_0').is(':checked') == false && !$('#Owner_default_env_only_1').is(':checked') == false)) {
		$('#ui-id-4').trigger('click');
	}
}
</script>

