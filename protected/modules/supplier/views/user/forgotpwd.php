<?php
/* @var $this SupplierController */
/* @var $model Supplier */
/* @var $form CActiveForm */
?>

<div class="login">
	<div class="logo">
        <img src="<?php echo Yii::app()->theme->baseUrl; ?>/images/featherdown-white.png" alt=""/>
    </div>
	<div class="content">

 <?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'supplier-reset-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
	'validateOnSubmit'=>true,
	),'htmlOptions'=>array(
                          'class'=>'login-form',
                        )
)); ?>

	<h3 class="form-title">Forgot Password</h3>	
	<div class="form-group">		
		<?php echo $form->passwordField($model,'password',array('maxlength'=>255,'class' => 'form-control placeholder-no-fix','placeholder'=>"Password")); ?>
		<?php echo $form->error($model,'password',array(),false); ?>
	</div>
	
	<div class="form-group">		
		<?php echo $form->passwordField($model,'repeat_password',array('maxlength'=>255,'class' => 'form-control placeholder-no-fix','placeholder'=>"Confirm Password Password (confirm)")); ?>
		<?php echo $form->error($model,'repeat_password',array(),false); ?>
	</div>
	
	<div class="form-actions">			
        <?php echo CHtml::submitButton('Submit',array('class'=>'btn btn-success pull-right')); ?>		
	</div>
	<div class="create-account">
		<p>
			Already a supplier? <a id="register-btn" href="javascript:void(0)">Login</a>
		</p>
	</div>
<?php $this->endWidget(); ?>

</div> 
    <div class="copyright"> <?php echo date('Y');?> &copy; featherdown.co.uk. All Copyrights Reserved. </div> 
<!-- /.Login --> 
</div>
