<?php
/* @var $this LedgerCategoryController */
/* @var $model LedgerCategory */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'ledger-category-form',
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
		<?php echo $form->labelEx($model,'product_category_id'); ?>
		<?php echo $form->dropDownList($model, 'product_category_id',CHtml::listData(ProductCategory::model()->findAll(array('condition'=>"$environment_cond")),'category_id','title'),array('class'=>'span3', 'prompt' => 'Select Product Category')); ?>  
		<?php echo $form->error($model,'product_category_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sales_group_id'); ?>
		<?php echo $form->dropDownList($model, 'sales_group_id',CHtml::listData(TaxGroup::model()->findAll(array('condition'=>"$environment_cond")),'tax_group_id','title'),array('class'=>'span3', 'prompt' => 'Select Sales Tax Group')); ?>  
		<?php echo $form->error($model,'sales_group_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'purchase_group_id'); ?>
		<?php echo $form->dropDownList($model, 'purchase_group_id',CHtml::listData(TaxGroup::model()->findAll(array('condition'=>"$environment_cond")),'tax_group_id','title'),array('class'=>'span3', 'prompt' => 'Select Purchase Tax Group')); ?>  
		<?php echo $form->error($model,'purchase_group_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ledger_sales'); ?>
		<?php echo $form->dropDownList($model, 'ledger_sales',CHtml::listData(Ledger::model()->findAll(),'ledger_id','ledger_title'),array('class'=>'span3', 'prompt' => 'Select Sales Ledger')); ?>  
		<?php echo $form->error($model,'ledger_sales',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ledger_purchase'); ?>
		<?php echo $form->dropDownList($model, 'ledger_purchase',CHtml::listData(Ledger::model()->findAll(),'ledger_id','ledger_title'),array('class'=>'span3', 'prompt' => 'Select Purchase Ledger')); ?>  
		<?php echo $form->error($model,'ledger_purchase',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ledger_payment'); ?>
		<?php echo $form->dropDownList($model, 'ledger_payment',CHtml::listData(Ledger::model()->findAll(),'ledger_id','ledger_title'),array('class'=>'span3', 'prompt' => 'Select Payment Ledger')); ?>  
		<?php echo $form->error($model,'ledger_payment',array(),false); ?>
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