<?PHP
require('../confg.php');
$test = isset($_GET['for']);
$url = $_GET['for'];
require('head.php');
$time = time();
///khóa
if($url =="khoa") {
    if($data[admin] ==0) {
        exit;
    }
    $baiviet=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `id` = '".$_GET['uid']."'"));
if($baiviet[khoa]==1) {
    $nghia = 0;
} else { $nghia =1; }
         mysql_query("UPDATE `ducnghia_baiviet` set `khoa` = '{$nghia}' WHERE `id`='".$_GET[uid]."'");
         ?>
 <script type="text/javascript">

        window.location="/app/index.php?for=ducnghia&do=list&uid=<?=$_GET[uid]?>&p=<?=$_GET[p]?>&sz=15";

      </script>
      <?PHP
}
if($url =="vip") {
    if($data[admin] ==0) {
        exit;
    }
    $baiviet=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `id` = '".$_GET['uid']."'"));
if($baiviet[vip]==1) {
    $nghia = 0;
} else { $nghia =1; }
         mysql_query("UPDATE `ducnghia_baiviet` set `vip` = '{$nghia}' WHERE `id`='".$_GET[uid]."'");
         ?>
 <script type="text/javascript">

        window.location="/app/index.php?for=ducnghia&do=list&uid=<?=$_GET[uid]?>&p=<?=$_GET[p]?>&sz=15";

      </script>
      <?PHP
}
if($url =="xoa") {
    if($data[admin] ==0) {
        exit;
    }
    $baiviet=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `id` = '".$_GET['uid']."'"));

         mysql_query("DELETE FROM `ducnghia_baiviet` WHERE `id`='".$_GET[uid]."'");
         ?>
 <script type="text/javascript">

        window.location="/app/index.php?for=forum&do=setting&uid=3&p=0&sz=15";

      </script>
      <?PHP
}

///

///edit bài viết

if($url =="edit") {
    $baiviet=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `id` = '".$_GET['uid']."'"));
     if(isset($_POST['ducnghia'])) {
         $tieude = $_POST[tieude];
                  $noidung = $_POST[noidung];
        $dem =strlen($noidung);
        $dem_t = strlen($tieude);
       if($data[admin] ==0)   {
       echo'    <div class="bg-content"><br>
<br><center><div><strong>Tiêu đề bài viết không được vượt quá 70 ký tự !</strong></div><div><strong>Tiêu đề bài viết không được sử dụng ký tự đặc biệt !</strong></div><div><strong>số ký tự phải lớn hơn 10 và tối đa là 100 . !</strong></div><div>thời gian giữa 2 bài viết tối thiểu là 60 giây và giữa 2 comment là 20 giây</div><div><a href="/app/index.php?for=ducnghia&do=list&uid='.$_GET[uid].'&p='.$_GET[p].'&sz=15">Click để quay về diễn đàn !</a></div></center>
<br>
<br></div>';
           
       }      else {

         mysql_query("UPDATE `ducnghia_baiviet` SET `noidung` =  '".nl2br($noidung)."' WHERE `id`='".$_GET[uid]."'");

     ?>
     <script type="text/javascript">

        window.location="/app/index.php?for=ducnghia&do=list&uid=<?=$_GET[uid]?>&p=<?=$_GET[p]?>&sz=15";

      </script>

<?PHP
           
       }    

     } else {
?> 
<div id="box_forums">

		
<div class="box_home"><div class="box_icon"><a href="/app/index.php?for=ducnghia&do=list&uid=<?=$_GET[uid]?>&p=0&sz=15">Quay Lại</a></div></div><div class="box_list_chuyenmuc"><div class="box_topss"><span>Viết bài mới</span></div><div class="box_midss"><form method="post" name="UpdateCM" enctype="multipart/form-data"><div class="textbox"><div class="box_test">Nội dung :</div><div class="box_inputs">
&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="noidung" type="text" rows="3"><?=$baiviet[noidung]?></textarea></div></div><div class="textbox"><div class="box_inputs">
<input type="hidden" value="f96a66f4004bfd4aba5740e38f0d9a9d" name="f96a66f4004bfd4aba5740e38f0d9a9d">

&nbsp;&nbsp;&nbsp;&nbsp;<button name="ducnghia" type="submit" value="submit">Gửi</button>

</div></div></form></div></div>
				
	
		
		
		
		
					
	</div>
	<?PHP }?>


	<div class="box_list_parent">
	<div class="box_parent_list">
		
		<table width="100%" border="0" cellspacing="0">
			<tbody><tr class="menu1">
			<td width="25%" style="border: 2px solid #FFAF4D;padding: 2px;"><a href="#">LINK GÌ THÌ ĐẶT ĐI</a></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
</div>

<?PHP

}


