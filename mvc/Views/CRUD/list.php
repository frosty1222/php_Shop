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
    <div class="col-md-12">
        <?php include_once('mvc/Views/admin_site.php'); ?>
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
    <form action="http://localhost:82/PHP_Shop/index.php?controller=Shop&action=list" method="get">
        <input type="hidden" name="controller" value="Shop" />
        <input type="hidden" name="action" value="list" />
        <input type="text" name="keyword" class="small" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" placeholder="search by name...">
        <input type="submit" value="Search" />
    </form>
    <div class="row">
        <div class="col-md-8 maintell">
            <div class="text-center">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Sale_price</th>
                            <th>Category_id</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach ($data as $value) { ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $value['name'] ?></td>
                                <td><?php echo $value['price'] ?></td>
                                <td><img src="<?php echo $value['image'] ?>" width="50px" alt=""></td>
                                <td><?php echo $value['sale_price'] ?></td>
                                <td><?php echo $value['category_id'] ?></td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('do you wanna delete?')" href="index.php?controller=Shop&action=delete1&id=<?php echo $value['id'] ?>" title="delete"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-warning" onclick="return confirm('do you wanna edit?')" href="index.php?controller=Shop&action=edit&id=<?php echo $value['id'] ?>" title="edit"><i class="fa fa-pencil"></i></a>
                                    <a class="btn btn-success" onclick="return confirm('do you wanna add new?')" href="index.php?controller=Shop&action=add" title="add-new"><i class="fa fa-plus"></i></a>
                                    <a class="btn btn-primary" onclick="return confirm('do you wanna add new?')" href="index.php?controller=Branch&run=up_color&id=<?php echo $value['id'] ?>" title="add-color"><i class="fa fa-plus"></i></a>
                                    <a class="btn btn-default" onclick="return confirm('do you wanna add new?')" href="index.php?controller=Branch&run=add_image&id=<?php echo $value['id'] ?>" title="add-image"><i class="fa fa-plus"></i></a>
                                </td>
                            </tr>
                        <?php $stt++;
                        } ?>
                    </tbody>
                </table>
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>

                        <?php for ($i = 1; $i <= $pages; $i++) { ?>
                            <li class="page-item"><a class="page-link" href="index.php?controller=Shop&action=list&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
</div>
<div class="col-md-12">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>