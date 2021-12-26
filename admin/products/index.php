<?php require '../check_staff.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$sql = "select product.*,producer.name as producer_name from product join producer 
							on product.producer_id = producer.id";
							$result = mysqli_query($connect,$sql); 
						?>
						<h1>Danh sách sản phẩm</h1>
						<?php require '../notification.php' ?>
						<a href="form_insert.php">
							<b>
								Thêm sản phẩm
							</b>
						</a>
					</div>
					<table class="table_values" width="100%" border="1">
						<tr>
							<th>Mã</th>
							<th>Tên</th>
							<th>Mô tả</th>
							<th>ảnh</th>
							<th>Giá sản phẩm</th>
							<th>Nhà sản xuất</th>
							<th>Sửa</th>
							<th>Xoá</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<tr class="table_tr">
								<td><?php echo $each['id'] ?></td>
								<td><?php echo $each['name'] ?></td>
								<td><?php echo $each['description'] ?></td>
								<td>
									<img width="50px" src="photos/<?php echo $each['photo'] ?>">
								</td>
								<td><?php echo $each['price'] ?></td>
								<td><?php echo $each['producer_name'] ?></td>
								<td>
									<a class="table_update" href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
								</td>
								<td>
									<a class="table_update" onclick="return confirm('bạn chắc chắn xoá sản phẩm này chứ ?')" href="delete.php?id=<?php echo $each['id'] ?>">Xoá</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php require '../footer.php' ?>