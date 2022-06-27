<?php
ob_start();
session_start();
if (!isset($_SESSION["user2"])) {
    header('location:adlog.html');
    echo 'you must login first';
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
    <div class="col-md-12">
        <?php include_once('mvc/Views/header.php'); ?>
    </div>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

<!-- <style class="text/css">
    .maintell {
        background-color: grey;
        width: 600px;
        height: 300px;
    }
</style> -->
<div class="container">
    <div class="row">
        <div class="col-md-8 maintell">
            <div class="text-center">
                <form action="#" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Form title</legend>

                    <div class="form-group">
                        <label for="">ID</label>
                        <input type="text" class="form-control" name="id" value="<?php echo $data['id'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="<?php echo $data['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <td><img src="<?php echo $data['image'] ?>" alt="" width="50px"></td>
                        <input type="hidden" class="form-control" name="image" value="<?php echo $data['image'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Price</label>
                        <input type="text" class="form-control" name="price" placeholder="<?php echo $data['price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Quantity</label>
                        <input type="number" class="form-control" name="quantity" placeholder="<?php echo $data['quantity'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">total_price</label>
                        <input type="text" class="form-control" name="total_price" placeholder="<?php echo $data['total_price'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="">Payment_ID</label>
                        <input type="text" class="form-control" name="payment_id" value="<?php echo $data['payment_id'] ?>" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit_process">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>