<?php require '../check_admin.php' ?>
<?php require '../header_admin.php' ?>			
			<div class="details">
				<div class="recentOrder">
					<div class="table_header">
						<?php
							require '../db/connect.php';
							$category_search = 'id';
							$search = '';
							if (isset($_GET['search']) && isset($_GET['category_search']) ) {
								$search = $_GET['search'];
								$category_search = $_GET['category_search'];
								$sql_number_of_rows = "select count(*)
								from manufactures where $category_search like '%$search%' ";
							}else {
								$sql_number_of_rows = "select count(*) from manufactures  ";
								
							}
							require '../pagination/pagination_process.php';	

							if (isset($_GET['search']) && isset($_GET['category_search']) ) {
								$search = $_GET['search'];
								$category_search = $_GET['category_search'];
								$sql = "select * from manufactures where $category_search like '%$search%' limit $number_of_rows_on_pages offset $offset ";
							}else {
								$sql = "select * from manufactures limit $number_of_rows_on_pages offset $offset ";
							}
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
												<option value="id">Mã</option>
												<option value="name">Tên nhà sản xuất</option>
											<?php  
											break;

											case 'id': ?>
												<option selected value="id">Mã</option>
												<option value="name">Tên nhà sản xuất</option>
											<?php  
											break;
											case 'name': ?>
												<option value="id">Mã</option>
												<option selected value="name">Tên nhà sản xuất</option>
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
					<?php require '../pagination/pagination_display.php' ?>
				</div>
			</div>
			<?php require '../footer.php' ?>