<?php
$_title = "Kích hoạt tài khoản";
include_once 'head.php';
$alert = null;
if($_login == null) {header("location:/");}
if($_status == '0') {
	$alert = _alert('succ',"Bạn đã kích hoạt rồi !");
}
elseif($_status == '1' && $_coin < 10000)
{
	$alert = _alert('err',"Số dư của bạn không đủ, vui lòng nạp thêm coin để kích hoạt tài khoản!");
}
elseif($_status == 'block' && $_coin < 10000)
{
	$alert = _alert('err',"Số dư cần lớn hơn 10000 coin để mở lại tài khoản !");
}
elseif($_status == '1' && $_coin >= 10000) {
	$coin = $_coin - 10000;
	$query = _query(_update('player',"status='0',coin='$coin'","username='$_username'"));
	if($query)
	{
		$alert = _alert('succ',"Kích hoạt tài khoản thành công. Vô game chiến thôi nào <3.");
	}
	else
	{
		$alert = _alert('err',"Có lỗi gì đó xảy ra, vui lòng liên hệ admin !");
	}
}
elseif($_status == 'block' && $_coin >= 10000) {
	$coin = $_coin - 10000;
	$query = _query(_update('player',"status='0',coin='$coin'","username='$_username'"));
	if($query)
	{
		$alert = _alert('succ',"Mở khóa tài khoản thành công !");
	}
	else
	{
		$alert = _alert('err',"Có lỗi gì đó xảy ra, vui lòng liên hệ admin !");
	}
}
include_once 'user.php';
?>
