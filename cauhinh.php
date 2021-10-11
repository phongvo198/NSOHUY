<?php
$_link_download_game = "bạn sửa link download game ở đây";
$_domain = '192.168.1.88';
$_tientogioithieu = $_domain;
//mysql
$db_host="localhost";
$db_user="sa";
$db_pass="vanphog98";
$db_name="test";
//api
$w_api_momo='0c427ce3b4f4a6d74a4f73b534860a7b';
$w_api_momo_id='14491';
$w_cuphap_momo='NAP'; // cú pháp
$_qrmomo='http://nsov.me/img/qrmomo.png'; // link ảnh qr code
$_phonemomo='0382440207'; //sđt momo


$w_api_card24h='ciFmlvAxuRJksMhBWzDfZnOXTKyYegLIowCUVNPGaQqHrdtSjbpE';

$w_api_recaptcha = "6LeVs6ccAAAAACxh0Vvh3iLDDUjigLqvzXK1_ldg";
$w_api_recaptcha_private = "6LeVs6ccAAAAAJp8ksgE-pxp1-zSo7Z-P0WJdJAM";


///
//
function curl_get_contents($url)
{
  $curl = curl_init($url);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
  curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
  $data = curl_exec($curl);
  curl_close($curl);
  return $data;
}
//



