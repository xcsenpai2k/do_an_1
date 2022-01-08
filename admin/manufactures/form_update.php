<?php require '../check_admin.php' ?>
<?php require '../header_admin.php' ?>			
<div class="details">
	<div class="recentOrder">
		<div class="table_header">
			<h1>Sửa thông tin nhà sản xuất</h1>
		</div>
	<div class="form_insert">
		<?php 
			require '../notification.php';
			if(empty($_GET['id'])) {
				header('location: index.php?error=Bạn chưa truyền mã để sửa!');
				exit;
			}
			$id = $_GET['id'];
			require '../db/connect.php';
			$sql = "select * from manufactures where id = '$id' ";
			$result = mysqli_query($connect,$sql);
			$each = mysqli_fetch_array($result);

		?>
		
		<form action="process_update.php" method="post" style="width: 700px; padding-left: 400px;">
			<input type="hidden" name="id" value="<?php echo $each['id'] ?>">
			<p>Tên sản phẩm</p>
			<input type="text" name="name" value="<?php echo $each['name'] ?>" >
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>	
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<button type="submit" style="width: 20%; margin-left: 20px; ">
					<b>Sửa</b>
				</button>
			</form>	
		</div>
	</div>
</div>	
	<?php require '../db/close.php' ?>
	<?php require '../footer.php' ?>

