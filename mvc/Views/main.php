<?php
ob_start();
session_start();
if (!isset($_SESSION["user"])) {
    header('location:index.php?controller=Shop&action=login');
    echo 'you must login first';
}
if (isset($_SESSION['item2'])) {
    $a = $_SESSION['item2'];
}
?>
<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion Shop</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/owlcarousel/assets/owl.theme.default.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!--important link source from "https://bbbootstrap.com/snippets/mega-menu-navigation-bar-icons-71070657"-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="public/css/bar.css">
    <link rel="stylesheet" href="public/css/product.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/css/main.css" class="text/css">
    <!-- <link rel="stylesheet" href="public/css/shop.css"> -->
</head>

<body>
    <div class="container_header">
        <div class="header">
            <div class="nav-bar">
                <div class="bar">
                    <div class="logo">
                        <img src="public/image/happy-shop.jpg" alt="">
                    </div>
                    <div id="search">
                        <form action="http://localhost:82/PHP_Shop/index.php?controller=Shop&action=list">
                            <input type="hidden" name="controller" value="Shop" />
                            <input type="hidden" name="action" value="product" />
                            <input type="text" name="keyword" class="small" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" placeholder="search by name...">
                            <button type="submit">Search</button>
                        </form>
                    </div>
                    <div class="shopping-cart">
                        <?php if (isset($a)) : ?>
                            <?php $c = 0; ?>

                            <center>
                                <a href="item.html" class="btn btn-default">
                                    <i class="fa fa-shopping-cart fa-3x"></i>
                                    <?php foreach ($a as $b) : ?>
                                        <?php $c += $b['quantity']; ?>
                                    <?php endforeach; ?>
                                    <mark>
                                        <?php echo $c; ?>
                                    </mark>
                                </a>
                            </center>
                        <?php else : ?>
                            <center>
                                <i class="fa fa-shopping-cart fa-3x"></i>
                                <mark>
                                    0
                                </mark>
                            </center>
                        <?php endif ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="sub-bar">
            <div class="inside-sub">

                <table class="table">
                    <thead>
                        <tr>
                            <th><a href="">Home</a></th>
                            <th><a href="about.html">About us</a></th>
                            <th><a href="shop.html">Shop</a></th>
                            <th><a href="contact.html">Contact</a></th>
                            <?php if ($name = $_COOKIE['name']) : ?>
                            <?php else : ?>
                                <th><a href="login.html">Login</a></th>
                            <?php endif; ?>
                            <?php foreach ($getavatar as $avatar) : ?>
                                <th><a href="index.php?controller=Branch&run=user_view"><img src="<?php echo $avatar['avatar'] ?>" alt="" width="30" height="30"></a></th>
                            <?php endforeach; ?>
                            <?php if (!$name = $_COOKIE['name']) : ?>
                                <th><a href="">Register</a></th>
                            <?php endif ?>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>
        <div class="slide">
            <div class="sub-slide">
                <div class="owl-carousel owl-theme">
                    <div class="item">
                        <img src="public/image/ho.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/image/sale.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/image/sale2.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/image/sale-banner.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/image/supper-sale.jpg" alt="">
                    </div>
                    <div class="item">
                        <img src="public/image/summer-sale.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="product-thing">
            <legend>Product List</legend>
            <div class="product-list">
                <ul id="product-list">
                    <div class="owl-carousel owl-theme">
                        <?php foreach ($main as $key => $val) : ?>
                            <div class="item">
                                <img src="<?php echo $val['image']; ?>" alt="">
                            </div>
                        <?php endforeach; ?>
                    </div>
                </ul>
            </div>
        </div>
        <footer class="text-center text-white" style="background-color: #caced1;">
            <!-- Grid container -->
            <div class="container_footer">
                <!-- Section: Images -->
                <section class="">
                    <div class="row">
                        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/fluid/city/113.jpg" style="height:91px" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/fluid/city/111.jpg" style="height:91px" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/fluid/city/112.jpg" style="height:91px" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/fluid/city/114.jpg" style="height:91px" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/fluid/city/115.jpg" style="height:91px" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-12 mb-4 mb-md-0">
                            <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-ripple-color="light">
                                <img src="https://mdbootstrap.com/img/new/fluid/city/116.jpg" style="height:91px" />
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2);"></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Section: Images -->
            </div>
            <!-- Grid container -->

            <!-- Copyright -->
            <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
                © 2020 Copyright: <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Totam quis cumque alias accusantium quam. Vel voluptates eaque dolores ad, animi consequatur impedit labore, harum quod repudiandae quos nemo culpa dolorum.</p>
                <a class="text-white" href="https://mdbootstrap.com/">Fashion Shop</a>
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- jQuery -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel();
        });
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 5
                },
                1340: {
                    items: 1
                }
            }
        })
    </script>
    <script src="public/owlcarousel/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".public.owl-carousel").owlCarousel();
        });
    </script>
</body>
</body>

</html>