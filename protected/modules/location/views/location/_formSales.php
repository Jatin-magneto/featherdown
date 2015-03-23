    <?php $locale = CHtml::listData(Locale::model()->findAll(),'locale_id','locale'); ?>
    
    <div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
    <?php 
        $i = 0;
        foreach ($locale as $key => $lang) { ?>
        <li class="<?php echo ($i==0)?'active':''; ?>" role="presentation"><a data-toggle="tab" role="tab" aria-controls="<?php echo $lang; ?>" href="#<?php echo str_replace(' ', '_', $lang); ?>" aria-expanded="true"><?php echo $lang; ?></a></li>
    <?php $i++; } ?>
    </ul>
    <div class="tab-content">
        <?php 
            $i=0;
            foreach ($locale as $key => $lang) { ?>
            <div role="tabpanel" class="tab-pane <?php echo ($i==0)?'active':''; ?>" id="<?php echo str_replace(' ', '_', $lang); ?>">
                <div class="row">
                    <?php echo $form->labelEx($model_ls,"[$key]location_sale_price"); ?>
                    <?php echo $form->textField($model_ls,"[$key]location_sale_price"); ?>
                    <?php echo $form->error($model_ls,"[$key]location_sale_price"); ?>
                </div>
            </div>
        <?php $i++; } ?>
    </div>
    </div>
    <br />
    <div class="row">
        <?php echo $form->labelEx($model_lp,'sale_price_unit_id'); ?>
        <?php echo $form->dropDownList($model_lp, 'sale_price_unit_id',CHtml::listData(LocationUnit::model()->findAll(),'location_unit_id','location_unit'),array('class'=>'span3', 'prompt' => 'Select Price Unit')); ?>
        <?php echo $form->error($model_lp,'sale_price_unit_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'sale_max_qty'); ?>
        <?php echo $form->textField($model_lp,'sale_max_qty'); ?>
        <?php echo $form->error($model_lp,'sale_max_qty'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'sale_max_unit_id'); ?>
        <?php echo $form->dropDownList($model_lp, 'sale_max_unit_id',CHtml::listData(LocationUnit::model()->findAll(),'location_unit_id','location_unit'),array('class'=>'span3', 'prompt' => 'Select Maximum Quantity Unit')); ?>
        <?php echo $form->error($model_lp,'sale_max_unit_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'sale_percentage'); ?>
        <?php echo $form->textField($model_lp,'sale_percentage'); ?>
        <?php echo $form->error($model_lp,'sale_percentage'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'sale_type_id'); ?>
        <?php echo $form->checkBoxList($model_lp,'sale_type_id',CHtml::listData(LocationSaleType::model()->findAll(),'location_sale_type_id','location_sale_type'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
        <?php echo $form->error($model_lp,'sale_type_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'primary_status'); ?>
        <?php echo $form->radioButtonList($model_lp, 'primary_status', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
        <?php echo $form->error($model_lp,'primary_status'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model_lp,'secondary_status'); ?>
        <?php echo $form->radioButtonList($model_lp, 'secondary_status', array('1'=>'Yes','0'=>'No'),array('separator'=>' ', 'labelOptions'=>array('style'=>'display:inline;margin-right: 10px;'))); ?>
        <?php echo $form->error($model_lp,'secondary_status'); ?>
    </div>