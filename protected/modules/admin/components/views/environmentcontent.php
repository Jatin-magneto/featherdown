<?php
$list = CHtml::listData(Language::model()->findAll(),'language_id','name');
//echo '<pre>';print_r($model);exit();
?>
<div role="tabpanel">
    <ul class="nav nav-tabs" role="tablist">
       <?php 
       $i = 0;
       foreach ($list as $key => $lang) { ?>
        <li class="<?php echo ($i==0)?'active':''; ?>" role="presentation"><a data-toggle="tab" role="tab" aria-controls="<?php echo $lang; ?>" href="#<?php echo str_replace(' ', '_', $lang); ?>" aria-expanded="true"><?php echo $lang; ?></a></li>
       <?php 
       $i++;
       } ?> 
    </ul>
    <div class="tab-content">
            <?php 
            $new_model = $model;
            $i=0;
            foreach ($list as $key => $lang) {
                
                //echo $lang;
                
                if(is_array($new_model)){
                 foreach($new_model as $m){
                    if($m->language_id == $key){
                        $model = $m;
                    }
                 }
                }
            ?>
            <div role="tabpanel" class="tab-pane <?php echo ($i==0)?'active':''; ?>" id="<?php echo str_replace(' ', '_', $lang); ?>">
            <div class="row">
            	<?php echo $form->labelEx($model,"[$key]env_title"); ?>
            	<?php echo $form->textField($model,"[$key]env_title",array('size'=>60,'maxlength'=>500,'rel'=>$key, 'class'=>'slug-unique')); ?>
            	<?php echo $form->error($model,"[$key]env_title"); ?>
            </div>
            
            <div class="row">
            	<?php echo $form->labelEx($model,"[$key]env_sub_title"); ?>
            	<?php echo $form->textField($model,"[$key]env_sub_title",array('size'=>60,'maxlength'=>500)); ?>
            	<?php echo $form->error($model,"[$key]env_sub_title"); ?>
            </div>
            
            <div class="row">
            	<?php echo $form->labelEx($model,"[$key]env_title_slug"); ?>
            	<?php echo $form->textField($model,"[$key]env_title_slug",array('size'=>60,'maxlength'=>500,'rel'=>$key, 'class'=>'slug-unique slug-value')); ?>
            	<?php echo $form->error($model,"[$key]env_title_slug"); ?>
		<div style="display:none" id="EnvironmentContent_<?php echo $key; ?>_env_title_slug_em_mis" class="errorMessage">This slug is already in use</div>
            </div>
            
            <div class="row">
            	<?php echo $form->labelEx($model,"[$key]env_desc"); ?>
            	<?php echo $form->textArea($model,"[$key]env_desc",array('rows'=>6, 'cols'=>50)); ?>
            	<?php echo $form->error($model,"[$key]env_desc"); ?>
            </div>
            </div>
            <?php 
            Yii::app()->clientScript->registerScript('slug'.$key,
            ' $("#EnvironmentContent_'.$key.'_env_title").bind("keyup", function(){
                var title1 = document.getElementById("EnvironmentContent_'.$key.'_env_title").value;
                var slug = slugify(title1);
                jQuery("#EnvironmentContent_'.$key.'_env_title_slug").val(slug);
            });
            
            $("#EnvironmentContent_'.$key.'_env_title_slug").bind("keyup", function(){
                var title2 = document.getElementById("EnvironmentContent_'.$key.'_env_title_slug").value;
                var slug = slugify(title2);
                jQuery("#EnvironmentContent_'.$key.'_env_title_slug").val(slug);
            }); ' );
            $i++;
            } ?>
    </div>
</div>
<br />
