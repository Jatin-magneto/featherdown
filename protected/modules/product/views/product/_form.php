<?php
/* @var $this ProductController */
/* @var $model Product */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	'enableClientValidation'=>true,
	'clientOptions'=> array(
	'validateOnSubmit'=>true,
	'afterValidate'=>'js:function(form, data, hasError) {if (!hasError){ $.blockUI(); return true; }}',
	),
)); ?>

<?php
	$tabs = array();

	$tabs['Product Details'] = array(
	'id'=>'productDetailTab',
	'content'=>$this->renderPartial('_formProduct', array(
	'form' => $form,
	'model'=>$model,
	'model2'=>$model2,
	),
	true),
	);
	
	$tabs['Linked Product'] = array(
	'id'=>'linkedProductTab',
	'content'=>$this->renderPartial('_formLinkedProduct', array(
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
<script>
	$(document).ready(function(){
		$(document).on("change, blur", ".slug-unique", function(){		
			var lang_id 			= $(this).attr('rel');
			var id 					= 'EnvironmentContent_'+lang_id+'_env_title_slug_em_mis';
			var slug	 			= document.getElementById("EnvironmentContent_"+lang_id+"_env_title_slug").value;
			var primary_table_flag	= 6;
			var rid					= '<?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>'
			
			var result = checkSlugUnique(id,lang_id,slug,primary_table_flag,rid);
			//var slug = slugify(title1);
		});		
	});
</script>