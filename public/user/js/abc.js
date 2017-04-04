$(document).ready(function () {
$(".giohang").click(function() {
	var rowid =$(this).attr('id');
	var qty = $(this).parent().parent().find(".qty").val();
	var token = $("input[name='_token']").val();
	
		$.ajax({
		url:'cap-nhat-gio-hang/'+rowid+'/'+qty,
		type:'GET',
		cache:false,
		data:{ "_token":token,"id":rowid,"qty":qty },
		success:function(data){
			if(data=="oke")
			{
				window.location = "gio-hang";
				
			}
			
		}
	});
	});
});

// lay gia tri time hien tai
$(document).ready( function() {
    var now = new Date();

    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;

    $('#datePicker').val(today);
});