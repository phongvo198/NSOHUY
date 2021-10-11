<?php
$requestId = time();
$requestId = $requestId.mt_rand(1,99);
$requestId = $requestId - 1234300000;

$apikey = '98ce0f21-000f-4387-859b-6f2fc0b40c36'; // API Key lấy từ web
$telCo = $_POST['telco']; // Mã nhà mạng VIETTEL, VINAPHONE, MOBIFONE, VIETNAMOBILE, ZING, GARENA, GATE, VCOIN. Vui lòng nhập đúng mã nhà mạng.
$amount = $_POST['amount']; // Mệnh giá thẻ nhận từ 10000 đến 10000000 tùy từng nhà mạng hoặc thẻ game.
$pin = $_POST['code']; // Mã thẻ cào, vui lòng nhập đúng mã thẻ cào
$serial = $_POST['serial']; // Mã serial của thẻ cào.
$isFast = 'true'; // Trong trường hợp gửi thẻ chậm vui lòng đổi lại thành 'false'
$requestId = $requestId; // Mã đơn hàng mà bên đối tác gửi sang.
$urlCallback = 'callback.php'; // Liên kết callback lại báo kết quả cho khách

$dataPost = array(
    'APIKey' => $apikey,
    'NetworkCode' => $telCo,
    'PricesExchange' => $amount,
    'NumberCard' => $pin,
    'SeriCard' => $serial,
    'IsFast' => $isFast,
    'RequestId' => $requestId,
    'UrlCallback' => $urlCallback
);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://partner.cardvip.vn/api/createExchange',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => json_encode($dataPost),
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
$jsonData = json_decode($response, true);
echo $jsonData;
if($jsonData['status'] == 200){
    // Trả lại kết quả đẩy thẻ sang thành công vui lòng đợi 15s - 20s
    // Lưu ý trong bước này qúy khách vui lòng lưu lại lịch sử nạp thẻ vào database với trạng thái đang xử lý chờ kết quả
}
else if($jsonData['status'] == 400){
    // Trả lại kết quả thẻ đã tồn tại trong hệ thống hoặc seri đã bị nhập quá 5 lần

}
else if($jsonData['status'] == 401){
    // Trả lại kết quả độ dài serial hoặc mã thẻ không đúng
}
else{
    // Trả lại kết quả phát sinh lỗi trong quá trình đẩy API
}