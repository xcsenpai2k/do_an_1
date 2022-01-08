<?php require '../check_admin.php' ?>
<?php require '../header_admin.php' ?>			
<div class="details">
	<div class="recentOrder">
		<div class="table_header">
			<h1>Thêm nhà sản xuất mới</h1>
		</div>
		<?php
			require '../notification.php';
		?>
		<div class="form_insert" >
			<form action="process_insert.php" method="post" style="width: 700px; padding-left: 400px;" >
				<p>Tên nhà sản xuất</p>
				<input id="name" type="text" name="name" >
				<br>
				<span style="color: red;" id="name_error"></span>
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
				<button type="submit" onclick="return check_form()" style="width: 20%; margin-left: 20px; ">
					<b>Thêm</b>
				</button>
			</form>	
			<script type="text/javascript">
			function check_form() {
				let check_value = false;
				let name = document.getElementById('name').value;
				if (name.length === 0) {
					document.getElementById('name_error').innerHTML = 'Bạn chưa nhập tên sản phẩm ';
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
	<?php require '../footer.php' ?>
