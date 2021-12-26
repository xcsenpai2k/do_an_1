<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Shopping Project</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <link href="./style.css" rel="stylesheet"/>
        <link href="./signin_style.css" rel="stylesheet"/>
        <style>
            body{
                background: #fcfcfc;
                min-height: 100%;
            }
        </style>
    </head>
    <body>
    <?php include 'navbar.php' ?>
    <section>
    <div class="container">
        <div class="user">
            <div class="imgBx"><img src="https://cf.shopee.vn/file/c6aa814bd4bb4b3d755b917cb6aaff0a" alt=""></div>
            <div class="formBx">
                <form action="">
                    <h2>Sign in</h2>
                    <input type="text" placeholder="Username">
                    <input type="password" placeholder="Password">
                    <input type="submit" value="Login">
                    <p class="signup">Dont have an account? <a href="#">Sign up.</a></p>
                </form>
            </div>
        </div>
    </div>
    </section>
    <?php include 'footer.php' ?>
        
    </body>
</html>
