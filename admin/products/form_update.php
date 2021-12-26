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
	<div class="form_insert">
		<h1>Sửa thông tin sản phẩm</h1>
		<?php 
			require '../notification.php';
			if(empty($_GET['id'])) {
				header('location: index.php?error=Bạn chưa truyền mã để sửa!');
				exit;
			}
			$id = $_GET['id'];
			require '../db/connect.php';
			$sql = "select * from product where id = '$id' ";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);
			$sql = "select * from producer";
			$producers = mysqli_query($connect,$sql);

		?>
		
		<form action="process_update.php" method="post" enctype="multipart/form-data">
			<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
			<p>Tên sản phẩm</p>
			<input type="text" name="name" value="<?php echo $each['name'] ?>" >
			<p>Mô tả</p>
			<textarea name="description"><?php echo $each['description']; ?></textarea>
			<p>Ảnh hiện tại của sản phẩm</p>
			<img src="photos/<?php echo $each['photo'] ?>">
			<input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>" >
			<p>Đổi ảnh mới cho sản phẩm</p>
			<input type="file" name="photo_new" >
			<p>Giá sản phẩm</p>
			<input type="text" name="price" value="<?php echo $each['price'] ?>" >
			<p>Nhà sản xuất</p>
			<select name="producer_id">	
				<?php foreach ($producers as $producer): ?>
					<option value="<?php echo $producer['id'] ?>"
						<?php
							if($each['producer_id'] == $producer['id']){ ?>
								selected
						<?php } ?>
					>
						<?php echo $producer['name'] ?>
					</option>
				<?php endforeach ?>
					
			</select>
			<button type="submit">Sửa</button>

		</form>	
		<?php require '../db/close.php' ?>
	</div>
</body>
</html>