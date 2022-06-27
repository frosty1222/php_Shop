<?php
ob_start();
session_start();
if (!isset($_SESSION["user2"])) {
    header('location:index.php?controller=Branch&run=admin_log');
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

<!-- <style class="text/css">
    .maintell {
        background-color: grey;
        width: 600px;
        height: 300px;
    }
</style> -->
<div class="container_header">
    <?php include_once('mvc/Views/admin_site.php'); ?>
    <div class="row">
        <div class="maintell">
            <div class="text-center">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Total_price</th>
                            <th>Order_ID</th>
                            <th>Order Status</th>
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
                                <td><?php echo $value['color'] ?></td>
                                <td><?php echo $value['size'] ?></td>
                                <td><?php echo $value['total_price'] ?></td>
                                <td><?php echo $value['payment_id'] ?></td>
                                <td>
                                    <?php if ($value['status'] == 1) :  ?>
                                        <h6>your item is delivered</h6>
                                    <?php else : ?>
                                        <h6>sold out</h6>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a class="btn btn-danger" onclick="return confirm('do you wanna delete?')" href="index.php?controller=Shop&action=delete_process&id=<?= $value['id'] ?>" title="delete"><i class="fa fa-trash"></i></a>
                                    <a class="btn btn-success" onclick="return confirm('do you wanna edit?')" href="index.php?controller=Shop&action=edit_process&id=<?= $value['id'] ?>" title="edit"><i class="fa fa-pencil"></i></a>
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
     <?php require_once "mvc/Views/footer.php"; ?>
</div>