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
	<div class="form_insert" style=" padding-right: 350px;">
		<h1 style="font-size: 18px">Sửa thông tin nhân viên</h1>
		<?php 
			require '../notification.php';
			if(empty($_GET['id'])) {
				header('location: index.php?error=Bạn chưa truyền mã để sửa!');
				exit;
			}
			$id = $_GET['id'];
			require '../db/connect.php';
			$sql = "select * from staff where id = '$id' ";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);

		?>
		
		<form action="process_update.php" method="post" style="width: 700px;">
			<div id="container" style="display: flex;">
				<div id="right" style="width: 50%;">
					<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
					<p>Tên nhân viên</p>
					<input type="text" name="name" value="<?php echo $each['name'] ?>">
					<p>Số điện thoại</p>
					<input type="number" name="phone_number" value="<?php echo $each['phone_number'] ?>">
					<p>Địa chỉ</p>
					<textarea name="address"><?php echo $each['address'] ?></textarea>
					<p>Giới tính</p>
					<input type="text" name="gender" value="<?php echo $each['gender'] ?>">
					<p>ngày sinh</p>
					<input type="date" name="date" value="<?php echo $each['date'] ?>">
				</div>
				<div id="left" style="padding-left: 40px; width: 50%;">
					<p>Email</p>
					<input type="text" name="email" value="<?php echo $each['email'] ?>">
					<p>Password</p>
					<input type="text" name="password" value="<?php echo $each['password'] ?>">
					<p>Cấp độ</p>
					<select name="level">
						<option value="0"
						<?php if($each['level'] == 0){ ?>
							selected
						<?php } ?>
						>
							Nhân viên
						</option>
						<option value="1"
						<?php if($each['level'] == 1){ ?>
							selected
						<?php } ?>
						>
							Admin
						</option>
					</select>
				</div>
			</div>
			
			<button type="submit" style="width: 30%;">Sửa</button>

		</form>	
		<?php require '../db/close.php' ?>
	</div>
</body>
</html>