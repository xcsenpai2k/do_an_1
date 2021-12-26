<?php  
	session_start();
	$email = $_POST['email'];
	$password = $_POST['password'];


	require 'db/connect.php';
	$sql = "select * from staff 
	where email = '$email' and password = '$password' ";

	$result = mysqli_query($connect,$sql);

	$numbers_rows = mysqli_num_rows($result);


	if ($numbers_rows == 1 ) {

		$each = mysqli_fetch_array($result);
		$_SESSION['id'] = $each['id'];
		$_SESSION['name'] = $each['name'];
		$_SESSION['level'] = $each['level'];
		header('location: root?error=đăng nhập thành công');
		exit;	
		
		}else {
			header('location: index.php?error=Bạn nhập sai email hoặc mật khẩu');
			exit;
	}

	require 'db/close.php';