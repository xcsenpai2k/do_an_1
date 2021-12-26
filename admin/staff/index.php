<?php require '../check_admin.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$sql = "select * from staff";
							$result = mysqli_query($connect,$sql); 
						?>
						<h1>Danh sách nhân viên</h1>
						<?php require '../notification.php' ?>
						<a href="form_insert.php">
							<b>
								Thêm nhân viên
							</b>
						</a>
					</div>
					<table class="table_values" width="100%" border="1">
						<tr>
							<th>Mã</th>
							<th>Tên nhân viên</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Giới tính</th>
							<th>ngày sinh</th>
							<th>Email</th>
							<th>Password</th>
							<th>Level</th>
							<th>Sửa</th>
							<th>Xoá</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<tr class="table_tr">
								<td><?php echo $each['id'] ?></td>
								<td><?php echo $each['name'] ?></td>
								<td><?php echo $each['phone_number'] ?></td>
								<td><?php echo $each['address'] ?></td>
								<td><?php echo $each['gender'] ?></td>
								<td><?php echo $each['date'] ?></td>
								<td><?php echo $each['email'] ?></td>
								<td><?php echo $each['password'] ?></td>
								<td>
									<?php
										if($each['level'] == 1) {
											echo 'admin';
										}elseif($each['level'] == 0) {
											echo 'Nhân viên';
										}
									?>
								</td>
								<td>
									<a class="table_update" href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
								</td>
								<td>
									<a class="table_update" onclick="return confirm('bạn chắc chắn xoá nhân viên này chứ ?')" href="delete.php?id=<?php echo $each['id'] ?>">Xoá</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php require '../footer.php' ?>