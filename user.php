<?php
$_title = "Thông tin tài khoản";
include_once 'head.php';
if($_login == null) {header("location:/login.php");}
$alert = isset($alert) ? $alert : null;
?>
<main class="c-layout-page custom-slide mt-header">
	<div class="bg-light">
		<div class="container">
			<ol class="breadcrumb bg-transparent rounded-0">
				<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				<li class="breadcrumb-item active">Thông tin tài khoản</li>
			</ol>
		</div>
	</div>
	<div class="container">
	<div class="notifi"><?php echo $alert; ?></div>
		<?php
		if($_status == "1") {
			echo '<div class="alert alert-warning">Để có thể đăng nhập vào game, bạn cần phải <a href="/active.php">kích hoạt tài khoản</a> (Phí: 10.000 vnd).</div>';
		}
		elseif($_status == "block") {
			echo '<div class="alert alert-warning">Tài khoản đang bị khóa,để mở lại bạn cần phải <a href="/active.php">Mở khóa tài khoản</a> (Phí:  10.000 vnd).</div>';
		}
		?>
		<ul class="list-group mb-3">
			<li class="list-group-item d-flex">
				<div class="w-50">Tài khoản:</div>
				<div class="w-50"><?php echo $_username; ?></div>
			</li>
			<li class="list-group-item d-flex">
				<div class="w-50">Biệt danh:</div>
				<div class="w-50"><?php echo $_nickname; ?></div>
			</li>
			<li class="list-group-item d-flex">
				<div class="w-50">Tình trạng:</div>
				<div class="w-50"><?php if($_status=='1'){
					echo "<span class='account-inactive'>Tài khoản chưa kích hoạt</span>";
				}
				elseif($_status=='0')
				{echo "<span class='account-active'>Tài khoản đã kích hoạt</span>";}
				else{
					echo "<span class='account-inactive'>Tài khoản đã bị khóa</span>";
				}
				?>
				</div>
			</li>
			<li class="list-group-item d-flex">
				<div class="w-50">Số dư:</div>
				<div class="w-50"><?php echo number_format($_coin, 0, '.', '.');?> VNĐ</div>
			</li>
			<li class="list-group-item d-flex">
				<div class="w-50">Email:</div>
				<div class="w-50"><?php echo $_email; ?></div>
			</li>
			<li class="list-group-item d-flex">
				<div class="w-50">Số điện thoại:</div>
				<div class="w-50"><?php echo $_phone; ?></div>
			</li>
		</ul>
		<div class="text-center">
			<a href="/update_info.php" class="btn btn-sm btn-primary mb-1">Cập nhật thông tin</a>
			<a href="/repass.php" class="btn btn-sm btn-primary mb-1">Đổi mật khẩu</a>
			<a href="/topup.php" class="btn btn-sm btn-primary mb-1">Nạp coin</a>
			<a href="/exchange.php" class="btn btn-sm btn-primary mb-1">Đổi coin</a>
		</div>
	</div>
</main>
<script>
	var errorMess=$('.notifi').find('.error').text();
	if(errorMess){
		swal("Thất bại", errorMess, "warning");
	}
	var succMess=$('.notifi').find('.success').text();
	if(succMess){
		swal("Thành công!", succMess, "success")
		.then(()=>location.href = '/user.php');
	}
</script>
<?php
include_once 'end.php';
?>