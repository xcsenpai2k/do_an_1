 <?php
        require 'connect.php';
        $sql = "select * from category";
        $result = mysqli_query($connect,$sql);
        session_start(); 
?>
<section class="top">
        <div class="container">
            <div class="row">
                <div class="top-logo"><a href="index.php">
                    <img src="photo/logo.png" height="50px"></a>
                </div>
                <div class="top-menu-items">
                    <ul>
                        <?php foreach ($result as $each): ?>
                            <li><a href="category.php?id=<?php echo $each['id'] ?>"><?php echo $each['name'] ?></a></li>
                        <?php endforeach ?>
                        <li><a href="#footer">Về chúng tôi</a></li>
                    </ul>
                </div>
                <div class="top-menu-icons">
                    <ul>
                        <li>
                            <input type="text" placeholder="Tìm kiếm">
                            <i class="fas fa-search"></i>
                        </li>
                        <?php 
                        if(empty($_SESSION['id'])){?>
                            <li><a href="signin.php">Đăng nhập</a></li>
                            <li><a href="signup.php">Đăng ký</a></li>
                        <?php }else{?>
                            <li>Chào bạn</li>
                            <li><a href="signout.php">Đăng xuất</a></li>
                        <?php } ?> 
                         
                        <li>
                            <a href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>