////song eidt
////bài viết
if($url =="ducnghia") {
     if(isset($_POST['ducnghiait'])) {
         $tieude = $_POST[tieude];
                  $noidung = $_POST[ducnghia_noidung];
                  $dem =strlen($noidung);
       if($dem <10)   {
       echo'    <div class="bg-content"><br>
<br><center><div><strong>Tiêu đề bài viết không được vượt quá 70 ký tự !</strong></div><div><strong>Tiêu đề bài viết không được sử dụng ký tự đặc biệt !</strong></div><div><strong>số ký tự phải lớn hơn 10 và tối đa là 100 . !</strong></div><div>thời gian giữa 2 bài viết tối thiểu là 60 giây và giữa 2 comment là 20 giây</div><div><a href="/app/index.php?for=ducnghia&do=list&uid='.$_GET[uid].'&p='.$_GET[p].'&sz=15">Click để quay về diễn đàn !</a></div></center>
<br>
<br></div>';
           
       }      else {
 mysql_query("INSERT INTO `ducnghia_baiviet` SET `user_id`='".$user_id."', `time`='".time()."', `uid_baiviet`='".$_GET[uid]."', `noidung`='".$noidung."'");
    mysql_query("UPDATE `ducnghia_users` SET `baiviet` =`baiviet` +  '1' WHERE `id`='".$user_id."'");
        mysql_query("UPDATE `ducnghia_baiviet` SET `time_cmt` =  '".time()."' WHERE `id`='".$_GET[uid]."'");


     ?>
     <script type="text/javascript">
        window.location="/app/index.php?for=ducnghia&do=list&uid=<?=$_GET[uid]?>&p=<?=$_GET[p]?>&sz=15";
      </script>

<?PHP
           
       }    

     } else {
         
	if (empty($_GET['p']) || $_GET['p'] == 0 || $_GET['p'] < 0) {
	$_GET['p'] = 0;
}
$_GET['p'] = $_GET['p'];
$next = $_GET['p'] + 1;
$back = $_GET['p'] - 1;
$num  = $_GET['p'] * 10;
if ($_GET['p'] == 0) {
	$i = 1;
} else {
	$i = ($_GET['p'] * 10) + 1;
}

$viso   = mysql_num_rows(mysql_query("SELECT `id` FROM `ducnghia_baiviet` Where  `uid_baiviet` = '".$_GET[uid]."' "));
	$puslap = floor($viso / 10);
  $ducnghia_data=mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `uid_baiviet` = '".$_GET[uid]."'   ORDER BY `id` ASC LIMIT $num, 10");		    
		 $visox   = mysql_num_rows(mysql_query("SELECT `id` FROM `ducnghia_baiviet` Where  `uid_baiviet` = ''  LIMIT $num, 10"));
            
?> 
<div id="box_forums"> 

	<div class="box_list_parent">		
						<div class="box_parent_list_next"><div class="box_phantrang">
		<div class="backlink">
				<a style="color:#fff;" href="index.php?for=forum&amp;do=setting&amp;uid=3&amp;p=0&amp;sz=15">Quay lại</a>
			
				</div>
				
		
<div class="pagination">
    <?Php   $trang = $_GET[p];
    $ducnghia_back = $back;
				echo '<div class="box_topsss" style="background-color: transparent;">
		<div style="width:100px;float:left;">
						</div>
		<span style="float:right"> 
<div class="pagination">
                  ';
	if ($_GET['p'] > 0) {
		echo  '<a class="pagelink" href="/app/index.php?for=ducnghia&do=setting&uid='.$_GET[uid].'&p='.$back.'&sz=15">'.$back.'</a>';
	}
	echo'  <span class="pagecurrent">'.$trang.'</span>';
	if (empty($_GET['p']) || $_GET['p'] == 0 || $_GET['p'] < $puslap) {
		echo '    <a class="pagelink" href="/app/index.php?for=ducnghia&do=setting&uid='.$_GET[uid].'&p='.$next.'&sz=15">'.$next.'</a>
';
	}
	echo'</div></span></div>'; ?>
    </div></div></div>			
		<form method="POST" name="UpdateHide">
		<div class="box_list_parent_next">
		    
		    <!-------TOPPPP------->
		    <?PHP 
		    

		    
		    if($_GET['p']==0) {	      $baiviet=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `id` = '".$_GET['uid']."' AND `uid_baiviet` = ''"));
		    $user_bv=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_users` Where  `id` = '".$baiviet['user_id']."'"));
		    
?>
				<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
				  <tbody><tr>
					<td width="50px;" align="center" class="box_list_c_s">
													<img class="avatar" src="/images/<?=avatar($baiviet[user_id])?>.png">	
																								<div class="box_list_b_s" style="background-color: #ffcf9c;">
						<div class="box_list_ads">
							<div class="box_oxx_member" style="border:none"><span style="font-size:7px;">
								<?=nick($baiviet[user_id])?></span></div>
						</div>
						</div>
					</td>
				
					<td class="box_list_b_s">
						
						<div class="box_list_ads">
							
							<div class="box_oxx_member">
							<span style="font-weight:normal;color:black;font-size:9px;"><i>
							<?=online($baiviet[user_id])?>
						<?=thoigian($baiviet['time'])?></i> </span>
							<span style="font-weight:normal;color:black;font-size:9px;float:right;"><i> <?PHP IF($data[admin]!=0) { ?> <a href="/app/index.php?for=edit&uid=<?=$baiviet[id]?>">[Edit]</a> <a href="/app/index.php?for=xoa&uid=<?=$baiviet[id]?>">[DEL]</a>  <a href="/app/index.php?for=khoa&uid=<?=$baiviet[id]?>">[KHÓA]</a> <a href="/app/index.php?for=vip&uid=<?=$baiviet[id]?>">[HOT]</a> <?PHP }?>
							Điểm:<?=baiviet($baiviet[user_id])?></i></span>
							 
							
							</div>
														
							<div class="box_title_bviet"><?=$baiviet[tieude]?></div>
							<div class="box_ndung_bviet"><?=ducnghia($baiviet[noidung])?><br><center></center></div>
																												<div class="box_timee_bviet">
							 
						
														</div>
														<div class="box_timee_bviet" style="padding:3px;">
								 
															</div>
													</div>						
					</td>
				  </tr>
				</tbody></table>
			<?Php }
			

	
	$i = 1;
	while ($ducnghia_dz=mysql_fetch_assoc($ducnghia_data)){

?>
<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
			  <tbody><tr>
				<td width="50px;" align="center" class="box_list_c">
											<img class="avatar" src="/images/<?=avatar($ducnghia_dz[user_id])?>.png" >	
																				<div class="box_list_b_s" style="background-color: #ffcf9c;">
						<div class="box_list_ads">
							<div class="box_oxx_member" style="border:none"><span style="font-size:7px;">
								<?=nick($ducnghia_dz[user_id])?>								<br></span></div>
						</div>
						</div>
					
				</td>
			
				<td class="box_list_b">
					
					<div class="box_list_ads">
						
						<div class="box_oxx_member"><span>						<?=online($ducnghia_dz[user_id])?>
						<span style="font-weight:normal;color:black;font-size:9px;">
						<i>
					<?=thoigian($ducnghia_dz[time])?></i></span></span> 
						<span style="font-weight:normal;color:black;font-size:9px;float:right;">
						<i>
						Điểm:<?=baiviet($ducnghia_dz[user_id])?></i></span>
						</div>
																		<div class="box_title_bviet"></div>
						<div class="box_ndung_bviet"><?=ducnghia($ducnghia_dz[noidung])?><br><center></center></div>
																		<div class="box_timee_bviet">
																	
												</div>
						<div class="box_timee_bviet" style="padding:3px;">
							 
													</div>
					</div>		
				</td>
			  </tr>
			</tbody></table>

<?PHP
		$i++;
	}
	 echo '	<br><div class="box_topsss" style="background-color: transparent;">
		<div style="width:100px;float:left;">
						</div>
		<span style="float:right"> 
<div class="pagination">';
if ($_GET['p'] > 0) {
		echo  '<a class="pagelink" href="/app/index.php?for=ducnghia&do=setting&uid='.$_GET[uid].'&p='.$back.'&sz=15">'.$back.'</a>';
	}
	echo'  <span class="pagecurrent">'.$trang.'</span>';
	if (empty($_GET['p']) || $_GET['p'] == 0 || $_GET['p'] < $puslap) {
		echo '    <a class="pagelink" href="/app/index.php?for=ducnghia&do=setting&uid='.$_GET[uid].'&p='.$next.'&sz=15">'.$next.'</a>
';
	}
	echo'</div></span></div>';

			?>
								
						
				
				<!---------->
						
					</div>
						<div class="box_parent_list_next" style="margin:0px;text-align:right;"><div class="box_phantrang">
<div class="pagination">
    </div></div></div>			
					</form></div>
	
	<div class="box_list_chuyenmuc">
			<!--<div class="box_topss"><span><a style="color:#ffffff;" name="traloi">Nhập tiêu đề và nội dung</a></span></div>-->
		<div class="box_midss">			
			<form method="POST" name="UpdateCM">
				<div class="box_comment_new">
										<table cellpadding="0" cellspacing="0" width="99%" border="0" style="table-layout:fixed;word-wrap: break-word;">
					  <tbody><tr>
						<td width="50px;" align="center" class="box_list_c">
																						<img class="avatar" src="/images/<?=avatar($user_id)?>.png" alt="">	
													</td>
					
						<td class="box_list_b">							
							<div class="box_list_ads">
								<div class="box_top_name">									
									<div class="box_topname"><a name="traloi"></a><input type="hidden" name="trang" value="1"><input type="hidden" name="box_id" value="3">
									<input name="txtbox" type="hidden" value="17772752"></div>
									<?PHP if($baiviet[khoa]==0) { ?>
									<div class="box_topname"><textarea width="99%" name="ducnghia_noidung" type="text" rows="3"></textarea></div>	
									
									<?PHP } else { ?>
									Chủ đề đã bị đóng cửa <?PHP }?>
								</div>
															</div></div>
															</div>		
						</td>						
					  </tr>
					  <tr>
						<td>
						</td>
						<td>
							<div class="box_list_cnang" style="padding-top: 3px;">
							<button name="ducnghiait" type="submit" value="submit"></button>
						
															</div>
						</td>
						<td>
						</td>
					  </tr>
					</tbody></table>				
											
				</div>
			</form>
		</div>
		
	</div>
</div>
	<?PHP }?>


	<div class="box_list_parent">
	<div class="box_parent_list">
		
		<table width="100%" border="0" cellspacing="0">
			<tbody><tr class="menu1">
			<td width="25%" style="border: 2px solid #FFAF4D;padding: 2px;"><a href="#">LINK GÌ THÌ ĐẶT ĐI</a></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
</div>

<?PHP

}


////////code by ducnghia
if($url =="viet") {
     if(isset($_POST['ducnghia'])) {
         $tieude = $_POST[tieude];
                  $noidung = $_POST[noidung];
        $dem =strlen($noidung);
        $dem_t = strlen($tieude);
       if($dem <10 or $dem_t <10)   {
       echo'    <div class="bg-content"><br>
<br><center><div><strong>Tiêu đề bài viết không được vượt quá 70 ký tự !</strong></div><div><strong>Tiêu đề bài viết không được sử dụng ký tự đặc biệt !</strong></div><div><strong>số ký tự phải lớn hơn 10 và tối đa là 100 . !</strong></div><div>thời gian giữa 2 bài viết tối thiểu là 60 giây và giữa 2 comment là 20 giây</div><div><a href="/app/index.php?for=ducnghia&do=list&uid='.$_GET[uid].'&p='.$_GET[p].'&sz=15">Click để quay về diễn đàn !</a></div></center>
<br>
<br></div>';
           
       }      else {
           	  		@mysql_query("UPDATE `ducnghia_users` SET `baiviet` =`baiviet` +  '1' WHERE `id`='".$user_id."'");

 mysql_query("INSERT INTO `ducnghia_baiviet` SET `user_id`='".$user_id."', `time`='".$time."',`time_cmt` = '".$time."', `tieude`='".$tieude."', `noidung`='".nl2br($noidung)."'");
                  $id_new = mysql_insert_id();
     ?>
     <script type="text/javascript">
        window.location="/app/index.php?for=ducnghia&do=list&uid=<?=$id_new?>&p=0&sz=15";
      </script>

<?PHP
           
       }    

     } else {
?> 
<div id="box_forums">

		
<div class="box_home"><div class="box_icon"><a href="index.php?for=forum&amp;do=detail">Diễn đàn</a></div></div><div class="box_list_chuyenmuc"><div class="box_topss"><span>Viết bài mới</span></div><div class="box_midss"><form method="post" name="UpdateCM" enctype="multipart/form-data"><div class="textbox"><div class="box_test">Tiêu đề :</div><div class="box_inputs">
&nbsp;&nbsp;&nbsp;&nbsp;<input name="tieude" type="text"></div></div><div class="textbox"><div class="box_test">Nội dung :</div><div class="box_inputs">
&nbsp;&nbsp;&nbsp;&nbsp;<textarea name="noidung" type="text" rows="3"></textarea></div></div><div class="textbox"><div class="box_inputs">
<input type="hidden" value="f96a66f4004bfd4aba5740e38f0d9a9d" name="f96a66f4004bfd4aba5740e38f0d9a9d">

&nbsp;&nbsp;&nbsp;&nbsp;<button name="ducnghia" type="submit" value="submit">Gửi</button>

</div></div></form></div></div>
				
	
		
		
		
		
					
	</div>
	<?PHP }?>


	<div class="box_list_parent">
	<div class="box_parent_list">
		
		<table width="100%" border="0" cellspacing="0">
			<tbody><tr class="menu1">
			<td width="25%" style="border: 2px solid #FFAF4D;padding: 2px;"><a href="#">LINK GÌ THÌ ĐẶT ĐI</a></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
</div>

<?PHP

}

///song forum
if($url =="forum") {
?>
<div id="box_forums">

		
	
		<div class="box_list_chuyenmuc">
	
		<div id="stick">
		    <!--------------->
				<?PHP
				
				$ducnghia_data2=mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `vip` = '1'   ORDER BY `id` DESC LIMIT  5");

	
	$i = 1;
	while ($online2=mysql_fetch_assoc($ducnghia_data2)){
	      $user2=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_users` Where  `id` = '".$online2['user_id']."'"));

	echo'	<div class="box_botss">
				<div class="topic_name" style="">
			<div style="width:30px;float:left;margin-right: 3px;">
			<a href="/app/index.php?for=ducnghia&do=list&uid='.$online2[id].'&p=0&sz=15">
					<img style="max-width:100%;max-height:100%;" src="/images/'.$user2[avatar].'.png" alt="'.$user2[taikhoan].'">	</div>	<div>
						<span>'.$online2[tieude].'</span></a>
						
						<div class="box_name_eman">bởi <span>'.$user2[taikhoan].'</span>		</div>	</div>	</div>	</div>';
		$i++;
	}
	?>
			
			
			
			
			
			<!---------------->
					
					</div>
					

				<br>
				</div>
				
	
		
		
		
			<?PHP
	if (empty($_GET['p']) || $_GET['p'] == 0 || $_GET['p'] < 0) {
	$_GET['p'] = 0;
}
$_GET['p'] = $_GET['p'];
$next = $_GET['p'] + 1;
$back = $_GET['p'] - 1;
$num  = $_GET['p'] * 10;
if ($_GET['p'] == 0) {
	$i = 1;
} else {
	$i = ($_GET['p'] * 10) + 1;
}

$viso   = mysql_num_rows(mysql_query("SELECT `id` FROM `ducnghia_baiviet` Where  `uid_baiviet` = '' "));
if($viso > 0) {
	$puslap = floor($viso / 10);
  $ducnghia_data=mysql_query("SELECT * FROM `ducnghia_baiviet` Where  `uid_baiviet` = ''   ORDER BY `time_cmt` DESC LIMIT $num, 10");

	
	$i = 1;
	while ($online=mysql_fetch_assoc($ducnghia_data)){
	      $user=mysql_fetch_assoc(mysql_query("SELECT * FROM `ducnghia_users` Where  `id` = '".$online['user_id']."'"));

	echo'	<div class="box_botss">
				<div class="topic_name" style="">
			<div style="width:30px;float:left;margin-right: 3px;">
			<a href="/app/index.php?for=ducnghia&do=list&uid='.$online[id].'&p=0&sz=15">
					<img style="max-width:100%;max-height:100%;" src="/images/'.$user[avatar].'.png" alt="'.$user[taikhoan].'">	</div>	<div>
						<span>'.$online[tieude].'</span></a>
						
						<div class="box_name_eman">bởi <span>'.$user[taikhoan].'</span>		</div>	</div>	</div>	</div> <br>';
		$i++;
	} $x = $_GET[p]+1;
	 echo '	<br><div class="box_topsss" style="background-color: transparent;">
		<div style="width:100px;float:left;">
						</div>
		<span style="float:right"> 
<div class="pagination">
                    <span class="pagecurrent">'.$x.'</span>';
	if ($_GET['p'] > 0) {
		echo  '<a class="pagelink" href="/app/index.php?for=forum&do=setting&uid=3&p='.$back.'&sz=15"><</a>';
	}
	if (empty($_GET['p']) || $_GET['p'] == 0 || $_GET['p'] < $puslap) {
		echo '    <a class="pagelink" href="/app/index.php?for=forum&do=setting&uid=3&p='.$next.'&sz=15">&gt;</a>
';
	}
	echo'</div></span></div>';
} else {
	echo 'Chưa có  bài viết nào!';
}		
			
			
			?>
		
		
		
		<?PHP if($user_id) { ?>
<a href="/app/index.php?for=viet&do=request&uid=3">
		<button>Viết Bài</button></a>		
			
		<?PHP } ?>
			
					
	</div>


	<div class="box_list_parent">
	<div class="box_parent_list">
		
		<table width="100%" border="0" cellspacing="0">
			<tbody><tr class="menu1">
			<td width="25%" style="border: 2px solid #FFAF4D;padding: 2px;"><a href="#">LINK GÌ THÌ ĐẶT ĐI</a></td>
			</tr>
			</tbody>
		</table>
	</div>
</div>
</div>


    <?PHP 
}
?>

 
 <br>
<style>
			.copyright a{
				color: #000;
			}
		   </style>
		   <div class="left_b_bottom"><div class="right_b_bottom"><div class="footer"><div class="left_bottom"></div><div class="right_bottom"></div></div></div></div>
 <div class="copyright" style="line-height: 7px">
 <p>Giấy phép thiết lập Mạng Xã Hội trên mạng số: 374/GP-BTTTT <br><br>do Bộ Thông Tin và Truyền Thông cấp ngày: 07/08/2015 - <a href="http://teamobi.com/dieukhoan.htm"><small>Điều Khoản Sử Dụng</small></a></p>
 
Bản Quyền thuộc về TeaMobi - 2015<p>
<a href="http://shopht.tk" target="_blank">Shopht.tk</a> -
 </p>

</div>
</div>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-22738816-8', 'ngocrongonline.com');
  ga('send', 'pageview');

</script>

    </body>
</html>
 
 
 
 