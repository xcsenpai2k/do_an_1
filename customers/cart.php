 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
     <link rel="stylesheet" href="mainstyle.css">
     <title>Website - Giỏ hàng</title>
 </head>
 <body>
     <?php include 'navbar.php' ?>
     <?php 
        $cart = $_SESSION['cart'];
        $sum=0;
        $tsl=0;
        require 'connect.php';
     ?>
 <!--cart-->
 <section class="cart">
     <div class="container">
         <div class="cart-top-wrap">
            <div class="cart-top">
                <div class="cart-top-cart cart-top-item">
                   <i class="fas fa-shopping-cart"></i>
                </div>
                <div class="cart-top-adress cart-top-item">
                   <i class="fas fa-map-marker-alt "></i>
                </div>
                <div class="cart-top-payment cart-top-item">
                   <i class="fas fa-money-check-alt"></i>
                </div>
            </div>
         </div>
     </div>
     <div class="container">
         <div class="cart-content row">
             <div class="cart-content-left">
                <table>
                    <tr>
                        <th>Sản phẩm</th>
                        <th>Tên sản phẩm</th>
                        <th>Màu</th>
                        <th>Size</th>
                        <th>SL</th>
                        <th>Thành tiền</th>
                        <th>Xóa</th>
                    </tr>

                    <?php foreach ($cart as $id => $each): ?>
                    <tr>
                        <td><img src="photo/<?php echo $each['photo'] ?>" alt=""></td>
                        <td><p><?php echo $each['name'] ?></p></td>
                        <td><img src="photo/spcolor.png" alt=""></td>
                        <td><p>L</p></td>
                        <td>
                            <a href = "update_quantity_in_cart.php?id=<?php echo $id ?>&type=dec">
                                -
                            </a>
                            <?php echo $each['quantity'] ?>
                            <a href = "update_quantity_in_cart.php?id=<?php echo $id ?>&type=inc">
                                +
                            </a>
                            <?php $tsl+=$each['quantity']; ?>
                        </td>
                        <td><p>
                        <?php
                            $result = $each['price'] * $each['quantity'];
                            echo $result;
                            $sum+=$result;
                        ?> <sup>đ</sup></p></td>
                        <td><a href="delete_from_cart.php?id=<?php echo $id ?>">X</a></td>
                    </tr>
                    <?php endforeach ?>
                </table>
             </div>
             <div class="cart-content-right">
                 <table>
                     <tr>
                         <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
                     </tr>
                     <tr>
                         <td>TỔNG SẢN PHẨM</td>
                         <td><?php echo $tsl?></td>
                     </tr>
                     <tr>
                         <td>TỔNG TIỀN HÀNG</td>
                         <td><p><?php echo $sum ?><sup>đ</sup></p></td>
                     </tr>
                     <tr>
                         <td>TẠM TÍNH</td>
                         <td><p style="color: black; font-weight: bold;"><?php echo $sum ?> <sup>đ</sup></p></td>
                     </tr>
                 </table>
                 
                 <div class="cart-content-right-text">
                     <p>Bạn sẽ được miễn phí ship khi đơn hàng của bạn có tổng giá trị trên 2.000.000 đ</p>
                     
                 </div>
                 <div class="cart-content-right-button">
                     <button><a href="index.php">TIẾP TỤC MUA SẮM</a></button>
                     <button><a href="delivery.php">THANH TOÁN</a></button>
                 </div>
                 <!-- <div class="cart-content-right-dangnhap">
                     <p>TÀI KHOẢN IVY</p> <br>
                     <p>Hãy <a href=""><!-- Đăng nhập --></a><!-- tài khoản của bạn để tích điểm thành viên --></p>
                    
                 </div> -->
            </div>
         </div>
     </div>
 </section>
 
 <!-- Footer-->
 <?php include 'footer.php' ?>

<script src="script.js"></script>



</body>
</html>                      