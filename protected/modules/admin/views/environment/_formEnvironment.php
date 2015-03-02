<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>

<div class="row">
	<?php echo $form->labelEx($model,'environment_name'); ?>
	<?php echo $form->textField($model,'environment_name',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'environment_name'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'environment_url'); ?>
	<?php echo $form->textField($model,'environment_url',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'environment_url'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'environment_desc'); ?>
	<?php echo $form->textArea($model,'environment_desc',array('rows'=>6, 'cols'=>50)); ?>
	<?php echo $form->error($model,'environment_desc'); ?>
</div>