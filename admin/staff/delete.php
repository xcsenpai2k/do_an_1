<?php 
require '../check_admin.php';
require '../db/connect.php';

if(empty($_GET['id'])) {
	header('location: index.php?error=Bạn phải truyền mã để xoá nhân viên!');
	exit;
}
$id = $_GET['id'];

$sql = "delete from staff where id = '$id' ";

mysqli_query($connect,$sql);
require '../db/close.php';

header('location: index.php?success=Bạn xoá nhân viên thành công!');