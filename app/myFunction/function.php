<?php 
function stripUnicode($str)
{
	$str = str_replace(array(',', '<', '>', '&', '{', '}', '*', '?', '/', '%', '"'), array(' '), $str);
	$str = mb_convert_case($str, MB_CASE_LOWER, "UTF-8");
	if(!$str) return false;
	$unicode = array
	(
		'a'=>'á|à|ả|ã|ạ|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ',
		'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ằ|Ẳ|Ẵ|Ặ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
		'd'=>'đ',
		'D'=>'Đ',
		'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
		'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
		'i'=>'í|ì|ỉ|ĩ|ị',
		'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
		'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
		'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
		'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
		'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
		'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
		'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ'
		);

	foreach($unicode as $khongdau=>$codau)
	{
		$arr = explode("|",$codau);
		$str = str_replace($arr,$khongdau,$str);
		$str = trim(strip_tags($str));
		if (get_magic_quotes_gpc()== false) {
			$str = mysql_real_escape_string($str);
		}
		$str = preg_replace('/\s+/',' ',$str);
		$str = str_replace(" ","-",$str);
	}
	function changeTitle($str)
	{
		$str=trim($str);
		if($str=="") return "";
		$str=str_replace('"', '', $str);
		$str=str_replace("'", '', $str);
		$str=strUnicode($str);
		$str=mb_convert_case($str,MB_CASE_LOWER,'utf-8');
		$str=str_replace('', '-', $str);
	}
	return $str;
} 
// loai san pham lay id
function id_Loai($data,$select=0)
{
	//menu 1 cap
	foreach ($data as $key => $value) {
		$idLoai=$value["id"];
		$tenLoai=$value["TenLoai"];
		if($select!=0 && $idLoai==$select)
		{
			echo " <option value='$idLoai' selected='selected'>$tenLoai</option>";
		}else
		{
			echo " <option value='$idLoai'  >$tenLoai</option>";
		}
	}
}
// nha san xuat lay id
function id_NhaSanXuat($data,$select=0)
{
	//menu 1 cap
	foreach ($data as $key => $value) {
		$idNsx=$value["id"];
		$tenNsx=$value["TenNhaSanXuat"];
		if($select!=0 && $idNsx==$select)
		{
			echo " <option value='$idNsx' selected='selected'>$tenNsx</option>";
		}else
		{
			echo " <option value='$idNsx' >$tenNsx</option>";
		}
	}
}
//chon gia tri check box
function id_Role($data,$select=0)
{
	// foreach ($data as $key => $value) {
	// 	$idRole=$value["id"];
	// 	$tenRole=$value["TenVaiTro"];
	// 	if($select==0 && $idRole==$select)
	// 	{
	// 		echo " <option value='$idRole' selected='selected'>$tenRole</option>";
	// 	}else
	// 	{
	// 		echo " <option value='$idRole' selected='selected'>$tenRole</option>";
	// 	}
	// }
	foreach ($data as $key => $value) {
		$idRole=$value["id"];
		$tenRole=$value["TenVaiTro"];
		if($select!=0 && $idRole==$select)
		{
			echo " <option value='$idRole' selected='selected'>$tenRole</option>";
		}else
		{
			echo " <option value='$idRole' >$tenRole</option>";
		}
	}
}
?>