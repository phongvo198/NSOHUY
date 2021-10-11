<?php
include_once 'cauhinh.php';
include 'ketnoi.php';
$requestId = time();
$requestId = $requestId.mt_rand(1,99);
$requestId = $requestId - 1234300000;

$verifyResponse = curl_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$w_api_recaptcha_private.'&response=' . $_POST['g-recaptcha-response']);
$responseData = json_decode($verifyResponse);
if ($responseData->success)
{  
  


$w_api_card24h = "CbNAXadjgtlSmcufvpEGeVIUxJHKqohkyTBwMOinZWDYFsrQLPRz"; //test
//$api = "NgBcRjeYIJuxtiMvKnEfDHhVdCUpOLmosFGrSalTyXWbwqZzkAPQ";
  $serial = $_POST['serial'];
  $code = $_POST['code'];   
  $telco=$_POST['telco'];  
  $amount = $_POST['amount'];  
  $namenap = $_POST['namenap'];
// test
//$serial = '12344444445';
//$code = '1234444444522';
//$telco = 'VIETTEL';
//$amount = '100000';


  $curl = curl_init();
//exit;
  curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,


    CURLOPT_URL => 'https://card24h.com/api/card-auto.php?type='.$telco.'&menhgia='.$amount.'&seri='.$serial.'&pin='.$code.'&APIKey='.$w_api_card24h.'&callback=http://nsohuy.com/callback.php&content='.$requestId,
    CURLOPT_USERAGENT => 'XuanThuLab Exmaple POST',

    CURLOPT_SSL_VERIFYPEER => false, //Bá» kiá»ƒm SSL

  ));
  $resp = curl_exec($curl);

//var_dump($resp);
//echo $resp;
  curl_close($curl);

  $ketqua = json_decode($resp, true);
  $tinnhan = $ketqua['data']['msg'];
  $stt =  $ketqua['data']['status'];

  if($stt == 'success'){
    // code lưu thẻ
    mysqli_query($ketnoi, "INSERT INTO naptien SET 
      `uid` = '".$namenap."',
      `sotien` = '".$amount."',
      `seri` = '".$serial."',
      `code` = '".$code."',
      `loaithe` = '".$telco."',
      `tinhtrang` = '0',
      `noidung` = 'dang nap the',
      `tranid` = '$requestId',
      `time` = '".time()."'") or  exit(json_encode(array('status' => '1', 'msg' => 'Lỗi nạp thẻ!', 'type' => 'error'))); 

    exit(json_encode(array('status' => '2', 'msg' => 'Gửi yêu cầu nạp thẻ thành công! Vui lòng chờ trong 30 giây đến vài phút, HÃY TẢI LẠI TRANG NÀY ĐỂ BIẾT KẾT QUẢ NẠP THẺ!', 'type' => 'error')));   
  }else{

   exit(json_encode(array('status' => '1', 'msg' => $tinnhan , 'type' => 'error')));      
 }

} else {
  exit(json_encode(array('status' => '1', 'msg' => "Là 1 ninja thì mắt phải tinh, tay phải nhạy. Tiểu huynh đệ hãy đặt tay xác minh mình không phải robot đi." , 'type' => 'error')));   
}