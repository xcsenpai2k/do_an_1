<?php 
	require '../check_admin.php';
	require '../db/connect.php';

	if(empty($_POST['name']) || empty($_POST['phone_number']) || empty($_POST['address'])
	 || empty($_POST['gender']) || empty($_POST['date']) || empty($_POST['email']) || empty($_POST['password'])) {
		header('location: form_insert.php?error=Bạn cần phải điền đầy đủ thông tin!');
		exit;
	}

	$name = $_POST['name'];
	$phone_number = $_POST['phone_number'];
	$address = $_POST['address'];
	$gender = $_POST['gender'];
	$date = $_POST['date'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$level = $_POST['level'];

	$sql = "insert into staff(name,phone_number,address,gender,date,email,password,level)
	values('$name','$phone_number','$address','$gender','$date','$email','$password','$level')";
	mysqli_query($connect,$sql);
	require '../db/close.php';
	header('location: index.php?success=thêm nhân viên thành công!');