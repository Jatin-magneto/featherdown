        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php $environment_cond = (Yii::app()->session['environment_cond'] == '')?'true':Yii::app()->session['environment_cond']; ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'remarks'); ?>
		<?php echo $form->textArea($model,'remarks',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'remarks',array(),false); ?>
	</div>
        <?php if($model->isNewRecord!='1'){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'last_login'); ?>
		<?php echo $form->textField($model,'last_login'); ?>
		<?php echo $form->error($model,'last_login',array(),false); ?>
	</div>
        <?php } ?>
	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','env_title');
	              echo $form->checkBoxList($model,'environments',$list,array('separator'=>' ', 'class' => 'environment_validation', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'environments',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_env_id'); ?>
                <?php echo $form->dropDownList($model, 'default_env_id',CHtml::listData(Environment::model()->findAll(),'environment_id','env_title'),array('class'=>'span3', 'prompt' => 'Select a Locale')); ?>
		<?php echo $form->error($model,'default_env_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'default_env_only'); ?>
		<?php echo $form->radioButtonList($model, 'default_env_only', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'default_env_only',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'creditorid'); ?>
		<?php echo $form->textField($model,'creditorid',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'creditorid',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accountview_costid'); ?>
		<?php echo $form->textField($model,'accountview_costid',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'accountview_costid',array(),false); ?>
	</div>
        <?php if($model->isNewRecord!='1'){ ?>
	<div class="row">
		<?php echo $form->labelEx($model,'last_invoiceid'); ?>
		<?php echo $form->textField($model,'last_invoiceid',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_invoiceid',array(),false); ?>
	</div>
        <?php } ?>