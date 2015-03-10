	<p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php $environment_cond = (Yii::app()->session['environment_cond'] == '')?'true':Yii::app()->session['environment_cond']; ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'password',array(),false); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'repeat_password'); ?>
		<?php echo $form->passwordField($model,'repeat_password',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'repeat_password',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'locale_id'); ?>
                <?php echo $form->dropDownList($model, 'locale_id',CHtml::listData(Locale::model()->findAll(array('condition'=>"$environment_cond")),'locale_id','locale'),array('class'=>'span3', 'prompt' => 'Select a Locale')); ?>
		<?php echo $form->error($model,'locale_id',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->radioButtonList($model, 'isactive', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'isactive',array(),false); ?>
	</div>