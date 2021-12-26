<?php require '../check_staff.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$sql = "select purchase_order.*,
							customers.name as customers_name,
							customers.phone_number as customers_phone,
							customers.address as customers_address
							from purchase_order join customers 
							on purchase_order.customer_id = customers.id";
							$result = mysqli_query($connect,$sql); 
						?>
						<h1>Danh sách đơn hàng</h1>
						<?php require '../notification.php' ?>
					</div>
					<table class="table_values" width="100%" border="1">
						<tr>
							<th>Mã</th>
							<th>Thời gian đặt</th>
							<th>Thông tin người nhận</th>
							<th>thông tin người đặt</th>
							<th>Trạng thái</th>
							<th>Tổng tiền</th>
							<th>Xem chi tiết</th>
							<th>Sửa</th>
						</tr>
						<?php foreach ($result as $each): ?>
							<tr class="table_tr">
								<td><?php echo $each['id'] ?></td>
								<td><?php echo $each['time_order'] ?></td>
								<td>
									<?php echo $each['receiver_name'] ?>
									<br>
									<?php echo $each['receiver_phone_number'] ?>
									<br>
									<?php echo $each['address'] ?>
								</td>
								<td>
									<?php echo $each['customers_name'] ?>
									<br>
									<?php echo $each['customers_phone'] ?>
									<br>
									<?php echo $each['customers_address'] ?>
								</td>
								<td>
									<?php 
										switch ($each['status']) {
											case '0':
												echo 'Mới đặt';
												break;
											case '1':
												echo 'Đã duyệt';
												break;
											case '2':
												echo 'Đã huỷ';
												break;
											
										}
									?>
								</td>
								<td><?php echo $each['total_price'] ?></td>
								<td>
									<a class="table_update" href="views_order.php?id=<?php echo $each['id'] ?>">Xem</a>
								</td>
								<td>
									<?php
										if($each['status'] == 0){ ?>
											<a class="table_update" href="update.php?id=<?php echo $each['id'] ?>&status=1" onclick="return confirm('bạn chắc chắn duyệt đơn hàng này chứ ?')">Duyệt</a>
											<br>
											<a class="table_update" href="update.php?id=<?php echo $each['id'] ?>&status=2" onclick="return confirm('bạn chắc chắn huỷ đơn hàng này chứ ?')">Huỷ</a>
									<?php }else {
										echo 'Done' ;
										}
									?>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
				</div>
			</div>
			<?php require '../footer.php' ?>