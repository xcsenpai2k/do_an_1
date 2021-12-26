<?php 

session_start();
if(!isset($_SESSION['level'])) {
	header('location: ../index.php?error=Bạn phải đăng nhập thì mới sử dụng được chức năng này!');
	exit;
}