<?php
ob_start();
session_start();
if (!isset($_SESSION["user"])) {
    header('location:index.php?controller=Shop&action=login');
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

<style class="text/css">
    .maintell {
        background-color: yellowgreen;
        width: 600px;
        height: 300px;
        color: black;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-8 maintell">
            <div class="text-center">
                <form action="#" method="post" border="1" enctype="multipart/form-data">
                    <span>Edit form</span>
                    <table>
                        <tr>
                            <th><b>Name:</b></th>
                            <td><input type="text" name="name" value="<?php echo $dataID['name'] ?>"></td>
                        </tr>
                        <tr>
                            <th><b>Price:</b></th>
                            <td><input type="text" name="price" value="<?php echo $dataID['price']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Sale_price:</th>
                            <td><input type="text" name="sale_price" value="<?php echo $dataID['sale_price']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Image:</th>
                            <td><input type="file" name="image" value="<?php echo $dataID['image']; ?>"></td>
                        </tr>
                        <tr>
                            <th>Product_id:</th>
                            <td><input type="text" name="product_id" value="<?php if ($data) {
                                                                                echo $data['product_id'];
                                                                            } else {
                                                                                echo $dataID['id'];
                                                                            }
                                                                            ?>"></td>
                        </tr>
                        <tr>
                            <th>Category_id:</th>
                            <td><input type="text" name="category_id" value="<?php echo $dataID['category_id']; ?>"></td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td><input type="submit" name="edit" value="Save"></td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>
</div>

<div class="col-md-12">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>