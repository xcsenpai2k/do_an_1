<?php require '../check_staff.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$category_search = 'products.id';
							$search = '';
							if (isset($_GET['search']) && isset($_GET['category_search']) ) {
								$search = $_GET['search'];
								$category_search = $_GET['category_search'];
								$sql_number_of_rows = "select count(*)
								from (products join manufactures on products.manufactures_id = manufactures.id)
								join category on products.category_id = category.id where $category_search like '%$search%' ";
							}else {
								$sql_number_of_rows = "select count(*)
								from (products join manufactures on products.manufactures_id = manufactures.id)
								join category on products.category_id = category.id ";
								
							}
							require '../pagination/pagination_process.php';	

							
							if (isset($_GET['search']) && isset($_GET['category_search']) ) {
								$search = $_GET['search'];
								$category_search = $_GET['category_search'];
								$sql = "select products.*,manufactures.name as manufactures_name, category.name as category_name
								from (products join manufactures on products.manufactures_id = manufactures.id)
								join category on products.category_id = category.id 
								where $category_search like '%$search%' limit $number_of_rows_on_pages offset $offset ";
							}else {
								$sql = "select products.*,manufactures.name as manufactures_name, category.name as category_name
								from (products join manufactures on products.manufactures_id = manufactures.id)
								join category on products.category_id = category.id limit $number_of_rows_on_pages offset $offset  ";
								
							}
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
									<?php 
										switch ($category_search) {
											case '': ?>
												<option value="products.id">Mã</option>
												<option value="products.name">Tên</option>
												<option value="category.name">Thể loại</option>
												<option value="manufactures.name">Nhà sản xuất</option>
											<?php  
											break;

											case 'products.id': ?>
												<option selected value="products.id">Mã</option>
												<option value="products.name">Tên</option>
												<option value="category.name">Thể loại</option>
												<option value="manufactures.name">Nhà sản xuất</option>
											<?php  
											break;
											case 'products.name': ?>
												<option value="products.id">Mã</option>
												<option selected value="products.name">Tên</option>
												<option value="category.name">Thể loại</option>
												<option value="manufactures.name">Nhà sản xuất</option>
											<?php  
											break;
											case 'category.name': ?>
												<option value="products.id">Mã</option>
												<option value="products.name">Tên</option>
												<option selected value="category.name">Thể loại</option>
												<option value="manufactures.name">Nhà sản xuất</option>
											<?php  
											break;
											case 'manufactures.name': ?>
												<option value="products.id">Mã</option>
												<option value="products.name">Tên</option>
												<option value="category.name">Thể loại</option>
												<option selected value="manufactures.name">Nhà sản xuất</option>
											<?php
											break;
										}
									?>
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
							<th>Tên</th>
							<th>Mô tả</th>
							<th>ảnh</th>
							<th>Giá sản phẩm</th>
							<th>Thể loại</th>
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
								<td><?php echo $each['category_name'] ?></td>
								<td><?php echo $each['manufactures_name'] ?></td>
								<td>
									<a class="table_update" href="form_update.php?id=<?php echo $each['id'] ?>">Sửa</a>
								</td>
								<td>
									<a class="table_update" onclick="return confirm('bạn chắc chắn xoá sản phẩm này chứ ?')" href="delete.php?id=<?php echo $each['id'] ?>">Xoá</a>
								</td>
							</tr>
						<?php endforeach ?>
					</table>
					<?php require '../pagination/pagination_display.php' ?>
				</div>
			</div>
			<?php require '../footer.php' ?>