<?php 
$email_receiver = $_POST['email_receiver'];
$name_receiver = $_POST['name_receiver'];
$address_receiver = $_POST['address_receiver'];
$phone_receiver = $_POST['phone_receiver'];

require 'connect.php';
session_start();

$cart = $_SESSION['cart'];
$total_price = 0;
foreach ($cart as $each) {
	$total_price += $each['quantity'] * $each['price'];
}
$customer_id = $_SESSION['id'];
$status = 0; //moi dat


$sql = "insert into purchase_order(customer_id,  receiver_name, receiver_phone_number, address, status, total_price)
values('$customer_id', '$receiver_name', '$receiver_phone_number', '$address', '$status', '$total_price');"
die($sql);