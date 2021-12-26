<?php require '../check_admin.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/form_css.css">
	<title></title>
</head>
<body>
	<?php
		require '../db/connect.php';
		require '../notification.php';
	?>
	<div class="form_insert" style=" padding-right: 350px;">
		<h1 style="font-size: 18px">Thêm nhân viên mới</h1>
		<form action="process_insert.php" method="post" style="width: 700px;">
			<div id="container" style="display: flex;">
				<div id="right" style="width: 50%;">
					<p>Tên nhân viên</p>
					<input type="text" name="name">
					<p>Số điện thoại</p>
					<input type="number" name="phone_number">
					<p>Địa chỉ</p>
					<textarea name="address"></textarea>
					<p>Giới tính</p>
					<input type="text" name="gender">
					<p>ngày sinh</p>
					<input type="date" name="date">
				</div>
				<div id="left" style="padding-left: 40px; width: 50%;">
					<p>Email</p>
					<input type="text" name="email">
					<p>Password</p>
					<input type="text" name="password">
					<p>Cấp độ</p>
					<select name="level">
						<option value="0">Nhân viên</option>
						<option value="1">Admin</option>
					</select>
				</div>
			</div>
			
			<button type="submit" style="width: 30%;">Thêm</button>

		</form>	
	</div>
	<?php require '../db/close.php' ?>
</body>
</html>