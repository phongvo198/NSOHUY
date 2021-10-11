<?php
session_start();
include_once 'cauhinh.php';

date_default_timezone_set('Asia/Ho_Chi_Minh');
$_login = isset($_login) ? $_login : null;
include_once 'config.php';
$_user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
if($_user != null)
{
	$_login = "on";
	$user_arr = _fetch("SELECT * FROM player Where username='$_user'");
	if(count($user_arr) <= 0){header("location:/?out");}
	$_nickname = htmlspecialchars($user_arr['nickname']);
	$_username = htmlspecialchars($user_arr['username']);
	$_password = htmlspecialchars($user_arr['password']);
	$_phone = htmlspecialchars($user_arr['phone']);
	$_email = htmlspecialchars($user_arr['email']);
	$_coin = $user_arr['coin'];
	$_status = htmlspecialchars($user_arr['status']);
	switch ($_status) {
		case 'active':
			$_status_name = '<span style="color:green;font-weight: bold;">Đã kích hoạt';
			break;
		case 'wait':
			$_status_name = '<span style="color:blue;font-weight: bold;">Chưa kích hoạt';
			break;
		case 'block':
			$_status_name = '<span style="color:red;font-weight: bold;">Đang bị khóa';
			break;
	}
}
else
{
	$_login = null;
}
if (isset($_GET['out']))
{
	session_destroy();
	header("location:/");
}
?>