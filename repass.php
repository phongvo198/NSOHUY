<?php
$_title = 'Sửa thông tin tài khoản';
include_once 'head.php';
$_alert = null;
if($_login == null) {header("location:/");}
if(isset($_POST['password']))
{
	$old_pass = isset_sql($_POST['password']);
	$new_pass = isset_sql($_POST['new_password']);
	$re_pass = isset_sql($_POST['new_password_confirmation']);
	if($old_pass != $_password)
	{
		$_alert = "Mật khẩu hiện tại không đúng !";
	}
	else
	{
		if($new_pass != $re_pass)
		{
			$_alert = "2 mật khẩu mới không trùng nhau !";
		}
		else
		{
			$query = _query(_update('player',"password='$new_pass'","username='$_username'"));
			if($query)
			{
				$_alert = _alert('succ',"Đổi mật khẩu thành công !");
			}
			else
			{
				$_alert = _alert('err',"Có lỗi gì đó xảy ra, vui lòng liên hệ admin !");
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
				<li class="breadcrumb-item active">Đổi mật khẩu</li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="card mb-3">
			<?php echo $_alert; ?>
			<div class="card-header">Đổi mật khẩu</div>
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label class="font-weight-bolder" for="password">Mật khẩu hiện tại</label>
						<input type="text" class="form-control " name="password" id="password" placeholder="Mật khẩu hiện tại" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bolder" for="new_password">Mật khẩu mới</label>
						<input type="text" class="form-control " name="new_password" id="new_password" placeholder="Mật khẩu mới" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bolder" for="new_password_confirmation">Xác nhận mật khẩu</label>
						<input type="text" class="form-control " name="new_password_confirmation" id="new_password_confirmation" placeholder="Xác nhận mật khẩu mới" required>
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Đổi mật khẩu</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php
include_once 'end.php';
?>