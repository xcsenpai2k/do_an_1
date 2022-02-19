<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/54f0cb7e4a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="mainstyle.css">
    <title>Website-Ivy-Trangn danh mục</title>
</head>
<body>
    <?php include 'navbar.php' ?>
    <!-- Category -->
    <?php
        require 'connect.php';
        $sql = "select * from category";
        $result = mysqli_query($connect,$sql);
        $each = mysqli_fetch_array($result); 
    ?>
    <section class="cartegory">
        <div class="container">
            <div class="cartegory-top row">
                <p><a href="index.php">Trang chủ</a></p> <span>⟶</span> <p><?php echo $each['name'] ?></p>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="cartegory-left">    
                    <ul>
                        <?php foreach ($result as $each): ?>
                        <li class="cartegory-left-li"><a href="category.php?id=<?php echo $each['id'] ?>">
                            <?php echo $each['name']  ?>
                        </a></li>
                        <?php endforeach ?>
                    </ul>
                </div>
                
                <div class="cartegory-right row">
                    <div class="cartegory-right-top-item">
                        <p><?php echo $each['name'] ?></p>
                    </div>
                    <?php
                    $id = $_GET['id'];
                    $sql = "select * from products where category_id = '$id'";
                    $result = mysqli_query($connect,$sql); 
                    ?>
                    <!-- <div class="cartegory-right-top-item">
                        <select name="" id="">
                            <option value="">Sắp xếp</option>
                            <option value="">Giá cao đến thấp</option>
                            <option value="">Giá thấp đến cao</option>
                        </select>
                     </div>
 -->                <div class="cartegory-right-content row">
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
    </section>
    
     <!-- Footer-->
     <?php include 'footer.php' ?>

<script src="script.js"></script>



</body>
</html>                      