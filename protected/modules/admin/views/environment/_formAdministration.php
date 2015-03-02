<p class="note">Fields with <span class="required">*</span> are required.</p>

<?php //echo $form->errorSummary($model); ?>

<div class="row">
	<?php echo $form->labelEx($model,'env_title'); ?>
	<?php echo $form->textField($model,'env_title',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'env_title'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'env_slug'); ?>
	<?php echo $form->textField($model,'env_slug',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'env_slug'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'account_view_id'); ?>
	<?php echo $form->textField($model,'account_view_id',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'account_view_id'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'account_center_id'); ?>
	<?php echo $form->textField($model,'account_center_id',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'account_center_id'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'debtor_id'); ?>
	<?php echo $form->textField($model,'debtor_id',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'debtor_id'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'sales_journal_id'); ?>
	<?php echo $form->textField($model,'sales_journal_id',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'sales_journal_id'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'purchase_journal_id'); ?>
	<?php echo $form->textField($model,'purchase_journal_id',array('size'=>60,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'purchase_journal_id'); ?>
</div>