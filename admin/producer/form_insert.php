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
		require '../notification.php';
	?>
	<div class="form_insert">
		<h1>Thêm nhà sản xuất mới</h1>
		<form action="process_insert.php" method="post" >
			<p>Tên nhà sản xuất</p>
			<input type="text" name="name" >
			<button type="submit">Thêm</button>

		</form>	
	</div>
</body>
</html>