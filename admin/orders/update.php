<?php 
	require '../check_staff.php';
	require '../db/connect.php';

	if(isset($_GET['id']) && isset($_GET['status'])) {
			$id = $_GET['id'];
			$status = $_GET['status'];	
	}else{
		header('location: index.php?error=Bạn phải truyền mã và trạng thái để sửa');
		exit;
	}


	$sql = "update purchase_order set status = $status where id = '$id' ";
	mysqli_query($connect,$sql);
	header('location: index.php?success=Cập nhật trạng thái đơn hàng thành công');
