<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="mainstyle.css">
    <title>Website - Ivy</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <?php
        require 'connect.php';
        $id=$_GET['id'];
        $sql = "select * from products where id='$id'";
        $result = mysqli_query($connect,$sql); 
        $each = mysqli_fetch_array($result);
    ?>
    <!--Product-->
    <section class="product">
        <div class="container">
            <div class="product-top row">
                <p>Trang chủ</p> <span>⟶	</span> <p>Áo</p>⟶</span> <p>áo thun cổ tròn</p>
            </div>
            <div class="product-content row">
                <div class="product-content-left row">
                    <div class="product-content-left-big-img">
                        <img src="photo/<?php echo $each['photo']?>" alt="">
                    </div>
                </div>
                <div class="product-content-right">
                    <div class="product-content-right-product-name">
                        <h1><?php echo $each['name'] ?></h1>

                    </div>
                    <div class="product-content-right-product-price">
                        <p><?php echo $each['price'] ?><sup>đ</sup></p>
                    </div>
                    <div class="product-content-right-product-color">
                        <p><span style="font-weight: bold;">Màu sắc</span>:Xanh Cổ Vịt Nhạt <span style="color: red;">*</span></p>
                        <div class="product-content-right-product-color-img">
                            <img src="photo/spcolor.png" alt="">
                        </div>
                    </div>
                    <div class="product-content-right-product-size">
                        <p style="font-weight: bold;">Size:</p>
                        <div class="size">
                            <span>S</span>
                            <span>M</span>
                            <span>L</span>
                            <span>XL</span>
                            <span>XXL</span>
                        </div>
                    </div>
                    <div class="quantity">
                        <p style="font-weight: bold;">Số lượng:</p>
                        <input type="number" min="0" value="1"> 
                    </div>
                    <br>
                    <div class="product-content-right-product-button">
                        <button><i class="fas fa-shopping-cart"></i><a href="add_to_cart.php?id=<?php echo $each['id'] ?>">MUA HÀNG</a></button>
                        <button><p>TÌM TẠI CỬA HÀNG</p></button>
                    </div>
                    <div class="product-content-right-product-icon">
                        <div class="product-content-right-product-icon-item">
                            <i class="fas fa-phone-alt"></i> <p>Hotline</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-comments"></i> <p>Chat</p>
                        </div>
                        <div class="product-content-right-product-icon-item">
                            <i class="far fa-envelope"></i><p>Mail</p>
                        </div>
                    </div>
                    <div class="product-content-right-product-QR">
                        <img src="photo/qrcode2.png" alt="">
                    </div>
                    <div class="product-content-right-bottom">
                        <div class="product-content-right-bottom-top">
                            ∨
                        </div>
                        <div class="product-content-right-bottom-content-big">
                            <div class="product-content-right-bottom-content-title row">
                                <div class="product-content-right-bottom-content-title-item chitiet">
                                        <p>Chi tiết</p>
                                </div>
                                <div class="product-content-right-bottom-content-title-item">
                                    <p>Tham khảo thêm</p>
                                </div>
                            </div>
                            <div class="product-content-right-bottom-content">
                                <div class="product-content-right-bottom-content-chitiet">
                                    <?php echo $each['description'] ?>
                                </div>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
        $sql = "select * from products";
        $result = mysqli_query($connect,$sql); 
    ?>
    </section>
    <!-- "product-related"------------------- -->
    <section class="product-related container">
        <div class="product-related-title">
            <p>SẢN PHẨM LIÊN QUAN</p>
        </div>
        <div class=" row product-content">
            <?php foreach ($result as $each): ?>
            <div class="product-related-item">
                <a href="product.php?id=<?php echo $each['id'] ?>"><img src="photo/<?php echo $each['photo'] ?>" alt=""></a>
                <h1><a href="product.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a></h1>
                <p><?php echo $each['price'] ?><sup>đ</sup></p>
            </div>
            <?php endforeach ?>
        </div>
    </section>
    <!-- Footer-->
    <?php include 'footer.php' ?>

<script src="script.js"></script>


</body>
</html>                      