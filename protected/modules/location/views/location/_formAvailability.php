    <?php $environment_cond = Yii::app()->session['environment_cond']; ?>
    
    <div class="row">
        <?php echo $form->labelEx($model_lp,'product_id'); ?>
        <?php echo $form->dropDownList($model_lp, 'product_id',CHtml::listData(Product::model()->findAll(array('condition'=>"$environment_cond")),'product_id','title'),array('class'=>'span3', 'prompt' => 'Select Product')); ?>
        <?php echo $form->error($model_lp,'product_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'stock_from'); ?>
        <?php //echo $form->textField($model_lp,'stock_from'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'stock_from',
            'model'=>$model_lp,
            'attribute'=>'stock_from',
            //'flat'=>true,//remove to hide the datepicker
            'options'=>array(
                'dateFormat' => 'mm-dd-yy',
                //'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                //'changeMonth'=>true,
                //'changeYear'=>true,
                //'yearRange'=>'2000:2099',
                //'minDate' => '01-01-2000',      // minimum date
                //'maxDate' => '12-31-2099',      // maximum date
            ),
            'htmlOptions'=>array(
                'style'=>'',
                'autocomplete'=>"off",
            ),
        ));
        ?>
        <?php echo $form->error($model_lp,'stock_from'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'stock_till'); ?>
        <?php //echo $form->textField($model_lp,'stock_till'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker',array(
            'name'=>'stock_till',
            'model'=>$model_lp,
            'attribute'=>'stock_till',
            //'flat'=>true,//remove to hide the datepicker
            'options'=>array(
                'dateFormat' => 'mm-dd-yy',
                //'showAnim'=>'slide',//'slide','fold','slideDown','fadeIn','blind','bounce','clip','drop'
                //'changeMonth'=>true,
                //'changeYear'=>true,
                //'yearRange'=>'2000:2099',
                //'minDate' => '01-01-2000',      // minimum date
                //'maxDate' => '12-31-2099',      // maximum date
            ),
            'htmlOptions'=>array(
                'style'=>'',
                'autocomplete'=>"off",
            ),
        ));
        ?>
        <?php echo $form->error($model_lp,'stock_till'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'total_qty'); ?>
        <?php echo $form->textField($model_lp,'total_qty'); ?>
        <?php echo $form->error($model_lp,'total_qty'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'available_type'); ?>
        <?php //echo $form->textField($model_lp,'available_type'); ?>
        <?php echo $form->dropDownList($model_lp, 'available_type',CHtml::listData(LocationStayType::model()->findAll(),'location_stay_type_id','location_stay_type'),array('class'=>'span3', 'prompt' => 'Select Stay Type')); ?>
        <?php echo $form->error($model_lp,'available_type'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'available_special_type_id'); ?>
        <?php //echo $form->textField($model_lp,'available_special_type_id'); ?>
        <?php echo $form->dropDownList($model_lp, 'available_special_type_id',CHtml::listData(LocationSpecialType::model()->findAll(),'location_special_type_id','location_special_type'),array('class'=>'span3', 'prompt' => 'Select Special Stay Type')); ?>
        <?php echo $form->error($model_lp,'available_special_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'available_days'); ?>
        <?php echo $form->checkBoxList($model_lp,'available_days',week(),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
        <?php echo $form->error($model_lp,'available_days'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'available_nights'); ?>
        <?php echo $form->textField($model_lp,'available_nights'); ?>
        <?php echo $form->error($model_lp,'available_nights'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'is_manadatory'); ?>
        <?php echo $form->radioButtonList($model_lp, 'is_manadatory', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
        <?php echo $form->error($model_lp,'is_manadatory'); ?>
    </div>