<?php
include 'ketnoi.php';
# Các đối số mà CARDVIP gửi lại cho khách hàng
# Đối số status là trạng thái của thẻ sau khi được xử lý. 
# Status == 200 -> thẻ đúng
# Status == 201 -> thẻ sai mệnh giá
# Status == 100 -> thẻ sai
# Quý khách lưu ý dựa vào status để trả lại kết quả cho khách
    $status = ($_GET['status']); 
# Đối số pricesvalue là mệnh giá thẻ cào lúc quý khách gửi thẻ
//$pricesvalue = $_GET['pricesvalue'];

# Đối số value_receive là mệnh giá thực của thẻ, quý khách chỉ quan tâm đối số này khi status nhận giá trị 200 hoặc 201
$value_receive = abs($_GET['thucnhan']);
$real_receive = abs($_GET['menhgiathuc']);

# Đối số card_code là mã thẻ cào quý khách gửi
//$card_code = $_GET['card_code'];

# Đối số card_seri là serial cào quý khách gửi
//$card_seri = $_GET['card_seri'];

# Đối số value_customer_receive là mệnh giá mà quý khách nhận được sau khi đã trừ chiết khấu, mệnh giá này là mệnh giá được cộng vào tài khoản CARDVIP
//$value_customer_receive = $_GET['value_customer_receive'];
# Đối số requestid là mã đơn thẻ cào mà quý khách đã gửi sang
$requestid = abs($_GET['content']);
# Quý khách check thẻ cào có tồn tại trong hệ thống hoặc thẻ cào đó đã xử lý chưa thông qua các điều kiện như card_code, card_seri, requestid, trạng thái xử lý của thẻ
# Sau đó sẽ check trạng thái của biến $status để cập nhật trạng thái của thẻ theo hướng dẫn trên.


      $truyvan = mysqli_query($ketnoi, "SELECT * FROM `naptien` where `tranid` = '$requestid' and `tinhtrang` = '0' "); 
      $truyvan1 = mysqli_fetch_array($truyvan);
 $aiduoctien = $truyvan1['uid'];
      $baonhieu = mysqli_num_rows($truyvan); 
  if($baonhieu == '1'){
        mysqli_query($ketnoi, "insert into tinhtrang(status) values('$status')");
   ######## thẻ đúng 
   if($status == 'hoantat'){
   
   // cộng xu
   
    $soxudc = $value_receive;
    mysqli_query($ketnoi, "UPDATE `player` SET `coin` = `coin` + '$soxudc' where `username` = '$aiduoctien' ") or ('Ko cong tien');
   

       // tình trạng = đúng
   mysqli_query($ketnoi, "UPDATE `naptien` set `tinhtrang` = '1'  where `tranid` = '$requestid' ");
       
   }else{   
        
      mysqli_query($ketnoi, "UPDATE `naptien` set `tinhtrang` = '2' where `tranid` = '$requestid' ");   
  //exit($aiduoctien);
  }   
}
