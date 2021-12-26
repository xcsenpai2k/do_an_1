<?php require '../check_admin.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$sql = "select * from producer ";
							$result = mysqli_query($connect,$sql); 
						?>
						<h1>Danh sách sản phẩm</h1>
						<?php require '../notification.php' ?>
						<a href="form_insert.php">
							<b>
								Thêm nhà sản xuất
							</b>
						</a>
					</div>
					<table class="table_values" width="100%" border="1">
						<tr>
							<th>Mã</th>
							<th>Tên</th>
							<th>Sửa</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<tr class="table_tr">
								<td><?php echo $each['id'] ?></td>
								<td><?php echo $each['name'] ?></td>
								<td>
									<a class="table_update" href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php require '../footer.php' ?>