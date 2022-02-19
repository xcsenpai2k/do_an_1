<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng ký</title>
	<link rel="stylesheet" type="text/css" href="signin.css">
</head>
<body>
	<?php 
	if(isset($_GET['error'])){
		echo $_GET['error'];
	 }
	 ?>
	<div class="login-form">
	<form method="post" action="process_signup.php">
		<h1>Đăng ký</h1>
		Tên
		<input id="ten" type="text" name="name">
		<span style="color: red;" id="name_error"></span>
		<br>
		Email
		<input id="email" type="email" name="email">
		<span style="color: red;" id="email_error"></span>
		<br>
		Mật khẩu
		<input id="pass" type="password" name="password">
		<span style="color: red;" id="pass_error"></span>
		<br>
        Gioi tinh
		<input id="pass" type="text" name="gender">
		<br>
        Ngay sinh
		<input type="date" name="birthday">
		<br>
		Sdt
		<input type="text" name="phone_number">
		<span style="color: red;" id="phone_error"></span>
		<br>
		Địa chỉ
		<input id="diachi" type="text" name="address">
		<span style="color: red;" id="address_error"></span>
		<br>
		<button type="submit" onclick="return kiemtra();">Đăng ký</button>
	</form>
	</div>
	<script type="text/javascript">
		function kiemtra() {
			let kiem_tra_loi = false;

			let name = document.getElementById('ten').value;
			if (name.length===0) {
				document.getElementById('name_error').innerHTML ='Vui lòng nhập tên của bạn!';
				kiem_tra_loi = true;
			} else {
				let regex_ten = /^([a-zA-ZÀÁÂÃÈÉÊÌÍÒÓÔÕÙÚĂĐĨŨƠàáâãèéêìíòóôõùúăđĩũơƯĂẠẢẤẦẨẪẬẮẰẲẴẶẸẺẼỀỀỂưăạảấầẩẫậắằẳẵặẹẻẽềềểỄỆỈỊỌỎỐỒỔỖỘỚỜỞỠỢỤỦỨỪễệỉịọỏốồổỗộớờởỡợụủứừỬỮỰỲỴÝỶỸửữựỳỵỷỹ\s]+)$/;
				if (!regex_ten.test(name)) {
					document.getElementById('name_error').innerHTML ='Tên không được chưa ký tự đặc biệt và số!';
					kiem_tra_loi = true;
				} else {
					document.getElementById('name_error').innerHTML ='';
				}
			}

			let mang_gioi_tinh = document.getElementsByName('gioi_tinh');
			let kiem_tra_gioi_tinh = false;
			for (var i = 0; i < mang_gioi_tinh.length; i++) {
				if (mang_gioi_tinh[i].checked) {
					kiem_tra_gioi_tinh = true;
				}
			}
			if (kiem_tra_gioi_tinh == false) {
				document.getElementById('sex_error').innerHTML = 'Vui lòng chọn giới tính của bạn!';
				kiem_tra_loi = true;
			} else {
				document.getElementById('sex_error').innerHTML ='';
			}

			//địa chỉ
			let diachi = document.getElementById('diachi').value;
			if (diachi.length===0) {
				document.getElementById('address_error').innerHTML = 'Vui lòng nhập địa chỉ!';
				kiem_tra_loi = true;
			}

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

			//mật khẩu
			let password = document.getElementById('pass').value;
			if (password.length === 0) {
				document.getElementById('pass_error').innerHTML = 'Vui lòng nhập mật khẩu';
				kiem_tra_loi = true;
			} else {
				let regex_password = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{8,}/;
				if (!password.match(regex_password)) {
					document.getElementById('pass_error').innerHTML = 'Mật khẩu từ 8 trở lên gồm ký tự bao gồm in hoa, thường và số';
					kiem_tra_loi = true;
				} else {
					document.getElementById('pass_error').innerHTML = '';
				}
			}

			let sothich = document.getElementById('sothich').value;
			if (sothich.length===0) {
				document.getElementById('hobby_error').innerHTML = 'Vui lòng nhập sở thích!';
				kiem_tra_loi = true;
			}

			if (kiem_tra_loi) {
				return false;
			}
		}
	</script>
</body>
</html>