	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php $environment_cond = Yii::app()->session['environment_cond']; ?>

	<div class="row">
		<?php echo $form->labelEx($model,'location_type_id'); ?>
		<?php echo $form->dropDownList($model, 'location_type_id',CHtml::listData(LocationType::model()->findAll(array('condition'=>"$environment_cond")),'location_type_id','title'),array('class'=>'span3', 'prompt' => 'Select Location Type')); ?>
		<?php echo $form->error($model,'location_type_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_desc'); ?>
		<?php echo $form->textArea($model,'location_desc',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location_desc'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location_address'); ?>
		<?php echo $form->textArea($model,'location_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'location_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'zip_code'); ?>
		<?php echo $form->textField($model,'zip_code',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'zip_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'city_id'); ?>
		<?php echo $form->dropDownList($model, 'city_id',CHtml::listData(City::model()->findAll(array('condition'=>"$environment_cond")),'city_id','city_name'),array('class'=>'span3', 'prompt' => 'Select City')); ?>
		<?php echo $form->error($model,'city_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier_id'); ?>
		<?php echo $form->dropDownList($model, 'supplier_id',CHtml::listData(Supplier::model()->findAll(array('condition'=>"$environment_cond")),'supplier_id','username'),array('class'=>'span3', 'prompt' => 'Select Supplier')); ?>
		<?php echo $form->error($model,'supplier_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
	
	<?php if($model->isNewRecord!='1' && $model->image != ''){ ?>
	<div class="row">
		<?php echo CHtml::label('Selected Image','flase'); ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$model->image,"image",array("width"=>150,"height"=>100));   // Image shown here if page is update page ?>
	</div>
	<br />
	<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'supplier_form_url'); ?>
		<?php echo $form->textField($model,'supplier_form_url',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'supplier_form_url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sort_order'); ?>
		<?php echo $form->textField($model,'sort_order'); ?>
		<?php echo $form->error($model,'sort_order'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tax_included'); ?>
		<?php echo $form->radioButtonList($model, 'tax_included', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'tax_included'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'latitute'); ?>
		<?php echo $form->textField($model,'latitute',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'latitute'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'longitude'); ?>
		<?php echo $form->textField($model,'longitude',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'longitude'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
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