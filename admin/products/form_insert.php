<?php require '../check_staff.php' ?>
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
		$sql = "select * from producer";
		$result = mysqli_query($connect,$sql);
	?>
	<div class="form_insert">
		<h1>Thêm sản phẩm mới</h1>
		<form action="process_insert.php" method="post" enctype="multipart/form-data">
			<p>Tên sản phẩm</p>
			<input type="text" name="name" >
			<p>Mô tả</p>
			<textarea name="description"></textarea>
			<p>Ảnh sản phẩm</p>
			<input type="file" name="photo" >
			<p>Giá sản phẩm</p>
			<input type="text" name="price" >
			<p>Nhà sản xuất</p>
			<select name="producer_id">	
				<?php foreach ($result as $each): ?>
					<option value="<?php echo $each['id'] ?>">
						<?php echo $each['name'] ?>
					</option>
				<?php endforeach ?>
					
			</select>
			<button type="submit">Thêm</button>

		</form>	
	</div>
	<?php require '../db/close.php' ?>
</body>
</html>