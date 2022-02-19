                       
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="mainstyle.css">
     <title>Website - Giao hàng</title>
 </head>
 <body>
 <?php
  include 'navbar.php';
  $sum = 0;
  $id = $_SESSION['id'];
  $cart = $_SESSION['cart'];
  $sql = "select * from customers where id = '$id'";
  $result = mysqli_query($connect,$sql);
  $each = mysqli_fetch_array($result);

 ?>
 <!-- -------------------------Delivery---------------- -->
 <section class="delivery">
     <div class="container">
        <div class="delivery-top-wrap">
            <div class="delivery-top">
                <div class="delivery-top-delivery delivery-top-item">
                   <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="delivery-top-adress delivery-top-item">
                   <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="delivery-top-payment delivery-top-item">
                   <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
         </div>
     </div>
     <div class="container">
         <div class="delivery-content row">
             <div class="delivery-content-left">
                <p>Vui lòng chọn địa chỉ giao hàng</p>
                <div class="delivery-content-left-dangnhap row">

                    <p></p>
                </div>
                <form method="post" action="process_checkout">
                <div class="delivery-content-left-input-top row">
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Họ tên <span style="color: red;">*</span></label>
                        <input type="text" name="name_receiver" value='<?php echo $each['name']; ?>'>
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Điện thoại <span style="color: red;">*</span></label>
                        <input type="text" name="phone_receiver" value='<?php echo $each['phone_number']; ?>'>
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Địa chỉ <span style="color: red;">*</span></label>
                        <input type="text" name="address_receiver" value='<?php echo $each['address']; ?>'>
                    </div>
                    <div class="delivery-content-left-input-top-item">
                        <label for="">Email <span style="color: red;">*</span></label>
                        <input type="text" name="email_receiver" value='<?php echo $each['email']; ?>'>
                    </div>
                </div>
                </form>                
              <div class="delivery-content-left-button row">
                <a href="cart.php"><span>«</span><p>Quay lại giỏ hàng</p></a>
                <button><p style="font-weight: bold;"><a href="payment.php">THANH TOÁN VÀ GIAO HÀNG</a></p></button>
              </div>
             </div>
             <div class="delivery-content-right">
                <table>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    <?php foreach ($cart as $id => $each): ?> 
                    <tr>
                        <td><?php echo $each['name']; ?></td>
                        <td><?php echo $each['quantity']; ?></td>
                        <td><p>
                        <?php
                            $result = $each['price'] * $each['quantity'];
                            echo $result;
                            $sum+=$result;
                        ?> <sup>đ</sup></p></td>
                    </tr>>
                    <?php endforeach ?>
                    <tr>
                        <td style="font-weight: bold;" colspan="2">Tổng</td>
                        <td style="font-weight: bold;"><p><?php echo $sum; ?> <sup>đ</sup></p></td>
                    </tr>
                    <tr>
                       <td style="font-weight: bold;" colspan="2">Thuế VAT</td>
                       <td style="font-weight: bold;"><p><?php $vat = $sum * 10 / 100; echo $vat;?> <sup>đ</sup></p></td>
                   </tr>
                   <tr>
                       <td style="font-weight: bold;" colspan="2">Tổng tiền hàng</td>
                       <td style="font-weight: bold;"><p><?php echo ($sum+$vat); ?><sup>đ</sup></p></td>
                   </tr>
                </table>
           </div>
         </div>
       
     </div>
 </section>
 
 <!-- Footer-->
 <?php include 'footer.php' ?>


<script src="script.js"></script>



</body>
</html>                      