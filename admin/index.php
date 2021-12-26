<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login_css.css">
	<title></title>
</head>
<body>
	<?php 
		$error = '';
		if(isset($_GET['error'])) {
			$error = $_GET['error'];
		}
	?>
	<div class="form_login">
		<h1>Đăng nhập admin</h1>
		<form action="process_login_admin.php" method="post">
			<p>Email</p>
			<input type="text" name="email" placeholder="email">
			<p>Password</p>
			<input type="password" name="password" placeholder="password">
			<span style="color: red;"><?php echo $error ?></span>
			<button type="submit">Đăng nhập</button>

		</form>	
	</div>
	
</body>
</html>