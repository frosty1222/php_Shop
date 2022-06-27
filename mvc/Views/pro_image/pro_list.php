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
<div class="container_header">
    <?php include_once('mvc/Views/admin_site.php');
    ?>
    <div class="avatars">
        <div class="ava-images">
            <form action="http://localhost:82/PHP_Shop/index.php?controller=Shop&action=list" method="get">
                <input type="hidden" name="controller" value="Shop" />
                <input type="hidden" name="action" value="list" />
                <input type="text" name="keyword" class="small" value="<?php echo (isset($_GET['keyword'])) ? $_GET['keyword'] : '' ?>" placeholder="search by name...">
                <input type="submit" value="Search" />
            </form>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Images</th>
                        <th>Product_id</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $stt = 1; ?>
                    <?php foreach ($data as $value) { ?>
                        <tr>
                            <td><?php echo $stt ?></td>
                            <td><img src="<?php echo $value['images'] ?>" alt="" width="50px"></td>
                            <td><?php echo $value['product_id'] ?></td>
                            <td>
                                <a class="btn btn-danger" onclick="return confirm('do you wanna delete?')" href="index.php?controller=Branch&run=delete&id=<?php echo $value['id'] ?>" title="delete"><i class="fa fa-trash"></i></a>
                                <a class="btn btn-success" onclick="return confirm('do you wanna edit?')" href="index.php?controller=Branch&run=pro_edit&id=<?php echo $value['id'] ?>" title="edit"><i class="fa fa-pencil"></i></a>
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
                        <li class="page-item"><a class="page-link" href="index.php?controller=Branch&run=pro&pages=<?php echo $i; ?>"><?php echo $i; ?></a></li>
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
    <?php include_once('mvc/Views/footer.php') ?>
</div>