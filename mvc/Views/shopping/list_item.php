<?php
$d = 0;
if (isset($_SESSION['item2'])) {
    $a = $_SESSION['item2'];
    foreach ($a as $c) {
        $id = $c['id'];
        $data = $db->getCarts($id);
    }
} else if (!isset($_SESSION['item2'])) {
    echo 'none';
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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="minor">
        <?php include_once('mvc/Views/header.php'); ?>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

<div class="col-md-8 list_item">

    <div class="jumbotron">
        <div class="container">
            <h3>Hello, welcome to Shopping Cart!</h3>
            <p>Shopping cart</p>
            <p>
                <a class="btn btn-primary btn-lg">Learn more</a>
            </p>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Price</th>
                <th>Image</th>
                <th>Color</th>
                <th>Size</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $n = 1 ?>
            <?php foreach ($products as $item) : ?>
                <tr>
                    <td><?php echo $n++ ?></td>
                    <td><?php echo $item['name'] ?></td>
                    <td><?php echo $item['price'] ?>$</td>
                    <td><img src="<?php echo $item['images'] ?>" alt="" width="50px"></td>
                    <td><i class="fa fa-tree" style="color:<?php echo $item['color'] ?>"></i></td>
                    <td><?php echo $item['size'] ?></td>
                    <td>
                        <form action="#">
                            <div class="form-group">
                                <input type="hidden" name="action" value="cart_update" />
                                <input type="hidden" name="id" value="<?= $item['id'] ?>" />
                                <input type="number" name="quantity" value="<?= $item['quantity'] ?>" />
                                <input type="button" onclick="location='index.php?controller=Shop&action=cart&&action=cart_update&id=<?= $item['id'] ?>'" value="update">
                            </div>
                        </form>
                    </td>
                    <td><?php echo $item['quantity'] * $item['price'] ?>$</td>
                    <td>
                        <span class="btn btn-danger"><a onclick="return confirm('do you wanna delete?')" href="index.php?controller=Shop&action=cart&&action=cart_delete&id=<?php echo $item['id'] ?>" title="delete"><i class="fa fa-trash"></i></a></span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div>
        <span class="btn btn-danger"><a onclick="return confirm('do you wanna clear all?')" href="index.php?controller=Shop&action=cart&&action=cart_clear">Clear all</a></span>
        <span class="btn btn-success"><a onclick="return confirm('do you wanna view in detail?')" href="idetail.html">Detail Items</a></span>
    </div>

    <div style="float:right;margin-top:-32px"><span class="btn btn-success"><a href="index.php?controller=Shop&action=payment">Payment</a></span></div>

</div>
<div class="minor">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>