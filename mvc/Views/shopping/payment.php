<?php
$products = !empty($_SESSION['item2']) ? $_SESSION['item2'] : [];

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
    <div class="col-md-12">
        <?php include_once('mvc/Views/header.php'); ?>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

<div class="col-md-12 main">

    <div class="jumb">
        <h3>Payment</h3>
        <p>Enter all your information here!</p>
        <p>
            <a class="btn btn-primary btn-lg" href="#">Learn more</a>
        </p>
    </div>
    <div class="col-md-8 payment-box">
        <?php foreach ($data as $key) : ?>
            <form action="#" method="POST">
                <div class="form-group">
                    <span>Name</span>
                    <input type="text" name="name" class="form-control" value="<?= $key['name'] ?>" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <span>Email</span>
                    <input type="text" name="email" class="form-control" value="<?= $key['email'] ?>" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <span>Address</span>
                    <input type="text" name="address" class="form-control" value="<?= $key['address'] ?>" placeholder="Enter Street and curent Address" required>
                </div>
                <div class="form-group">
                    <span>Phone</span>
                    <input type="text" name="phone" class="form-control" value="<?= $key['phone'] ?>" placeholder="Enter Phone" required>
                </div>
                <div class="form-group">
                    <span>Home number</span>
                    <input type="text" name="home_number" class="form-control" placeholder="your home number or alley address" required>
                </div>
                <div class="form-group2">
                    <span>Note</span>
                    <textarea name="note" cols="30" rows="2"></textarea>
                </div>
                <div class="form-group2">
                    <select name="pay_type" class="form-control" required>
                        <option hidden="true" value="0">ATM</option>
                        <option value="1">After Recieved Items</option>
                    </select>
                </div>
                <div class="form-group" style="text-align:center">
                    <button class="btn btn-primary" name="payment">Send</button>
                </div>
            </form>
        <?php endforeach; ?>
    </div>
    <div class="col-md-8 item">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>color</th>
                    <th>size</th>
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
                        <td> <i class="fal fa-tree" style="color:<?php echo $item['color'] ?>"></i></td>
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
        <div><span class="btn btn-danger"><a onclick="return confirm('do you wanna clear all?')" href="index.php?controller=Shop&action=cart&&action=cart_clear">Clear all</a></span></div>
    </div>
</div>
<div class="col-md-12">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>