<?php require '../check_staff.php'; ?>
<?php require '../header_admin.php' ?>			
<div class="details">
	<div class="recentOrder">
		<div class="table_header">
			<h1>Thêm sản phẩm mới</h1>
		</div>
	<div class="form_insert" style=" padding-right: 350px;">
		<?php 
			require '../notification.php';
			if(empty($_GET['id'])) {
				header('location: index.php?error=Bạn chưa truyền mã để sửa!');
				exit;
			}
			$id = $_GET['id'];
			require '../db/connect.php';
			$sql = "select * from products where id = '$id' ";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);
			$sql = "select * from manufactures";
			$manufactures = mysqli_query($connect,$sql);
			$sql = "select * from category";
			$categorys = mysqli_query($connect,$sql);
		?>
		
		<form action="process_update.php" method="post" enctype="multipart/form-data" style="width: 700px; padding-left: 200px;">
			<div id="container" style="display: flex;">
				<div id="right" style="width: 50%;">
					<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
					<p>Tên sản phẩm</p>
					<input id="name" type="text" name="name" value="<?php echo $each['name'] ?>" >
					<p>Mô tả</p>
					<textarea id="description" name="description"><?php echo $each['description']; ?></textarea>
					<p>Ảnh hiện tại của sản phẩm</p>
					<img width="120px" src="photos/<?php echo $each['photo'] ?>">
					<input type="hidden" name="photo_old" value="<?php echo $each['photo'] ?>" >
					<p>Đổi ảnh mới cho sản phẩm</p>
					<input id="photo" type="file" name="photo_new" >
				</div>
				<div id="left" style="padding-left: 40px; width: 50%;">
					<p>Giá sản phẩm</p>
					<input type="text" name="price" value="<?php echo $each['price'] ?>" >
					<p>Thể loại</p>
					<select name="category_id">	
						<?php foreach ($categorys as $category): ?>
							<option value="<?php echo $category['id'] ?>"
								<?php
									if($each['category_id'] == $category['id']){ ?>
										selected
								<?php } ?>
							>
								<?php echo $category['name'] ?>
							</option>
						<?php endforeach ?>
					</select>
					<p>Nhà sản xuất</p>
					<select name="manufactures_id">	
						<?php foreach ($manufactures as $manufacture): ?>
							<option value="<?php echo $manufacture['id'] ?>"
								<?php
									if($each['manufactures_id'] == $manufacture['id']){ ?>
										selected
								<?php } ?>
							>
								<?php echo $manufacture['name'] ?>
							</option>
						<?php endforeach ?>
					</select>
				</div>
			</div>	
	 		<br>
			<button type="button" onclick="return check_form()" style="width: 20%; margin-left: 400px;">
				<b>Sửa</b>
			</button>
		</form>
		</div>
	</div>
</div>
	<?php require '../db/close.php' ?>
	<?php require '../footer.php' ?>