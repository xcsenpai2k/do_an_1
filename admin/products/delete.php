<?php 
require '../check_admin.php';
require '../db/connect.php';

if(empty($_GET['id'])) {
	header('location: index.php?error=Bạn phải truyền mã để xoá sản phẩm!');
	exit;
}
$id = $_GET['id'];

$sql = "delete from product where id = '$id' ";

mysqli_query($connect,$sql);
require '../db/close.php';

header('location: index.php?success=Bạn đã xoá sản phẩm thành công!');