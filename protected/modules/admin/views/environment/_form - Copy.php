<?php
/* @var $this EnvironmentController */
/* @var $model Environment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'environment-form',
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
)); ?>
<?php
	$tabs = array();

	$tabs['Environment'] = array(
	'id'=>'environmentTab',
	'content'=>$this->renderPartial('_formEnvironment', array(
	'form' => $form,
	'model'=>$model,
	),
	true),
	);
	
	$tabs['Administration'] = array(
	'id'=>'linkedAdministrationTab',
	'content'=>$this->renderPartial('_formAdministration', array(
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
		
		$('#btnsubmit').click(function(){			
			if ($.trim($('#Environment_env_title').val()) == '' || $.trim($('#Environment_env_slug').val())== '' || $.trim($('#Environment_account_view_id').val())== '' || $.trim($('#Environment_account_center_id').val())== '' || $.trim($('#Environment_debtor_id').val())== '' || $.trim($('#Environment_sales_journal_id').val())== '' || $.trim($('#Environment_purchase_journal_id').val())== '') {
				$("#ui-id-1").parent().removeClass('ui-tabs-active ui-state-active');
				$("#ui-id-1").parent().attr('tabindex',"-1");
				$("#ui-id-1").parent().attr('aria-selected',"false");
				$("#ui-id-1").parent().attr('aria-expanded',"false");
				$("#ui-id-1").attr('tabindex',"0");
				$('#environmentTab').hide();
				$('#environmentTab').attr('aria-hidden','false');
				
				$("#ui-id-2").parent().addClass('ui-tabs-active ui-state-active');
				$("#ui-id-2").parent().attr('tabindex',"0");
				$("#ui-id-2").attr('tabindex',"-1");
				$("#ui-id-2").parent().attr('aria-selected',"true");
				$("#ui-id-2").parent().attr('aria-expanded',"true");
				$('#linkedAdministrationTab').show();
				$('#linkedAdministrationTab').attr('aria-hidden','true');				
				
			}
		})
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