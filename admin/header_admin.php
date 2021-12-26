<?php 
	$name = '';
	if(isset($_SESSION['name'])) {
		$name = $_SESSION['name'];
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
</head>
<body>
	<div class="container">
		<div class="navigation">
			<ul>
				<li>
					<a href="../root">
						<span class="title"><h2>HOME PAGE</h2></span>
					</a>
				</li>
				<li>
					<a href="../root">
						<span class="title">Danh mục quản lý</span>
					</a>
				</li>
				<li>
					<a href="../staff">
						<span class="title">Quản lý nhân viên</span>
					</a>
				</li>
				<li>
					<a href="../producer">
						<span class="title">Quản lý nhà sản xuất</span>
					</a>
				</li>
				<li>
					<a href="../products">
						<span class="title">Quản lý sản phẩm</span>
					</a>	
				</li>
				<li>
					<a href="../orders">
						<span class="title">Quản lý đơn hàng</span>
					</a>	
				</li>
				<li>
					<a href="#">
						<span class="title">Đổi mật khẩu</span>
					</a>
				</li>
				<li>
					<a href="../log_out.php">
						<span class="title">Đăng xuất</span>
					</a>
				</li>
			</ul>
		</div>
		<div class="main">
			<div class="topbar">
				<div class="toggle"></div>
				<div class="name_staff">
					<p>Xin chào, <b><?php echo $name ?></b></p>
				</div>
				<div class="search">
					<label>
						<input type="text" placeholder="Tìm kiếm tại đây">
					</label>
				</div>
				<div class="user">
						<img height="60px"  src="../img/user.jpg">
				</div>
			</div>