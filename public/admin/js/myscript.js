$("div.alert").delay(3000).slideUp();
//alert xoa
function xacNhanXoa(msg)
{
	if(window.confirm(msg))
	{
		return true;
	}
	return false;
}
// lay gia tri time hien tai
$(document).ready( function() {
    var now = new Date();
 
    var day = ("0" + now.getDate()).slice(-2);
    var month = ("0" + (now.getMonth() + 1)).slice(-2);

    var today = now.getFullYear()+"-"+(month)+"-"+(day) ;


   $('#datePicker').val(today);
});