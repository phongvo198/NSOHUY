<?php
include_once 'cauhinh.php';
$id_api = $w_api_momo_id; // Lấy ID API tại nhà cung cấp dịch vụ
$api_key = $w_api_momo; // Lấy API KEY tại nhà cung cấp dịch vụ
// vui lòng không để lộ api và link callback để bảo mật web



// vui lòng tự bọc hàm để bảo mật tránh bị tấn công XSS, SQL
$noidung = $_POST['noidung'];
$tien = $_POST['tien'];
$idapi = $_POST['idapi'];
$key = $_POST['api_key'];
$tranid =  $_POST['tranid'];
$magioithieu = '';
$check1 = md5($id_api.$api_key);
$check2 = md5($idapi.$key);
$time = time();
if($key != ''){
	include 'ketnoi.php';
	if($check1 == $check2){
        // Thực hiện cộng tiền cho khách
		$x_alert = 1;
		mysqli_query($ketnoi,"UPDATE `player` SET `coin` = `coin` + '".$tien."' where `username`='".$noidung."'");
	} else {
		$x_alert = 2;
	}
	mysqli_query($ketnoi,"INSERT INTO `naptien`(`uid`, `sotien`, `loaithe`, `time`, `tinhtrang`, `tranid`) VALUES ('$noidung','$tien','Momo','$time','$x_alert','$tranid')");
	// ok bạn thử test lại xem nó lưu chưa nhé !
}

