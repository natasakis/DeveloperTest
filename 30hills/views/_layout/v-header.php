<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./public/theme/css/bootstrap.css">
    <title>Shop</title>
    <link rel="icon" href="./public/theme/img/logo.jpg">
</head>
<body style="padding-top: 70px;" >
    <header>
        <nav class="navbar navbar-expand-lg bg-white fixed-top">
            <div class="container">
                <a class="navbar-brand text-dark h1" href="#"><div style="letter-spacing: 2px; ">
                    <span class="h1"><strong>SHOP</strong></span>
                </div></a>
                <div class="d-flex">
                    <ul class="navbar-nav">
                        <li class="nav-item h3">
                            <a class="
                                nav-link
                                <?php if($page == 'index') {
                                echo htmlspecialchars('active');
                                } ?>
                                " href="./">Home</a>
                        </li>
                        <li class="nav-item h3">
                            <a class="
                                nav-link
                                <?php if($page == 'all-products-page') {
                                echo htmlspecialchars('active');
                                } ?>
                                " 
                                href="./all-products-page.php"
                                >
                                Products
                            </a>
                        </li>
                        <li class="nav-item h3">
                            <a class="
                                nav-link
                                <?php if($page == 'contact-page') {
                                echo htmlspecialchars('active');
                                } ?>
                                " 
                                href="./contact-page.php"
                                >
                                Contact
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="mr-auto">
                    <a class="nav-link position-relative" href="./shopping-cart-page.php">
                        <img src="./public/theme/img/cart.png" style="height: 50px;">
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?php 
                            if(!empty($_SESSION['cart'])) {
                                echo count($_SESSION['cart']);
                            } else {
                                echo 0;
                            }
                            ?>
                        </span>
                    </a>
                </div>
            </div>
        </nav>


              
    
    </header>
  