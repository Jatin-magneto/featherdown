    <div class="row">
        <?php echo $form->labelEx($model_lp,'purchase_price'); ?>
        <?php echo $form->textField($model_lp,'purchase_price'); ?>
        <?php echo $form->error($model_lp,'purchase_price'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'purchase_price_unit_id'); ?>
        <?php echo $form->dropDownList($model_lp, 'purchase_price_unit_id',CHtml::listData(LocationUnit::model()->findAll(),'location_unit_id','location_unit'),array('class'=>'span3', 'prompt' => 'Select Purchase Price Unit')); ?>
        <?php echo $form->error($model_lp,'purchase_price_unit_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'purchase_percentage'); ?>
        <?php echo $form->textField($model_lp,'purchase_percentage'); ?>
        <?php echo $form->error($model_lp,'purchase_percentage'); ?>
    </div>