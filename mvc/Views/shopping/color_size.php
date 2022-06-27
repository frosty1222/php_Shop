<?php session_start();
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
<div class="container">
    <div class="row">
        <div class="col-md-8 UP_Color">
            <?php foreach ($product as $pro) : ?>
                <form action="#" method="POST" role="form">
                    <legend>Update color form</legend>

                    <div class="form-group">
                        <label for="">product_id</label>
                        <input type="text" class="form-control" name="product_id" placeholder="<?php echo $pro['id'] ?>">
                    </div>

                    <div class="form-group">
                        <label for="">color</label>
                        <input type="color" class="form-control" name="color" placeholder="Input field">
                    </div>
                    <div class="form-group">
                        <label for="">size</label>

                        <select name="size" class="form-control" required="required">
                            <option value="XL">XL</option>
                            <option value="XXL">XXL</option>
                            <option value="L">L</option>
                            <option value="S">S</option>
                            <option value="XS">XS</option>
                            <option value="M">M</option>
                        </select>

                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="col-md-12">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>