$(document).ready(function () {
$(".giohang").click(function() {
	var rowid =$(this).attr('rowId');
	var qty = $(this).parent().parent().find(".qty").val();
	var token = $("input[name='_token']").val();
	
	$.ajax({
		url:'cap-nhat-gio-hang/'+rowid+'/'+qty,
		type:'GET',
		cache:false,
		data:{ "_token":token,"id":rowid,"qty":qty },
		success:function(data){
			if(data=="ok")
			{
				window.location ="giohang"
			}
			
		}
	});

});
});