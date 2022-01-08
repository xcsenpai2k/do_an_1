<?php 
	require '../check_admin.php';
	require '../db/connect.php';

	if(empty($_POST['id'])) {
		header('location: form_update.php?error=Bạn phải truyền mã để sửa');
		exit;
	}	
	$id = $_POST['id'];
	if(empty($_POST['name']) || empty($_POST['phone_number']) || empty($_POST['address'])
	 || empty($_POST['gender']) || empty($_POST['date']) || empty($_POST['email']) || empty($_POST['password'])) {
		header('location: form_update.php?id='.$id.'&error=Bạn cần phải điền đầy đủ thông tin!');
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


 	$sql = "update staff
 	set
 	name = '$name',
 	phone_number = '$phone_number',
 	address = '$address',
 	gender = '$gender',
 	date ='$date',
 	email = '$email',
 	password = '$password',
 	level = '$level'
 	where id = '$id' " ;

	mysqli_query($connect,$sql);
	require '../db/close.php';
	header('location: index.php?success=Sửa thông tin nhân viên thành công!');