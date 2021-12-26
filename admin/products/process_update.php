<?php 
	require '../check_staff.php';
	require '../db/connect.php';

	if(empty($_POST['id'])) {
		header('location: form_update.php?error=Bạn phải truyền mã để sửa');
		exit;
	}

	if(empty($_POST['name']) || empty($_POST['price'])
	 || empty($_POST['description']) || empty($_POST['producer_id']) ) {
		header('location: form_insert.php?error=Bạn cần phải điền đầy đủ thông tin!');
		exit;
	}
	$id = $_POST['id'];
	$name = $_POST['name'];
	$photo_new = $_FILES['photo_new'];
	$photo_old = $_POST['photo_old'];
	if($photo_new['size'] > 0) {
		$folder = 'photos/';
		$file_extension = explode('.', $photo_new['name'])[1];
		$file_name = time() . '.' . $file_extension;
		$path_file = $folder . $file_name;
		move_uploaded_file($photo_new["tmp_name"], $path_file); 
	}else {
		$file_name = $photo_old;
	}
	$price = $_POST['price'];
	$description = $_POST['description'];
	$producer_id = $_POST['producer_id'];


 	$sql = "update product
 	set
 	name = '$name',
 	description = '$description',
 	photo = '$file_name',
 	price = '$price',
 	producer_id ='$producer_id' where id = '$id' " ;
	

	mysqli_query($connect,$sql);
	require '../db/close.php';
	header('location: index.php?success=Sửa sản phẩm thành công!');