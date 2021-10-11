<?php
$_alert = null;
$_title = "Nạp coin";
include_once 'head.php';
if ($_login == null) {
	header("location:/");
}
if (isset($_GET['act'])) {
	$act = htmlspecialchars($_GET['act']);
	if ($act == 'card') {
		$tenthe = isset_sql($_POST['cardType']);
		$menhgia = isset_sql($_POST['cardAmount']);
		$seril = isset_sql($_POST['cardSerial']);
		$manap = isset_sql($_POST['cardCode']);
		$magioithieu = isset_sql($_POST['ref_code']);
		$read = _fetch(_select('*', 'topup', "code='$manap' && name='$tenthe' && seri='$seril'"));
		if (isset($read['magioithieu'])) {
			$_alert = _alert('err', "Thẻ này đã tồn tài trên hệ thống !");
		} else {
			$txt = _insert('topup', "type,name,code,seri,number,user,time_in,magioithieu,status", "'card','$tenthe','$manap','$seril','$menhgia','$_username','" . time() . "','$magioithieu','wait'");
			$add = _query($txt);
			if ($add) {
				$_alert = _alert('succ', 'Đã thêm thẻ, vui lòng đợi kết quả');
			} else {
				$_alert = _alert('err', 'Có lỗi gì đó xảy ra, vui lòng kiểm tra thẻ hoặc liên hệ với admin !');
			}
		}
	}
}
?>
<main class="flex-grow-1 flex-shrink-1 container-active">
	<div class="bg-light">
		<div class="container">
			<ol class="breadcrumb bg-transparent rounded-0">
				<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="/user.php">Thông tin tài khoản</a></li>
				<li class="breadcrumb-item active">Nạp tiền</li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="card border-bottom-0 mb-3">
			<?php echo $_alert; ?>
			 <div class="card-header">Chọn phương thức nạp tiền</div>
			<div class="accordion" id="topupList">
				<!-- <div class="list-group list-group-flush">
					<button type="button" class="list-group-item list-group-item-action">
						<div class="d-flex align-items-center" data-toggle="collapse" data-target="#momo">
							<div class="mr-3"><img src="/img/ic-momo.png" width="40"></div>
							<div>
								<div class="h6 mb-1">Nạp qua ví MoMo</div>
								<div class="small">Nạp tự động với Momo, hoàn thành trong 1-3 phút.</div>
							</div>
						</div>
					</button>
					<div id="momo" class="collapse" data-parent="#topupList">
						<div class="card-body border-bottom">
							<h4>Cách 1: Nạp qua tin nhắn</h4>
							<p><i>1.</i> Đăng nhập ví momo - Chọn số tiền bạn muốn nạp vào tài khoản</p>
							<p><i>2.</i> Nhập lời nhắn: <b style="color:blue;"><?php echo $w_cuphap_momo . ' ' . $_username; ?></b> (* Kiểm tra kĩ lời nhắn, nếu sai vui lòng liên hệ admin để được giải quyết.)</p>
							<p><i>3.</i> Chuyển số tiền bạn muốn nạp tới số <b style="color:red;"><?php echo $_phonemomo; ?></b></p>
							<p><i>Khi chuyển tiền xong làm mới trang sau 1 - 3 phút để cập nhật xu.</i></p>
							<h4>Cách 2: Quét mã Qr</h4>
							<center>
								<img src="<?php echo $_qrmomo; ?>" style="max-width: 200px;">
								<p style="font-size: 12px;">Quét mã Qr trên, nhập số tiền bạn cần nạp và nhập lời nhắn <b style="color:blue;"><?php echo $w_cuphap_momo . ' ' . $_username; ?></b> </p>
							</center>
							<p><i>Khi chuyển tiền xong làm mới trang sau 1 - 3 phút để cập nhật xu.</i></p>
						</div>
					</div>
				</div> -->



				<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"> </script>

				<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.11.5/sweetalert2.all.js"></script>

				<script>
					$(document).ready(function() {
						function refresh() {
							location.reload();
						}
						$('#napthe').click(function() {

							$('#napthe').html('Đang thực hiện...');
							$('#napthe').prop('disabled', true);
							var formData = {
								'namenap': "<?= $_username; ?>",
								'magioithieu': $('input[id=ref_code_card]').val(),
								'serial': $('input[name=cardSerial]').val(),
								'code': $('input[name=cardCode]').val(),
								'telco': $('select[name=cardType]').val(),
								'amount': $('select[name=cardAmount]').val(),
								'g-recaptcha-response': $("#g-recaptcha-response").val()
							};
							$.post("/apicard24h.php", formData,
									function(data) {
										if (data.status == '1') {
											swal('Thông báo', data.msg, 'error').then(()=>{refresh();});s

										} else {
											//window.location="/";   
											swal('Thông báo', data.msg, 'success').then(()=>{refresh();});
										}
									}, "json").done(function(data) {
									if (data.status == '1') {
										swal('Thông báo', data.msg, 'error').then(()=>{refresh();})
										location.reload();
									} else {
										//window.location="/";   
										swal('Thông báo', data.msg, 'success').then(()=>{refresh();})
									}
								})
								.fail(function(data) {
									swal('Thông báo', "Lỗi", 'error').then(()=>{refresh();})
								});
						});
					});
				</script>



				<div class="list-group list-group-flush">
					<button type="button" class="list-group-item list-group-item-action">
						<div class="d-flex align-items-center" data-toggle="collapse" data-target="#card">
							<div class="mr-3"><img src="/img/ic-telco.png" width="40"></div>
							<div>
								<div class="h6 mb-1">Nạp qua thẻ cào</div>
								<div class="small">Sai mệnh giá trừ 50% mệnh giá thẻ.</div>
								<div class="small">Nạp qua thẻ cào. Sau khi nạp 5-10 giây làm mới trang để xem kết quả nạp.</div>
							</div>
						</div>
					</button>
					<div id="card" class="collapse " data-parent="#topupList">
						<div class="card-body border-bottom">
							<form action="/topup.php?act=card" method="post">
								<div class="form-group">
									<label class="font-weight-bolder" for="cardType">Loại thẻ</label>
									<select id="cardType" name="cardType" class="form-control " required>
										<option value="">Chọn loại thẻ</option>
										<option value="VIETTEL">VIETTEL</option>
										<option value="MOBIFONE">MOBIFONE</option>
										<option value="VINAPHONE">VINAPHONE</option>
									</select>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder" for="cardAmount">Mệnh giá</label>
									<select id="cardAmount" name="cardAmount" class="form-control " required>
										<option value="">Chọn mệnh giá</option>
										<option value="10000">10,000</option>
										<option value="20000">20,000</option>
										<option value="50000">50,000</option>
										<option value="100000">100,000</option>
										<option value="200000">200,000</option>
										<option value="300000">300,000</option>
										<option value="500000">500,000</option>
										<option value="1000000">1,000,000</option>
									</select>
									<small id="emailHelp" class="form-text text-muted">Chọn sai mệnh giá mất thẻ và không được cộng tiền.</small>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder" for="cardSerial">Số seri</label>
									<input type="text" name="cardSerial" class="form-control " id="cardSerial" value="" placeholder="Nhập số seri thẻ" required>
								</div>
								<div class="form-group">
									<label class="font-weight-bolder" for="cardCode">Mã thẻ</label>
									<input type="text" name="cardCode" class="form-control " id="cardCode" value="" placeholder="Nhập mã thẻ" required>
								</div>
								<div class="g-recaptcha" data-sitekey="<?php echo $w_api_recaptcha; ?>"></div>
								<button id="napthe" type="submit" class="btn btn-primary">Nạp thẻ</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php

		function get_string_tinhtrangthe($tinhtrangthe)
		{
			switch ($tinhtrangthe) {
				case 0:
					$str = '<span class="btn btn-warning form-fontrol">Chờ xử lý</span>';
					break;
				case 1:
					$str = '<span class="btn btn-success form-fontrol">Nạp Thành Công</span>';
					break;
				case 2:
					$str = '<div class="btn" style="background-color:red;color:#fff; ">Thẻ Sai</div>';
					break;
				default:
					$str = '<span class="btn btn-danger form-fontrol">Lỗi Chưa Xác Định</span>';
					break;
			}
			return $str;
		}
		?>
		<div class="card mb-3">
			<div class="card-header">Lịch sử nạp tiền</div>
			<div class="table-responsive">
				<table class="table table-hover table-nowrap">
					<thead>
						<tr>
							<th>ID</th>
							<th>Loại</th>
							<th>Trạng thái</th>
							<th>Mệnh giá</th>
							<th>Thời gian</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$data = _query(_select("*", "naptien", "uid='$_username' ORDER BY id DESC"));
						while ($row = mysqli_fetch_array($data)) {
							/*	if($row['status']=='success')
								{
									$tinhtrang = '<span style="color: #fff; background:#69dc35;font-size: 11px; padding: 3px 8px; border-radius: 7px; font-weight: bold;">Thành Công</span>';
								}
								elseif($row['status']=='error')
								{
									$tinhtrang = '<span style="color: #fff; background:#dc3545;font-size: 11px; padding: 3px 8px; border-radius: 7px; font-weight: bold;">Thất Bại</span>';
								}
								elseif($row['status']=='wait')
								{
									$tinhtrang = '<span style="color: #fff; background:#5a5a5a;font-size: 11px; padding: 3px 8px; border-radius: 7px; font-weight: bold;">Đang xử lý</span>';
								} */
						?>

							<tr>
								<td><?php echo htmlspecialchars($row['id']); ?></td>
								<td><?php echo htmlspecialchars($row['loaithe']); ?></td>
								<td><?php echo get_string_tinhtrangthe($row['tinhtrang']); ?></td>
								<td><?php echo number_format($row['sotien']); ?>đ</td>
								<td><?php echo date("H:i - d/m/Y", $row['time']); ?></td>
							</tr>

						<?php }
						?>
					</tbody>
				</table>
			</div>
		</div>

		<!-- <div class="modal fade" id="modalMomo" data-backdrop="static" data-keyboard="false" tabindex="-1">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h6 class="modal-title">Ví MoMo</h6>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<form id="checkResultMomo" action="#" method="post">

						</form>
						<div class="row">
							<div class="col-md-5 text-center mb-3">
								<img id="momoQRCode" class="d-block mw-100 mx-auto" src="" width="240" alt="Mã QRCode Momo">
								<div class="mt-2">Nội dung chuyển tiền: <span id="momoContent" class="font-weight-bold text-warning"></span></div>
							</div>
							<div class="col-md-7">
								<p><b>Thực hiện theo hướng dẫn sau để thanh toán:</b></p>
								<p>Bước 1: Mở ứng dụng <b>Ví MoMo</b></p>
								<p>Bước 2: Chọn "Quét mã" và quét mã QR code đơn nạp</p>
								<p>Bước 3: Chuyển đúng số tiền cần nạp và nhập nội dung chuyển tiền dưới mã QR</p>
								<p>Sau khi hoàn tất chuyển khoản, vui lòng nhấp vào "Đã chuyển tiền" bên dưới để hệ thống kiểm tra. Quá 30 phút vẫn không được cộng tiền vui lòng báo cho Admin để được xử lý.</p>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button id="checkMomo" type="button" class="btn btn-primary">Đã chuyển tiền</button>
					</div>
				</div>
			</div>
		</div> -->
	</div>
</main>
<?php include_once 'end.php'; ?>