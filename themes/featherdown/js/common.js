$(function($) {
    // It for to assign edit link ID
	$('.fa-pencil-square-o').parent().attr('id','editlink');
	$('#editlink').attr('href','Javascript:void(0);');
	
	$(document).on('click', '#editlink', function(){
		var chk_length = $('#myCGridView [name="cgridview-check-boxes[]"]:checked').length;
		if( chk_length > 1 || chk_length == 0){
			alert('Please select one record to edit.');
			return false;
		}else{
			var record_id	= $('#myCGridView [name="cgridview-check-boxes[]"]:checked').val();
			var url = uniqueURL+'/update/id/'+record_id;
            $.blockUI();
			window.location.href	= url;
		}
	})
    
    // It for to assign delete link ID
	$('.fa-trash').parent().attr('id','deletelink');
	$('#deletelink').attr('href','Javascript:void(0);');
	
	$(document).on('click', '#deletelink', function(){
		var chk_length = $('#myCGridView [name="cgridview-check-boxes[]"]:checked').length;
		if(chk_length == 0){
			alert('Please select at least one record to delete.');
			return false;
		}else{
            var r = confirm("Are you sure to delete record(s)? Related content will be delete.");
            if (r == true) {
                var ids = '';
                $('#myCGridView [name="cgridview-check-boxes[]"]:checked').each(function() {
                    ids += this.value+'-';
                    
                });
                
                var record_id	= $('#myCGridView [name="cgridview-check-boxes[]"]:checked').val();
                var url = uniqueURL+'/deleterec/id/'+ids;
                $.blockUI();
                window.location.href	= url;
            }
		}
	})
	
});