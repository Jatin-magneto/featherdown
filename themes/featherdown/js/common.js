$(function($) {
    // It is for to assign edit link ID
	$('.fa-pencil-square-o').parent().attr('id','editlink');
	$('#editlink').attr('href','Javascript:void(0);');
	
	$(document).on('click', '#editlink', function(){
		var chk_length = $('#myCGridView [name="cgridview-check-boxes[]"]:checked').length;
		if( chk_length > 1 || chk_length == 0){
			alert('Please select single record to edit.');
			return false;
		}else{
			var record_id	= $('#myCGridView [name="cgridview-check-boxes[]"]:checked').val();
			var url = uniqueURL+'/update/id/'+record_id;
            $.blockUI();
			window.location.href	= url;
		}
	})
    
    // It is for to assign delete link ID
	$('.fa-trash').parent().attr('id','deletelink');
	$('#deletelink').attr('href','Javascript:void(0);');
	
	$(document).on('click', '#deletelink', function(){
		var chk_length = $('#myCGridView [name="cgridview-check-boxes[]"]:checked').length;
		if(chk_length == 0){
			alert('Please select at least single record to delete.');
			return false;
		}else{
            var r = confirm("Are you sure to delete record(s)?");
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
    
    // It is for to assign reset password link
    $('.fa-key').parent().attr('id','resetpwdlink');
	$('#resetpwdlink').attr('href','Javascript:void(0);');
	
	$(document).on('click', '#resetpwdlink', function(){
		var chk_length = $('#myCGridView [name="cgridview-check-boxes[]"]:checked').length;
		if(chk_length == 0){
			alert('Please select at least single record to reset password.');
			return false;
		}else{
            var r = confirm("Are you sure to reset password?");
            if (r == true) {
                var ids = '';
                $('#myCGridView [name="cgridview-check-boxes[]"]:checked').each(function() {
                    ids += this.value+'-';
                    
                });
                
                var record_id	= $('#myCGridView [name="cgridview-check-boxes[]"]:checked').val();
                var url = uniqueURL+'/resetpwd/id/'+ids;
                $.blockUI();
                window.location.href	= url;
            }
		}
	})
    
});

function checkSlugUnique(id,lang_id,slug,primary_table_flag,primary_table_id){
        
    if ($.trim(slug) == '') {
        $('#btnsubmit').removeAttr('disabled','disabled');
        document.getElementById(id).style.display = 'none'
        return false;
    }
    
    $.ajax({
        url: '/featherdown/admin/EnvironmentContent/CheckSlug',
        data: { lang_id: lang_id, slug : slug, primary_table_flag:primary_table_flag, primary_table_id:primary_table_id } ,
        success: function(data) {                
           if (data == 'true') {
            $('#btnsubmit').removeAttr('disabled','disabled');
            document.getElementById(id).style.display = 'none'
           }else{
            $('#btnsubmit').attr('disabled','disabled');
            document.getElementById(id).style.display = 'block'
           }
        },
        type: 'POST'
    });
}
	