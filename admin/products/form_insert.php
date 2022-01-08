<?php require '../check_staff.php'; ?>
<?php require '../header_admin.php' ?>			
<div class="details">
	<div class="recentOrder">
		<div class="table_header">
			<h1>Thêm sản phẩm mới</h1>
		</div>
	<?php
		require '../db/connect.php';
		require '../notification.php';
		$sql = "select * from manufactures";
		$result = mysqli_query($connect,$sql);
		$sql1 = "select * from category";
		$result1 = mysqli_query($connect,$sql1);

	?>
	<div class="form_insert" style=" padding-right: 350px;">
		<form action="process_insert.php" method="post" enctype="multipart/form-data" style="width: 700px; padding-left: 200px;">
			<div id="container" style="display: flex;" >
				<div id="right" style="width: 50%;">
					<p>Tên sản phẩm</p>
					<input id="name" type="text" name="name" >
					<br>
					<span style="color: red;" id="name_error"></span>
					<p>Mô tả</p>
					<textarea id="description" name="description"></textarea>
					<br>
					<span style="color: red;" id="description_error"></span>
					<p>Ảnh sản phẩm</p>
					<input id="photo" type="file" name="photo" >
					<br>
					<span style="color: red;" id="photo_error"></span>
					<p>Giá sản phẩm</p>
					<input id="price" type="number" name="price" >
					<br>
					<span style="color: red;" id="price_error"></span>
				</div>
				<div id="left" style="padding-left: 40px; width: 50%;">
					<p>Thể loại</p>
					<select id="category" name="category_id">	
						<?php foreach ($result1 as $each1): ?>
							<option value="<?php echo $each1['id'] ?>">
								<?php echo $each1['name'] ?>
							</option>
						<?php endforeach ?>
					
					</select>
					<br>
					<span style="color: red;" id="category_error"></span>
					<p>Nhà sản xuất</p>
					<select name="manufactures_id">	
						<?php foreach ($result as $each): ?>
							<option value="<?php echo $each['id'] ?>">
								<?php echo $each['name'] ?>
							</option>
						<?php endforeach ?>
							
					</select>
				</div>
			</div>
			<br>
			<button type="submit" onclick="return check_form()" style="width: 20%; margin-left: 200px; " >
				<b>Thêm</b>
			</button>
		</form>	
		<script type="text/javascript">
			function check_form() {
				let check_value = false;
				let name = document.getElementById('name').value;
				let description = document.getElementById('description').value;
				let photo = document.getElementById('photo').value;
				let price = document.getElementById('price').value;
				if (name.length === 0) {
					document.getElementById('name_error').innerHTML = 'Bạn chưa nhập tên sản phẩm ';
				check_value = true;
				}
				if (description.length === 0) {
					document.getElementById('description_error').innerHTML = 'Bạn chưa nhập mô tả sản phẩm ';
				check_value = true;
				}
				if (photo.length === 0) {
					document.getElementById('photo_error').innerHTML = 'Bạn chưa thêm ảnh cho sản phẩm';
				check_value = true;
				}
				if (price.length === 0) {
					document.getElementById('price_error').innerHTML = 'Bạn chưa thêm giá cho sản phẩm';
				check_value = true;
				}
				if (check_value) {
					return false;
				}
			}
		</script>
		</div>
	</div>
</div>
	<?php require '../db/close.php' ?>
	<?php require '../footer.php' ?>
