<?php
$_title = 'Sửa thông tin tài khoản';
include_once 'head.php';
$_alert = null;
if($_login == null) {header("location:/");}
if(isset($_POST['nickname']))
{
	$nickname = isset_sql($_POST['nickname']);
	$phone = isset_sql($_POST['phone']);
	$email = isset_sql($_POST['email']);
	$read = _fetch(_select('*','player',"email='$email'"));
	if(!isset($read['email']) or $email == $_email)
	{
		$query = _query(_update('player',"nickname='$nickname',email='$email',phone='$phone'","username='$_username'"));
		if($query)
		{
			$_alert = _alert('succ',"Chỉnh sửa thông tin  thành công !");
		}
		else
		{
			$_alert = _alert('err',"Có lỗi gì đó xảy ra, vui lòng liên hệ admin !");
		}
	}
	else
	{
		$_alert = _alert('err',"Email này đã tồn tại trên hệ thống !");
	}
}
$nickname = isset($_POST['nickname']) ? $nickname : $_nickname;
	$email = isset($_POST['email']) ? $email : $_email;
	$phone = isset($_POST['phone']) ? $phone : $_phone;

?>
<main  class="flex-grow-1 flex-shrink-1 container-active">
	<div class="bg-light">
		<div class="container">
			<ol class="breadcrumb bg-transparent rounded-0">
				<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="/user.php">Thông tin tài khoản</a></li>
				<li class="breadcrumb-item active">Cập nhật thông tin</li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="card mb-3">
			<?php echo $_alert; ?>
			<div class="card-header">Cập nhật thông tin tài khoản</div>
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label class="font-weight-bolder" for="name">Biệt danh</label>
						<input type="text" class="form-control " name="nickname" id="name" value="<?php echo htmlspecialchars($nickname); ?>" placeholder="Biệt danh" required>
					</div>
					<div class="form-group">
						<label class="font-weight-bolder" for="email">Email</label>
						<input type="text" class="form-control " name="email" id="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="<?php echo $nickname; ?>">
					</div>
					<div class="form-group">
						<label class="font-weight-bolder" for="phone">Số điện thoại</label>
						<input type="text" class="form-control " name="phone" id="phone" value="<?php echo htmlspecialchars($phone); ?>" placeholder="" >
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Cập nhật</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</main>
<?php
include_once 'end.php';
?>