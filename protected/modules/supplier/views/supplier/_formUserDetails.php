        <p class="note">Fields with <span class="required">*</span> are required.</p>
        <?php $environment_cond = (Yii::app()->session['environment_cond'] == '')?'true':Yii::app()->session['environment_cond']; ?>
        
        <div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
                <?php echo $form->radioButtonList($model, 'gender', array('1'=>'Male','0'=>'Female','2'=>'Unspecified'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
		<?php echo $form->error($model,'gender',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pre_name'); ?>
		<?php echo $form->textField($model,'pre_name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'pre_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'initials'); ?>
		<?php echo $form->textField($model,'initials',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'initials',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'first_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'middle_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'last_name',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_title'); ?>
		<?php echo $form->textField($model,'addr_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'addr_title',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_street'); ?>
		<?php echo $form->textField($model,'addr_street',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'addr_street',array(),false); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'addr_street_no'); ?>
		<?php echo $form->textField($model,'addr_street_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_street_no',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'addr_street_2'); ?>
		<?php echo $form->textField($model,'addr_street_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'addr_street_2',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_street_no_sufx'); ?>
		<?php echo $form->textField($model,'addr_street_no_sufx',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_street_no_sufx',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'addr_postal_code'); ?>
		<?php echo $form->textField($model,'addr_postal_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'addr_postal_code',array(),false); ?>
	</div>
	
	
	<div class="row">
		<?php echo $form->labelEx($model,'addr_country_id'); ?>
		<?php echo $form->dropDownList($model, 'addr_country_id', CHtml::listData( Country::model()->findAll(array('condition'=>"$environment_cond")), 'country_id', 'country_name'),
                    array(
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('/admin/Country/Dynamicsupplierregion'),
                        'update'=>'#Supplier_addr_state_id', //selector to update
                    ),
                    'class'=>'span3', 'prompt' => 'Select Country')); ?>
		<?php echo $form->error($model,'addr_country_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'addr_state_id'); ?>
		<?php
			if($model->addr_country_id != ''){
			    $country = " country_id = '".$model->addr_country_id."' and ";
			}else{	    
			    $country = "false and ";
			}
		?>
		<?php echo $form->dropDownList($model, 'addr_state_id', CHtml::listData( Province::model()->findAll(array('condition'=>"$country $environment_cond")), 'province_id', 'province_name'),
				array(
				'ajax' => array(
					'type'=>'POST',
					'url'=>CController::createUrl('/admin/Province/Dynamicsuppliercity'),
					'update'=>'#Supplier_addr_city_id', //selector to update
				),
				'class'=>'span3', 'prompt' => 'Select Province')); ?>		
		<?php echo $form->error($model,'addr_state_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'addr_city_id'); ?>
		<?php
			if($model->addr_state_id != ''){
			    $state = " state_id = '".$model->addr_state_id."' and ";
			}else{	    
			    $state = "false and ";
			}			
		?>
		<?php echo $form->dropDownList($model, 'addr_city_id', CHtml::listData( City::model()->findAll(array('condition'=>"$state $environment_cond")), 'city_id', 'city_name'),array('class'=>'span3', 'prompt' => 'Select City')); ?>		
		<?php echo $form->error($model,'addr_city_id',array(),false); ?>
	</div>
	

        <div class="row">
            <?php echo CHtml::label('Invoice Address','flase'); ?>
            <span>
                <?php echo CHtml::checkBoxList('i_a','false',array('invaddr'=>'Select if same as above')); ?>
            </span>
        </div>
	<div class="row">
		<?php echo $form->labelEx($model,'inv_title'); ?>
		<?php echo $form->textField($model,'inv_title',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'inv_title',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_street'); ?>
		<?php echo $form->textField($model,'inv_street',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'inv_street',array(),false); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'inv_street_no'); ?>
		<?php echo $form->textField($model,'inv_street_no',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'inv_street_no',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'inv_street_2'); ?>
		<?php echo $form->textField($model,'inv_street_2',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'inv_street_2',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_street_no_sufx'); ?>
		<?php echo $form->textField($model,'inv_street_no_sufx',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'inv_street_no_sufx',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_postal_code'); ?>
		<?php echo $form->textField($model,'inv_postal_code',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'inv_postal_code',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inv_country_id'); ?>
		<?php echo $form->dropDownList($model, 'inv_country_id', CHtml::listData( Country::model()->findAll(array('condition'=>"$environment_cond")), 'country_id', 'country_name'),
                    array(
                    'ajax' => array(
                        'type'=>'POST',
                        'url'=>CController::createUrl('/admin/Country/Dynamicsupplierregion'),
                        'update'=>'#Supplier_inv_state_id', //selector to update
                    ),
                    'class'=>'span3', 'prompt' => 'Select Country')); ?>
		<?php echo $form->error($model,'inv_country_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'inv_state_id'); ?>
		<?php
			if($model->inv_country_id != ''){
			    $country = " country_id = '".$model->inv_country_id."' and ";
			}else{	    
			    $country = "false and ";
			}
		?>
		<?php echo $form->dropDownList($model, 'inv_state_id', CHtml::listData( Province::model()->findAll(array('condition'=>"$country $environment_cond")), 'province_id', 'province_name'),
				array(
				'ajax' => array(
					'type'=>'POST',
					'url'=>CController::createUrl('/admin/Province/Dynamicsuppliercity'),
					'update'=>'#Supplier_inv_city_id', //selector to update
				),
				'class'=>'span3', 'prompt' => 'Select Province')); ?>		
		<?php echo $form->error($model,'inv_state_id',array(),false); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'inv_city_id'); ?>
		<?php
			if($model->inv_state_id != ''){
			    $state = " state_id = '".$model->inv_state_id."' and ";
			}else{	    
			    $state = "false and ";
			}
		?>
		<?php echo $form->dropDownList($model, 'inv_city_id', CHtml::listData( City::model()->findAll(array('condition'=>"$state $environment_cond")), 'city_id', 'city_name'),array('class'=>'span3', 'prompt' => 'Select City')); ?>		
		<?php echo $form->error($model,'inv_city_id',array(),false); ?>
	</div>

	

	<div class="row">
		<?php echo $form->labelEx($model,'bsn'); ?>
		<?php echo $form->textField($model,'bsn',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'bsn',array(),false); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dob'); ?>
		<?php //echo $form->textField($model,'dob'); ?>
                <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                $this->widget('CJuiDateTimePicker',array(
                    'model'=>$model, //Model object
                    'attribute'=>'dob', //attribute name
                    'mode'=>'date', //use "time","date" or "datetime" (default)
                    'language'=>'',
                    'options'=>array(
                        'regional'=>'',
                        "dateFormat"=>'mm-dd-yy',
			'maxDate'=>'0',
                    ) // jquery plugin options
                ));
		?>
		<?php echo $form->error($model,'dob',array(),false); ?>
	</div>