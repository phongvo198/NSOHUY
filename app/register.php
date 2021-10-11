<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN"><html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Chào Mừng bạn đến diễn đàn ngọc Rồng.</title>
        <link rel="stylesheet" href="http://forum.ngocrongonline.com/app/view/css/StyleSheet.css" type="text/css" />	
<link rel="stylesheet" href="http://forum.ngocrongonline.com/app/view/css/template.css" type="text/css" />		
        <link rel="shortcut icon" href='http://forum.ngocrongonline.com/app/view/images/favicon.png' type="image/x-icon" />
		<script type="text/javascript">
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-22738816-4']);
		  _gaq.push(['_setDomainName', '.teamobi.com']);
		  _gaq.push(['_trackPageview']);

		  (function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		</script>
    </head>   
    <body>
        <div class="body_body">
            <div class="left_top"></div><div class="bg_top"><div class="right_top"></div></div>
            <div class="body-content">
                <div class="a" align="center"><img src="http://forum.ngocrongonline.com/app/view/images/logoW.png" height="90"/></div>
                <div id="top">
                    <div class="link-more">	
                        <div class="h" align="center">
                            <!--<div style="color: #032E58;margin-top:-8px;margin-bottom:4px;">
							<center> <b>Mạng xã hội cho điện thoại di động</b></center> 
							</div>-->
							<div class="bg_tree"></div>
							<div class="bg_noel"></div>
                            <div class="menu2" style="background: #561d00;">
								<table width="100%" border="0" cellspacing="4">
									<tr class="menu">
										<td><a href="/">Trang Chủ</a></td>
										<td id="selected"><a href="/app/?for=forum&do=detail">Diễn Đàn</a></td>
									</tr>
								</table>
							</div>
                                                                                    <div class="body" style="text-align:center">
                                                                                <?PHP
                                        require('../confg.php');
                                        if(isset($_POST[submit])) {
                                               $taikhoan = $_POST[user];                $matkhau = $_POST[pass];   
                                               $nhanvat = $_POST[nhanvat];
     	$xuli = mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_users` WHERE `taikhoan`='".$_POST[user]."'"));
     	if(empty($nhanvat) or empty($matkhau) or empty($taikhoan)) {
     	    $msg = 'vui lòng nhập đủ thông tin';
     	    $title = 'Đăng kí không thành công';
     	      $url ='<a href="/app/register.php">Quay lại trang đăng kí</a>';

     	} else
if($xuli[id] >0) {
    $msg = 'Tài Khoản đã tồn tại.';
         	    $title = 'Đăng kí không thành công';
  $url ='<a href="/app/register.php">Quay lại trang đăng kí</a>';

} else {
    $msg = 'xin chúc mừng bạn đã tạo tài khoản thành công,hãy đăng nhập để thảo luận nhé. <br> Tài khoản của bạn : '.$taikhoan.'
    <br> mật khẩu của bạn : '.$matkhau.'
    '
    
    ;
    mysql_query("INSERT INTO `ducnghia_users` SET `taikhoan`='{$taikhoan}', `matkhau`='{$matkhau}', `avatar`='{$nhanvat}'");

         	    $title = 'Đăng kí  thành công';
  $url ='<a href="/app/login.php">Quay lại trang đăng nhập</a>';

}
?>
<div class="bg-content"><?=$title?><br>
<ul>
		<li><?=$msg?></li>
	</ul>

<?=$url?><br></div>
<?PHP
                                                                                    
                                                                                    
                                                                                } else {
                                            ?>                                            
                            <div style="font-size:10px;">Nhập đầy đủ thông tin bên dưới để tạo tài khoản.</div>
                                <center><form action="/app/register.php?do=register" method="POST" name="login">
                                    <input type="hidden" name="nav" value="" readonly="readonly" />
                                    <table>
                                        <tr>
                                            <td colspan=2><label for="user">SĐT / Email:</label></td>
                                            <td colspan=2><input name="user" type="text" value="" /></td>
                                        </tr>
                                        <tr>
                                            <td colspan=2><label for="pass">Mật khẩu:</label></td>
                                            <td colspan=2><input name="pass" type="password" value="" /> 
                                        </tr>
                                    </table>
								
								<table>
										<tbody><tr align="center">
											<td>
											
                                            <B id="myBtn"> <big><font color="red">chọn avatar nhân vật</font></big></B>
												
									
												
											</td>
											
											
										</tr>
										
									</tbody></table>
								
                                    <button type="submit" value="Đăng nhập" name="submit">Đăng Kí</button><br />
                                    <div style="font-size:10px;">
								Nếu bạn đã có tài khoản, vui lòng <a href="/app/login.php">đăng Nhập</a><br>
							</div>
							
	<div id="myModal" class="modal">

  <!-- Modal content -->
  <div class="modal-content">
    <span class="close">&times;</span>
	<table>
										<tbody><tr align="center">
											<td>
											    <img src="/images/1.png"> <br> saida <br>
												<input type="radio" name="nhanvat" value="1">
												
									
												
											</td>
											
												<td>
											    <img src="/images/1.png"> <br>
												<input type="radio" name="nhanvat" value="2">
												
									
												
											</td>
										</tr>
										
									</tbody></table>
  </div>
</div>
</div>						
							
                                </form><br>
								</center>
								
								<?PHP } ?>
                            </div>
                        </div>
                        <br>
                    </div><br>

                </div>

            </div>

          <div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div>
 <div class="copyright"><br><b>Bản quyền thuộc về Chú Bé Rồng Online - 2013</b></div>
</div>
        </div>
    </div>
</body>

</html>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
<style>

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
</style>