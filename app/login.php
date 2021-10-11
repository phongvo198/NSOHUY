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
     	$xuli = mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_users` WHERE `taikhoan`='".$_POST[user]."' AND `matkhau`='".$_POST[pass]."'"));
if($xuli[id] <=0) {
    $msg = 'Tài khoản hoặc mật khẩu không chính xác.';
} else {
    $_SESSION[id] = $xuli[id];
    $msg = 'Đăng nhập thành công.';
    header('Location: /app/?for=forum&do=detail');

}
?>
<div class="bg-content">Đăng nhập không thành công.<br>
<ul>
		<li><?=$msg?></li>
	</ul>
<a href="/app/login.php">Quay lại trang đăng nhập</a>
<br></div>
<?PHP
                                                                                    
                                                                                    
                                                                                } else {
                                            ?>                                            
                            <div style="font-size:10px;">Sử dụng tài khoản Chú Bé Rồng Online để đăng nhập.</div>
                                <center><form action="/app/login.php?do=login" method="POST" name="login">
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
								
                                    <button type="submit" value="Đăng nhập" name="submit">Đăng nhập</button><br />
                                    <div style="font-size:10px;">
								Nếu bạn chưa có tài khoản, vui lòng <a href="/app/register.php">đăng ký</a><br>
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