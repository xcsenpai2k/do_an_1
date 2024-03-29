
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="mainstyle.css">
    <title>Website</title>
</head>
<body>
<?php include 'navbar.php' ?>
    <!--SLlDER--->
    <section class="sliders">
            <div class="aspect-ratio-169">
                <img src="photo/slide1.jpg" alt="">
                <img src="photo/slide2.jpg" alt="">
                <img src="photo/slide3.jpg" alt="">
            </div>
            <div class="dot-container">
                <div class="dot active"></div>
                <div class="dot"></div>
                <div class="dot"></div>
           </div>
    </section>
    <div class="container">
            <div class="row">
                <div class="cartegory-left">    
                    <ul>
                        <?php foreach ($result as $each): ?>
                        <li class="cartegory-left-li"><a href="category.php?id=<?php echo $each['id'] ?>">
                            <?php echo $each['name'] ?>
                        </a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <?php
                    require 'connect.php';
                    $sql = "select * from products";
                    $result = mysqli_query($connect,$sql); 
                ?>
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <p>Tất cả sản phẩm</p>
                    </div>
                    <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                     </div>
                     <div class="cartegory-right-content row">
                        <?php foreach ($result as $each): ?>
                        <div class="cartegory-right-content-item">
                            <a href="product.php?id=<?php echo $each['id'] ?>"><img src="photo/<?php echo $each['photo'] ?>" alt=""></a>
                            <h1><a href="product.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a></h1>
                            <p><?php echo $each['price'] ?><sup>đ</sup></p>
                        </div>
                        <?php endforeach ?>
                    </div>

                   <div class="cartegory-right-bottom row">
                       <div class="cartegory-right-bottom-items">
                           <p>Hiện thị 2 <span>|</span> 4 sản phẩm</p>
                       </div>
                       <div class="cartegory-right-bottom-items">
                        <p><span>«</span>1 2 3 4 5<span>»</span>Trang cuối</p>
                        </div>
                   </div> 
                </div>
            </div>
        </div>
    <!-- Footer-->
    <?php include 'footer.php' ?>


<script src="script.js"></script>

</body>
</html>                      