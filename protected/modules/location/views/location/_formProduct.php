 <?php
/* @var $this LocationProductController */
/* @var $model LocationProduct */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'location-product-form',
	'action' => Yii::app()->createUrl('location/location/addProduct'),  //<- your form action here
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=>true,
	'clientOptions'=> array(
	'validateOnSubmit'=>true,
	'afterValidate'=>'js:function(form, data, hasError) {if (!hasError){ $.blockUI(); return true; } else {my_custom_validation()}}',
	),
)); ?>

<?php
	$tabs = array();

	$tabs['Availability'] = array(
	'id'=>'availabilityTab',
	'content'=>$this->renderPartial('_formAvailability', array(
	'form' => $form,
	'model_lp'=>$model_lp,
	),
	true),
	);
	
	$tabs['Sales'] = array(
	'id'=>'salesTab',
	'content'=>$this->renderPartial('_formSales', array(
	'form' => $form,
	'model_lp'=>$model_lp,
	'model_ls'=>$model_ls,
	),
	true),
	);
	
	$tabs['Purchase'] = array(
	'id'=>'purchaseTab',
	'content'=>$this->renderPartial('_formPurchase', array(
	'form' => $form,
	'model_lp'=>$model_lp,
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
		<?php echo CHtml::button('Cancel', array('class'=>'btn btn-default','aria-label'=>"Close", 'data-dismiss'=>"modal")); ?>
		<?php } ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
$(document).ready(function(){
var id = <?php echo (isset($_GET['id']))?$_GET['id']:'0'; ?>;
var input = $("<input>")
			   .attr("type", "hidden")
			   .attr("name", "location").val(id);
$('#location-product-form').append($(input));
});

function my_custom_validation(){
					
	if ($('#availabilityTab .errorMessage').css('display') == 'block' ) {
		$('#ui-id-1').trigger('click');
	}else if ($('#salesTab .errorMessage').css('display') == 'block' ) {
		$('#ui-id-2').trigger('click');
	}else if ($('#salesTab .errorMessage').css('display') == 'block' ) {
		$('#ui-id-3').trigger('click');
	}
}
</script>