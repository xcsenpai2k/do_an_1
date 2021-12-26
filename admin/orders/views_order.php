<?php require '../check_staff.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/invoice.css">
	<title></title>
</head>
<body>
	<?php 
		require '../db/connect.php';

		if(empty($_GET['id'])) {
			header('location: index.php?error=Bạn phải truyền mã để xem hoá đơn!');
			exit;
	}
		$id = $_GET['id'];

		$sum = 0;
		$sql = "SELECT c.name as customers_name,
		   c.phone_number as customers_phone,
	       c.address as customers_address,
	       p.id,
	       p.receiver_name as receiver_name,
	       p.receiver_phone_number as receiver_phone,
	       p.address as receiver_address,
	       d.quantily as product_quantily,
	       i.name as product_name,
	       i.price as product_price
	       FROM (((customers c INNER JOIN purchase_order p ON c.id = p.customer_id)
	              INNER JOIN purchase_order_details d ON p.id = d.purchase_order_id)
	              INNER JOIN product i ON d.product_id = i.id)
	       WHERE p.id = '$id'";

	       $result = mysqli_query($connect,$sql);
	       $each = mysqli_fetch_array($result);

	?>
	<div class="invoice-box">
		<p><b>Chi tiết hoá đơn</b></p>
		<table cellpadding="0" cellspacing="0" width="100%">
			<tr>
				<td  style="padding-bottom: 40px;">
					<b>
						Thông tin người đặt:
					</b>
					<br>
					<br>
						<?php echo $each['customers_name'] ?>
						<br>
						<?php echo $each['customers_phone'] ?>
						<br>
						<?php echo $each['customers_address'] ?>
				</td>
				<td style="text-align: right; padding-bottom: 40px;" >
					<b>
						Thông tin người nhận:
					</b>
					<br>
					<br>
						<?php echo $each['receiver_name'] ?>
						<br>
						<?php echo $each['receiver_phone'] ?>
						<br>
						<?php echo $each['receiver_address'] ?>
				</td>
			</tr>
			<tr>
				<td style="padding-bottom: 20px;">
					<b>Danh sách sản phẩm</b>
				</td>
			</tr>
			
			<tr>
				<table width="100%">
					<tr style="text-align: center;">
						<td class="heading">Tên sản phẩm</td>
						<td class="heading">Số lượng</td>
						<td class="heading">Giá</td>
						<td class="heading">Tổng tiền</td>
					</tr>
					<?php foreach ($result as $each1): ?>
						<tr style="text-align: center; ">
							<td class="item"><?php echo $each1['product_name'] ?></td>
							<td class="item"><?php echo $each1['product_quantily'] ?></td>
							<td class="item"><?php echo $each1['product_price'] ?></td>
							<td class="item">
								<?php 
									$sum1 = $each1['product_quantily'] * $each1['product_price'];
									echo $sum1;
									$sum += $sum1;
								?>
							</td>
						</tr>
					<?php endforeach ?>
				</table>
			</tr>
			<br>
			<br>
			<br>
			<br>
			<tr>
				<td><b style="font-size: 20px;">Tổng tiền hoá đơn</b></td>
				<br>
				<td style="margin-left: 20px;"><?php echo $sum ?> VNĐ</td>
			</tr>
		</table>
		<?php require '../db/close.php' ?>
	</div>
</body>
</html>