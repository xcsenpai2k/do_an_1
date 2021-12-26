<header>
<!-- Navigation-->
    <a href="#" class="logo">Logo</a>
    <ul>
        <li><a href="#">Trang chủ</a></li>
        <li><a href="#listProduct">Sản phẩm</a></li>
        <li><a href="#footer">Về chúng tôi</a></li>
        <?php if(empty($_SESSION['id'])){ ?>
            <li><a href="signin.php">Đăng nhập</a></li>
            <li><a href="signup.php">Đăng ký</a></li>
        <?php } else { ?>
            <li><a href="view_cart.php">
                <i class="cart fa fa-shopping-cart" aria-hidden="true">Xem giỏ hàng</i>
                </a>
            </li>
            <li>
                Chào <?php echo $_SESSION['name'] ?>, <a href="signout.php">
                    Đăng xuất
                </a>
            </li>
        <?php } ?>
    </ul>
</header>