<?php 
session_start();
if(isset($_COOKIE['remember'])){
	$token = $_COOKIE['remember'];
	require 'connect.php';
	$sql = "select * from customers
	where token = '$token'
	limit 1";
	$result = mysqli_query($connect,$sql);
	$number_rows = mysqli_num_rows($result);
	if($number_rows==1){
		$each = mysqli_fetch_array($result);
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $name;	
	}
}
if(isset($_SESSION['id'])){
	header('location:index.php');
	exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		Đăng nhập
	</title>
	<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>
	<?php 
	if(isset($_GET['error'])){
		echo $_GET['error'];
	 }
	 ?>
	<div class="login-form">
	<h1 class="label">Đăng nhập</h1>
	<form method="post" action="process_signin.php">
		Email
		<input id="email" type="email" name="email" placeholder="Email">
		<span style="color: red;" id="email_error"></span>
		<br>
		Mật khẩu
		<input id="pass" type="password" name="password" placeholder="Password">
		<span style="color: red;" id="pass_error"></span>
		<br>
		Ghi nhớ đăng nhập
		<input type="checkbox" name="remember">
		<br>
		<button type="submit" onclick="return kiemtra();">Đăng nhập</button>
	</form>
	Chưa có tài khoản, <a href="signup.php">đăng ký</a> ngay
	</div>
	<script type="text/javascript">
		onclick="return kiemtra();"
		function kiemtra() {
			let kiem_tra_loi = false;

			//email
			let value_email = document.getElementById('email').value;
			if (value_email.length === 0) {
				document.getElementById('email_error').innerHTML = 'Vui lòng nhập email của bạn!';
				kiem_tra_loi = true;
			} else {
				let regex_email = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/;
				if (!value_email.match(regex_email)) {
					document.getElementById('email_error').innerHTML = 'Sai định dạng!';
					kiem_tra_loi = true;
				} else {
					document.getElementById('email_error').innerHTML = '';
				}
			}

			// //mật khẩu
			// let password = document.getElementById('pass').value;
			// if (password.length === 0) {
			// 	document.getElementById('pass_error').innerHTML = 'Vui lòng nhập mật khẩu';
			// 	kiem_tra_loi = true;
			// } else {
			// 	let regex_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{4,}/;
			// 	if (!password.match(regex_password)) {
			// 		document.getElementById('pass_error').innerHTML = 'Mật khẩu từ 8 trở lên gồm ký tự bao gồm in hoa, thường và số';
			// 		kiem_tra_loi = true;
			// 	} else {
			// 		document.getElementById('pass_error').innerHTML = '';
			// 	}
			// }
			if (kiem_tra_loi) {
				return false;
			}
		}
	</script>
</body>
</html>