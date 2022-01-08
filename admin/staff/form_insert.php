<?php require '../check_admin.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<h1>Thêm nhân viên mới</h1>
					</div>
					<?php
						require '../db/connect.php';
						require '../notification.php';
					?>
					<div class="form_insert" style=" padding-right: 350px;">
						<form action="process_insert.php" method="post" style="width: 700px; padding-left: 200px;">
							<div id="container" style="display: flex;">
								<div id="right" style="width: 50%;">
									<p>Tên nhân viên</p>
									<input id="name" type="text" name="name">
									<br>
									<span style="color: red;" id="name_error"></span>
									<p>Số điện thoại</p>
									<input id="phone_number" type="number" name="phone_number">
									<br>
									<span style="color: red;" id="phone_error"></span>
									<p>Địa chỉ</p>
									<textarea id="address" name="address"></textarea>
									<br>
									<span style="color: red;" id="address_error"></span>
									<p>Giới tính</p>
									<input id="gender" type="text" name="gender">
									<br>
									<span style="color: red;" id="gender_error"></span>
									<p>ngày sinh</p>
									<input id="date" type="date" name="date">
									<br>
									<span style="color: red;" id="date_error"></span>
								</div>
								<div id="left" style="padding-left: 40px; width: 50%;">
									<p>Email</p>
									<input id="email" type="text" name="email">
									<br>
									<span style="color: red;" id="email_error"></span>
									<p>Password</p>
									<input id="password" type="text" name="password">
									<br>
									<span style="color: red;" id="password_error"></span>
									<p>Cấp độ</p>
									<select name="level">
										<option value="0">Nhân viên</option>
										<option value="1">Admin</option>
									</select>
								</div>
							</div>
							<br>
							<button type="submit" onclick="return check_form()" style="width: 20%; margin-left: 220px;">
								<b>Thêm</b>
							</button>
						</form>	
						<script type="text/javascript">
			function check_form() {
				let check_value = false;
				let name = document.getElementById('name').value;
				let phone = document.getElementById('phone_number').value;
				let address = document.getElementById('address').value;
				let gender = document.getElementById('gender').value;
				let date = document.getElementById('date').value;
				let email = document.getElementById('email').value;
				let password = document.getElementById('password').value;

				if (name.length === 0) {
					document.getElementById('name_error').innerHTML = 'Bạn chưa nhập tên sản phẩm ';
				check_value = true;
				}
				if (phone.length === 0) {
					document.getElementById('phone_error').innerHTML = 'Bạn chưa nhập số điện thoại nhân viên ';
				check_value = true;
				}
				if (address.length === 0) {
					document.getElementById('address_error').innerHTML = 'Bạn chưa nhập địa chỉ cho nhân viên';
				check_value = true;
				}
				if (gender.length === 0) {
					document.getElementById('gender_error').innerHTML = 'Bạn chưa nhập giới tính cho nhân viên';
				check_value = true;
				}
				if (date.length === 0) {
					document.getElementById('date_error').innerHTML = 'Bạn chưa nhập ngày sinh cho nhân viên';
				check_value = true;
				}
				if (email.length === 0) {
					document.getElementById('email_error').innerHTML = 'Bạn chưa nhập email cho nhân viên';
				check_value = true;
				}
				if (password.length === 0) {
					document.getElementById('password_error').innerHTML = 'Bạn chưa nhập mật khẩu cho nhân viên';
				check_value = true;
				}
				if (check_value) {
					return false;
				}
			}
		</script>
					</div>
					<?php require '../db/close.php' ?>
				</div>
			</div>
				<?php require '../footer.php' ?>


