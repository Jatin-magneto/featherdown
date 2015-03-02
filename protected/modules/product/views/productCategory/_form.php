<?php
/* @var $this ProductCategoryController */
/* @var $model ProductCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-category-form',
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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php $environment_cond = Yii::app()->session['environment_cond']; ?>
    
    
	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parent_category_id'); ?>
	        <?php
		$parents = ProductCategory::model()->findAll('parent_category_id = 0');
		$cm = new Functions();
		$data = $cm->makeDropDown($parents);
		echo $form->dropDownList($model,'parent_category_id',  $data);
		?>		
		<?php echo $form->error($model,'parent_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php //echo $form->textArea($model,'environments',array('rows'=>6, 'cols'=>50)); ?>
		<?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','env_title');
                echo $form->checkBoxList($model,'environments',$list,array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'environments'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->radioButtonList($model, 'isactive', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>

	<?php $this->widget('EnvironmentContentDetail',array('model2'=>$model2,'form'=>$form)); ?>
	
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
			var primary_table_flag	= 5;
			var rid					= '<?php echo (isset($_GET['id']) ? $_GET['id'] : 0); ?>'
			
			var result = checkSlugUnique(id,lang_id,slug,primary_table_flag,rid);
			//var slug = slugify(title1);
		});		
	});
</script>