<?php 
	require '../check_admin.php';
	require '../db/connect.php';

	if(empty($_POST['name'])) {
		header('location: form_insert.php?error=Bạn cần phải điền đầy đủ thông tin!');
		exit;
	}

	$name = $_POST['name'];
	$sql = "insert into manufactures(name)
	values('$name')";

	mysqli_query($connect,$sql);
	require '../db/close.php';
	header('location: index.php?success=thêm nhà sản xuất thành công!');