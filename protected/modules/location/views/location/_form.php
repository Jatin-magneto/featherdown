<?php
/* @var $this LocationController */
/* @var $model Location */
/* @var $form CActiveForm */
?>

<?php
	$tabs = array();

	$tabs['Location'] = array(
	'id'=>'locationDetailTab',
	'content'=>$this->renderPartial('_formLocation', array(
	//'form' => $form,
	'model'=>$model,
	'model2'=>$model2,
	),
	true),
	);
	
	$data = array();
	if(isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = LocationProduct::model()->findAll(array('condition'=>"location_id = $id",'group'=>'product_id','select'=>'product_id'));
	}
	
	$tabs['Location Products'] = array(
	'id'=>'locationProductsTab',
	'content'=>$this->renderPartial('_formLocationProducts', array(
	//'form' => $form,
	'model'=>$model,
	'model_lp'=>$model_lp,
	'model_ls'=>$model_ls,
	'data'=>$data,
	),
	true),
	);
	
	if($model->isNewRecord!='1'){
		$disable_arr = array();
	}else{
		$disable_arr = array(1);
	}
	
	
	$this->widget('zii.widgets.jui.CJuiTabs', array(
	'tabs' => $tabs,
	'options' => array(
    'collapsible' => false,
    'disabled' => $disable_arr,
	),
	));
?>
<script>
$("#locationProducts .panel-heading").click(function() {
    var panel_id = $(this).attr('data');
	$("#id"+panel_id).toggleClass("active");
});


$('#check-boxes_all').click(function(event) {  //on click
	if(this.checked) { // check select status
		$('.check-boxes').each(function() { //loop through each checkbox
			this.checked = true;  //select all checkboxes with class "checkbox1"              
		});
	}else{
		$('.check-boxes').each(function() { //loop through each checkbox
			this.checked = false; //deselect all checkboxes with class "checkbox1"                      
		});        
	}
});
   
$('#export-location').click(function(){
	var chk_length = $('.table-responsive [name="check-boxes[]"]:checked').length;
		if( chk_length == 0){
			r = confirm("Are you sure to export all records?");
			all = true;
		}else{
			r = true;
			all = false;
		}
		
		if (r == true) {
			var location_id = <?php echo (isset($_GET['id']))?$_GET['id']:'0'; ?>;
			if (all != true) {
				var ids = '';
				$('.table-responsive [name="check-boxes[]"]:checked').each(function() {
					ids += this.value+'-';
				});
				var url = uniqueURL+'/exportProduct/id/'+ids+'/l_id/'+location_id;
				window.location.href	= url;
			}else{
				var url = uniqueURL+'/exportProduct/l_id/'+location_id;
				window.location.href	= url;
			}
		}else{
			return false;
		}
		
});

$('#add-location').click(function(){
	$('#location-product-form').trigger("reset");
});

$('#delete-location').click(function(){
	var chk_length = $('.table-responsive [name="check-boxes[]"]:checked').length;
		if( chk_length == 0){
			alert('Please select at least single record to delete.');
			return false;
		}else{
		var r = confirm("Are you sure to delete record(s)?");
		if (r == true) {
			var ids = '';
			$('.table-responsive [name="check-boxes[]"]:checked').each(function() {
				ids += this.value+'-';
			});
			var location_id = <?php echo (isset($_GET['id']))?$_GET['id']:'0'; ?>;
			var url = uniqueURL+'/deleteProduct/id/'+ids+'/l_id/'+location_id;
			$.blockUI();
			window.location.href	= url;
		}
	}
});

$('#edit-location').click(function(){
		
		$('#location-product-form').trigger("reset");
		var chk_length = $('.table-responsive [name="check-boxes[]"]:checked').length;
		if( chk_length > 1 || chk_length == 0){
			alert('Please select single record to edit.');
			return false;
		}else{
			$('#edit-location').attr('data-toggle',"modal");
			$('#edit-location').attr('data-target',"#myModal");			
			
			
			var record_id	= $('.table-responsive [name="check-boxes[]"]:checked').val();
			var location_id = <?php echo (isset($_GET['id']))?$_GET['id']:'0'; ?>;
			$.ajax({
				type:"POST",
				dataType: "JSON",
				data:"location_product_id="+record_id+"&location_id="+location_id,    
				url: "<?php echo $this->createUrl('/location/location/updateLocation') ?>",
				success: function(data){
				    
					var price = data.productPrice;
					var data = data.productData;
					
					$("#LocationProduct_product_id").val(data.product_id);
					
					if (data.stock_from != '0000-00-00') {
						var dateAr = data.stock_from.split('-');
						var dateArFr = dateAr[1] + '-' + dateAr[2] + '-' + dateAr[0];	
					}else{
						var dateArFr = '';
					}
					
					$("#stock_from").val(dateArFr);
					
					if (data.stock_till != '0000-00-00') {
						var dateAr = data.stock_till.split('-');
						var dateArFr = dateAr[1] + '-' + dateAr[2] + '-' + dateAr[0];
					}else{
						var dateArFr = '';
					}
					$("#stock_till").val(dateArFr);
					
					$("#LocationProduct_total_qty").val(data.total_qty);
					$("#LocationProduct_available_type").val(data.available_type);
					$("#LocationProduct_available_special_type_id").val(data.available_special_type_id);
					
					$("#LocationProduct_available_nights").val(data.available_nights);
					if (data.is_manadatory == 1) {
						$("#LocationProduct_is_manadatory_0").prop("checked", true)
					}else{
						$("#LocationProduct_is_manadatory_1").prop("checked", true)
					}
					
					$('#LocationProduct_available_days input[type=checkbox]').each(function() {
						var main_id = this.id;
						$.each(data.available_days.split(','), function(key, val) {								
							if(val == $('#'+main_id).val()) {
								$('#'+main_id).prop('checked', true);									
							}
						})
					});
					
					$("#LocationProduct_sale_price_unit_id").val(data.sale_price_unit_id);
					$("#LocationProduct_sale_max_qty").val(data.sale_max_qty);
					$("#LocationProduct_sale_max_unit_id").val(data.sale_max_unit_id);
					$("#LocationProduct_sale_percentage").val(data.sale_percentage);
					
					$('#LocationProduct_sale_type_id input[type=checkbox]').each(function() {
						var main_id = this.id;
						$.each(data.sale_type_id.split(','), function(key, val) {								
							if(val == $('#'+main_id).val()) {
								$('#'+main_id).prop('checked', true);									
							}
						})
					});
					
					if (data.primary_status == 1) {
						$("#LocationProduct_primary_status_0").prop("checked", true)
					}else{
						$("#LocationProduct_primary_status_1").prop("checked", true)
					}
					
					if (data.secondary_status == 1) {
						$("#LocationProduct_secondary_status_0").prop("checked", true)
					}else{
						$("#LocationProduct_secondary_status_1").prop("checked", true)
					}
					
					$("#LocationProduct_purchase_price").val(data.purchase_price);
					$("#LocationProduct_purchase_price_unit_id").val(data.purchase_price_unit_id);
					$("#LocationProduct_purchase_percentage").val(data.purchase_percentage);
					
					$.each(price, function(key, va) {
						$('#LocationSalePrice_'+va.locale_id+'_location_sale_price').val(va.location_sale_price);
				    });
					
					$('#location-product-form').append($('<input></input>').attr('name','LocationProduct[location_product_id]').attr('type','hidden').attr('value',data.location_product_id));
				},
				error: function(MLHttpRequest, textStatus, errorThrown){  // not found then give errors
					alert(errorThrown);  
				}
		   });
		}
})
</script>