<?php session_start();
if(empty($_SESSION['id'])){
    header('location:signin.php?error=Dang nhap di ban');
 }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping Project</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="./style.css" rel="stylesheet"/>
    </head>
    <body>
    <?php include 'navbar.php' ?>
        <section class="banner"></section>
        <script type="text/javascript">
            window.addEventListener("scroll",function(){
                var header = document.querySelector("header");
                header.classList.toggle("sticky", window.scrollY>0);
            });
        </script>
    <?php include 'products.php' ?>
    <?php include 'footer.php' ?>
        
    </body>
</html>
