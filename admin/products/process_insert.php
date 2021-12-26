<?php 
	require '../check_staff.php';
	require '../db/connect.php';

	if(empty($_POST['name']) || empty($_FILES['photo']) || empty($_POST['price'])
	 || empty($_POST['description']) || empty($_POST['producer_id']) ) {
		header('location: form_insert.php?error=Bạn cần phải điền đầy đủ thông tin!');
		exit;
	}

	$name = $_POST['name'];
	$photo = $_FILES['photo'];
	$price = $_POST['price'];
	$description = $_POST['description'];
	$producer_id = $_POST['producer_id'];


	$folder = 'photos/';
	$file_extension = explode('.', $photo['name'])[1];
	$file_name = time() . '.' . $file_extension;
	$path_file = $folder . $file_name;

	move_uploaded_file($photo["tmp_name"], $path_file); 

	$sql = "insert into product(name,description,photo,price,producer_id)
	values('$name','$description','$file_name','$price','$producer_id')";

	mysqli_query($connect,$sql);
	require '../db/close.php';
	header('location: index.php?success=thêm sản phẩm thành công!');


