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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>

<style class="text/css">
    .maintell {
        background-color: grey;
        width: 600px;
        height: 300px;
    }
</style>
<script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
</script>
<div class="container_header">
    <?php include_once('mvc/Views/admin_site.php');
    ?>
    <div class="avatars">
        <div class="ava-cate">

            <form action="#" method="post" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input name="name" class="form-control" type="text" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input name="price" class="form-control" type="text" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label for="sale_price">Sale_price</label>
                    <input name="sale_price" class="form-control" type="text" placeholder="Enter price">
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <input name="image" class="form-control" type="file" placeholder="choose image">
                </div>
                <!-- <div class="form-group">
                    <label for="images">Images</label>
                    <input name="images[]" class="form-control" type="file" placeholder="Enter Name" multiple="multiple" required>
                </div> -->
                <div class="form-group">
                    <label for="category_id">Category_id</label>

                    <select name="category_id" class="form-control" required="required">
                        <?php foreach ($data as $value) : ?>
                            <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <button class="btn btn-primary" name="add">Save</button>
            </form>

        </div>
    </div>
    <?php include_once('mvc/Views/footer.php') ?>
</div>