<?php
$d = 0;
if (isset($_SESSION['item2'])) {
    $a = $_SESSION['item2'];
    foreach ($a as $c) {
        $d += $c['quantity'];
    }
} else if (!isset($_SESSION['item2'])) {
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <link rel="stylesheet" href="public/css/product_detail.css">
    <link rel="stylesheet" href="public/css/login.css">
    <link rel="stylesheet" href="public/css/main.css" class="text/css">
    <link rel="stylesheet" href="public/css/sub.css" class="text/css">
    <link rel="stylesheet" href="public/css/footer.css" class="text/css">
    <link rel="stylesheet" href="public/css/shop.css" class="text/css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <th><a href="index.html">Home</a></th>
                            <th><a href="avatar.html">Add Avatar</a></th>
                            <th><a href="account.html">Edit profile</a></th>
                            <th><a href="index.php?controller=Branch&run=user_view">Order list</a></th>
                            <?php if ($name = $_COOKIE['name']) : ?>
                            <?php else : ?>
                                <th><a href="login.html">Login</a></th>
                            <?php endif; ?>
                            <?php foreach ($getavatar as $avatar) : ?>
                                <th><a href="account.html"><img src="<?php echo $avatar['avatar'] ?>" alt="" width="30" height="30"></a></th>
                            <?php endforeach; ?>
                            <th><a href="wish.html">Wishlist</a></th>
                            <th><a href="logout.html">logout</a></th>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>
</body>

</html>