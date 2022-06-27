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

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="publuc/css/shop.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container_header">
        <?php include_once('mvc/Views/header.php');
        ?>
        <div class="product">
            <div class="sub-product">
                <div class="search">
                    <form action="http://localhost:82/PHP_Shop/index.php?controller=Shop&action=list" method="get">
                        <input type="hidden" name="controller" value="Shop" />
                        <input type="hidden" name="action" value="product" />
                        <input type="text" name="keyword" class="small" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" placeholder="search by name...">
                        <button type="submit">Search</button>
                    </form>
                    <div class="clear"></div>
                </div>
                <div class="grid-container2">
                    <?php foreach ($data as $pro) { ?>
                        <div class="deal-rightmk left-side">
                            <h3 class="agileits-sear-head">Men Shirt</h3>
                            <div class="special-sec1">
                                <div class="col-xs-4 img-deals">
                                    <img src="<?php echo $pro['image']; ?>" />
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="index.php?controller=Shop&action=get_heart&id=<?php echo $pro['id'] ?>"><i class="fa fa-heart-o" style="color:red"></i></a>
                                <a href="index.php?controller=Shop&action=product_detail&id=<?php echo $pro['id'] ?>"><i class="fa fa-shopping-cart"></i></a>
                                <a href="index.php?controller=Shop&action=product_detail&id=<?php echo $pro['id'] ?>"><i class="fa fa-eye"></i></a>
                            </div>
                            <div class="col-md-12 name">
                                <h5 size="big"><?php echo $pro['name'] ?></h5>
                                <div class="price">
                                    <h5><span>$<?php echo $pro['sale_price']; ?></span></h5>
                                    <h5 class="price1">$<?php echo $pro['price']; ?></h5>
                                </div>
                            </div>
                        </div>
                        <!-- //deals -->
                    <?php } ?>
                    <div class="float-left">
                        <div class="text-center2">
                            <div class="cata">CaTaLog<span><i class="fa fa-angle-down fa-2x"></i></span>
                                <ul>
                                    <li><a href="#">BestSeller</a></li>
                                    <li><a href="shop.html">Men Shop</a></li>
                                    <li><a href="women.html">Woman Shop</a></li>
                                    <li><a href="baby.html">baby shop</a></li>
                                    <li><a href="access.html">accessories</a></li>
                                    <li><a href="#">another</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="clear"></div>

                    <div class="bottom-list">
                        <nav aria-label="navigation">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                <?php for ($i = 1; $i <= $pages; $i++) { ?>
                                    <li class="page-item"><a class="page-link" href="index.php?controller=Shop&action=product&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php  } ?>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class=clear></div>
        </div>
        <?php include_once('footer.php') ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>