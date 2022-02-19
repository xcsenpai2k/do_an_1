<?php 

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$gender = $_POST['gender'];
$birthday = $_POST['birthday'];
$phone_number = $_POST['phone_number'];
$address = $_POST['address'];

if(empty($name) || empty($email) || empty($password) ||empty($gender) ||empty($birthday) || empty($phone_number) ||empty($address)){
	header('location:signup.php?error=Bạn cần phải điền đầy đủ thông tin!');
		exit;
}

require 'connect.php';
$sql = "select count(*) from customers
where email = '$email'";

$result=mysqli_query($connect,$sql);

$number_rows = mysqli_fetch_array($result)['count(*)'];

if($number_rows == 1){
	session_start();
	$_SESSION['error'] = 'Trung email roi';
	header('location:signup.php?error=Trùng email');
	exit();
}

$sql = "insert into customers(name,email,password,gender,date,phone_number,address) 
values('$name','$email','$password','$gender','$birthday','$phone_number','$address')";
mysqli_query($connect,$sql);

$sql = "select id from customers
where email = '$email'";
$result=mysqli_query($connect,$sql);
$id = mysqli_fetch_array($result)['id'];
session_start();
$_SESSION['id'] = $id;
$_SESSION['name'] = $name;


mysqli_close($connect);
