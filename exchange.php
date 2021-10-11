<?php 
$_title = "Đổi coin";
include_once 'head.php';
$read_sql = _fetch(_select("*",'player',"username='$_username'"));
//$read_sql['ninja']
$replace1 = str_replace('"', '', $read_sql['ninja']);
$replace2 = str_replace('[', '', $replace1);
$replace = str_replace(']', '', $replace2);
//
$_alert = null;
if(isset($_POST['playername']))
{
	$playername = htmlspecialchars($_POST['playername']);
	$amount1 = htmlspecialchars($_POST['amount']);
	if($amount1 == 10000)
	{
		$amount = 100000;
	}
	if($amount1 == 50000)
	{
		$amount = 500000;
	}
	if($amount1 == 100000)
	{
		$amount = 1500000;
	}
	if($amount1 == 200000)
	{
		$amount = 2500000;
	}
	if($amount1 == 500000)
	{
		$amount = 7000000;
	}
	$arr = explode(',',$replace);
		if(in_array($playername, $arr))
		{
			echo _console("có");
			if($_coin >= $amount )
			{
				$txt = _update('player',"coin=`coin`-$amount1","username='$_username'");
				$txt1 = _update('player',"luong=`luong`+$amount","username='$_username'");
				$query = _query($txt);
				$query1 = _query($txt1);
				$_alert = _alert('succ',"Đổi lượng thành công !");
			}
			else
			{
				$_alert = _alert('err',"Số dư của bạn không đủ !");
			}
		}
		else
		{
			$_alert = _alert('err',"Không tìm thấy nhân vật này !");
		}
}
?>
<main class="flex-grow-1 flex-shrink-1 container-active">
	<div class="bg-light">
		<div class="container">
			<ol class="breadcrumb bg-transparent rounded-0">
				<li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="/user.php">Thông tin tài khoản</a></li>
				<li class="breadcrumb-item active">Đổi coin</li>
			</ol>
		</div>
	</div>
	<div class="container">
		<div class="card mb-3">
			<?php 
			echo $_alert;
			$user_arr_1 = _fetch("SELECT * FROM player Where username='$_user'");
			 ?>
			<div class="card-header">Bạn đang có: <b><?php echo $user_arr_1['coin']; ?> coin</b></div>
			<div class="card-body">
				<form method="post">
					<div class="form-group">
						<label class="font-weight-bolder" for="playername">Nhân vật</label>
						<select class="form-control " name="playername" id="playername" required>
							<?php
							if(strlen($replace) ==0)
							{
								echo '<option value="">Chưa tạo nhân vật</option>';
							}
							else {
								$arr = explode(',',$replace);
								for($i=0;$i<count($arr);$i++)
								{
									echo '<option value="'.$arr[$i].'">'.$arr[$i].'</option>';
								}
							}
							?>
						</select>
					</div>
					<div class="form-group">
						<label class="font-weight-bolder" for="amount">Coin đổi</label>
						<select class="form-control " name="amount" id="amount" required>
						<option value="10000">10,000 coin</option>
							<option value="50000">50,000 coin</option>
							<option value="100000">100,000 coin</option>
							<option value="200000">200,000 coin</option>
							<option value="500000">500,000 coin</option>
						</select>
					</div>
					<div>
						<button type="submit" class="btn btn-primary">Đổi coin</button>
					</div>
				</form>
			</div>
		</div>
		<div class="card mb-3">
			<div class="card-header">Bảng giá quy đổi</div>
			<div class="table-responsive">
				<table class="table table-bordered table-nowrap">
					<thead>
						<tr>
							<th>Coin</th>
							<th>Lượng nhận</th>
						</tr>
					</thead>
					<tbody>
					<tr>
							<td>10,000</td>
							<td>100,000</td>
						</tr>
						<tr>
							<td>50,000</td>
							<td>500,000</td>
						</tr>
						<tr>
							<td>100,000</td>
							<td>1,500,000</td>
						</tr>
						<tr>
							<td>200,000</td>
							<td>2,500,000</td>
						</tr>
						<tr>
							<td>500,000</td>
							<td>7,000,000</td>
							<tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</main>
<?php include_once 'end.php'; ?>