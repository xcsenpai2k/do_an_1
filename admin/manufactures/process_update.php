<?php 
	require '../check_admin.php';
	require '../db/connect.php';

	if(empty($_POST['id'])) {
		header('location: form_update.php?error=Bạn phải truyền mã để sửa');
		exit;
	}
	$id = $_POST['id'];
	if(empty($_POST['name'])) {
		header('location: form_update.php?id='.$id.'&error=Bạn cần phải điền đầy đủ thông tin!');
		exit;
	}
	
	$name = $_POST['name'];
	

 	$sql = "update manufactures
 	set
 	name = '$name'
 	where id = '$id' " ;

	mysqli_query($connect,$sql);
	require '../db/close.php';
	header('location: index.php?success=Sửa nhà sản xuất thành công!');