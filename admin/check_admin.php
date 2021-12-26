<?php 
session_start();
if(empty($_SESSION['level'])) {
	header('location: ../root?error=Bạn không có quyền xoá sản phẩm! Đăng nhập tài khoản admin để thực hiện chức năng này.');
	exit;
}	