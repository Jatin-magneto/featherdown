<?php
    $environment_cond = Yii::app()->session['environment_cond']; 
    
    $list = CHtml::listData(Product::model()->findAll(array('condition'=>"$environment_cond")), 'product_id', 'title'); 
    
    $select = "<select id='product_id_00' name='product_id[00]'><option value=''>Select a Product</option>";
    foreach($list as $key=>$value){
        $select = $select."<option value='$key'>$value</option>";
    }
    $select = $select."</select>";
    
    if($model->isNewRecord!='1'){
        $id = $model->product_id;
	$linked = LinkedProduct::model()->findAll(array('condition'=>"main_product_id=$id"));
        if(count($linked)>0){
            $pro0 = $linked[0]->product_id;
            $qut0 = $linked[0]->linked_product_quantity;
        }
    }
    $qut0 = (isset($qut0))?$qut0:'';
    $pro0 = (isset($pro0))?$pro0:'';
    ?>
    <div class='row groupdp'>
	<label>Product</label>
        <?php echo CHtml::dropDownList('product_id[0]', $pro0, $list, array('empty' => 'Select a product')); ?>
        
        <label class='qutlabel'>Quantity</label>
        <?php echo CHtml::textField('linked_product_quantity[0]',$qut0); ?>
        
        <?php echo CHtml::link('+', '', array('onClick'=>'addInst()', 'class'=>'add btn btn-success btn-xs'));?>
    </div>
        
        	<div id="additional-inputs">
		<?php
		if($model->isNewRecord!='1' && count($linked)>0){
			$i = 0;
			$rows = count($linked);
			foreach($linked as $inst){ 
			if($i!=0){ ?>
			<div class='row groupdp'>
				<label>Product</label>
				<?php echo CHtml::dropDownList('product_id['.$i.']', $inst->product_id, $list, array('empty' => 'Select a product')); ?>
				<label class='qutlabel'>Quantity</label>
				<?php echo CHtml::textField('linked_product_quantity['.$i.']',$inst->linked_product_quantity); ?>
				<?php echo CHtml::link('-', '', array('onClick'=>"remInst($i)", 'class'=>'rem btn btn-danger btn-xs'));?>
			</div>
                        <?php	}
			$i++;
			} ?>
			<input type='hidden' id='rows' value=<?php echo $rows-1; ?> >
			<?php
		}else{ ?>
		<input type='hidden' id='rows' value=0 >
		<?php } ?>
	</div>
        
        
        <script>
        function addInst()
        {
                var id="linked_product_quantity_";
                var name="linked_product_quantity";
                var size=$("#rows").val();
                var size = parseInt(size,10)+1;
                $("#rows").val(size);
                
                var a = "<?php echo $select; ?>";
                var a = a.replace(/00/g,size);
                $("#additional-inputs").append("<div class = 'row groupdp'><label>Product</label>"+a+"<label class='qutlabel'>Quantity</label><input type=text id="+id+size+" name="+name+"["+size+"]><a class='rem btn btn-danger btn-xs' onclick='remInst("+size+")'>-</a></div>");
        }
        function remInst(id)
        {
                $('#linked_product_quantity_'+id).parent('div').remove();
                //$('#BookingPaymentRulesInst_day'+id).parent('div').remove();	
        }
        </script>