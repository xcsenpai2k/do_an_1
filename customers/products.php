 <?php 
require 'connect.php';
 $sql = "select * from products";
 $result = mysqli_query($connect,$sql);
 ?>
<!-- List Product -->
<div id="listProduct" class="middle">
    <div class="container">
        <?php foreach ($result as $each): ?>
            <div class="card">
                <div class="imgBx">
                    <img src="./photos/<?php echo $each['photo'] ?>">
                    <ul class="action">
                        <li>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                            <?php if(!empty($_SESSION['id'])){ ?>
                            <a href="add_to_cart.php?id=<?php echo $each['id'] ?>">Add to cart</a>
                        <?php } ?>
                        </li>
                        <li>
                            <i class="fa fa-eye" aria-hidden="true"></i>
                            <a href="product.php?id=<?php echo $each['id'] ?>">View details</a>
                        </li>
                    </ul>
                </div>
                <div class="content">
                    <div class="productName">
                        <h3><?php echo $each['name'] ?></h3>
                        <h2><?php echo $each['price'] ?></h2>
                    </div>
                </div>
            </div>
        <?php endforeach ?>
    </div>
</div>