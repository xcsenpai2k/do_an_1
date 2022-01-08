<?php require '../check_staff.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$category_search = 'purchase_order.id';
							$search = '';
							if (isset($_GET['search']) && isset($_GET['category_search']) ) {
								$search = $_GET['search'];
								$category_search = $_GET['category_search'];
								$sql_number_of_rows = "select count(*)
										from purchase_order join customers 
										on purchase_order.customer_id = customers.id 
										where $category_search like '%$search%' ";
							}else {
								$sql_number_of_rows = "select count(*)
										from purchase_order join customers 
										on purchase_order.customer_id = customers.id ";
								
							}
							require '../pagination/pagination_process.php';	

							if (isset($_GET['search']) && isset($_GET['category_search']) ) {
								$search = $_GET['search'];
								$category_search = $_GET['category_search'];
								$sql = "select purchase_order.*,
										customers.name as customers_name,
										customers.phone_number as customers_phone,
										customers.address as customers_address
										from purchase_order join customers 
										on purchase_order.customer_id = customers.id 
										where $category_search like '%$search%' limit 
										$number_of_rows_on_pages offset $offset ";
							}else {
								$sql = "select purchase_order.*,
										customers.name as customers_name,
										customers.phone_number as customers_phone,
										customers.address as customers_address
										from purchase_order join customers 
										on purchase_order.customer_id = customers.id 
										limit $number_of_rows_on_pages offset $offset";
							}
							$result = mysqli_query($connect,$sql); 
						?>
						<h1>Danh sách đơn hàng</h1>
						<?php require '../notification.php' ?>
					</div>
					<form>
						<div style="display: flex;">
							<div style="margin-left: 150px;">
								<label style="padding-right: 10px;">
									<b>Tìm kiếm</b>
								</label>
								<input type="text" name="search" value="<?php echo $search ?>">
							</div>
							<div style="margin-left: 50px;  margin-right: 40px;">
								<label style="padding-right: 10px;">
									<b>Danh mục tìm kiếm</b>
								</label>
								<select name="category_search">
									<?php if($category_search == '') { ?>
										<option value="purchase_order.id">Mã</option>
									<?php }else{ ?>
										<option selected value="purchase_order.id">Mã</option>
									<?php } ?>
									<option value="purchase_order.id">Mã</option>
								</select>
							</div>
							<button type="submit">
								tìm kiếm
							</button>
						</div>
					</form>
					<br>
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
					<?php require '../pagination/pagination_display.php' ?>
				</div>
			</div>
			<?php require '../footer.php' ?>