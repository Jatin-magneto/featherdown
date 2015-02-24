	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php $environment_cond = Yii::app()->session['environment_cond']; ?>
	

	<div class="row">
		<?php echo $form->labelEx($model,'product_category_id'); ?>
		<?php echo $form->dropDownList($model, 'product_category_id',CHtml::listData(ProductCategory::model()->findAll(array('condition'=>"$environment_cond")),'category_id','title'),array('class'=>'span3', 'prompt' => 'Select Product Category')); ?>
		<?php echo $form->error($model,'product_category_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'product_code'); ?>
		<?php echo $form->textField($model,'product_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'product_code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_max_persons'); ?>
		<?php echo $form->textField($model,'allow_max_persons'); ?>
		<?php echo $form->error($model,'allow_max_persons'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'allow_max_adults'); ?>
		<?php echo $form->textField($model,'allow_max_adults'); ?>
		<?php echo $form->error($model,'allow_max_adults'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_day'); ?>
		<?php echo $form->radioButtonList($model, 'per_day', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'per_day'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'per_day_stay'); ?>
		<?php echo $form->radioButtonList($model, 'per_day_stay', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'per_day_stay'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'travel_sum'); ?>
		<?php echo $form->radioButtonList($model, 'travel_sum', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'travel_sum'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->fileField($model, 'image', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>
	<?php if($model->isNewRecord!='1'){ ?>
	<div class="row">
		<?php echo CHtml::label('Selected Image','flase'); ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/'.$model->image,"image",array("width"=>150,"height"=>100));   // Image shown here if page is update page ?>
	</div>
	<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model,'environments'); ?>
		<?php $list = CHtml::listData(Environment::model()->findAll(),'environment_id','environment_url');
	              echo $form->checkBoxList($model,'environments',$list,array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'environments'); ?>
	</div>
    
   	<div class="row">
		<?php echo $form->labelEx($model,'isactive'); ?>
		<?php echo $form->radioButtonList($model, 'isactive', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'isactive'); ?>
	</div>
	
	<?php $this->widget('EnvironmentContentDetail',array('model2'=>$model2,'form'=>$form)); ?>