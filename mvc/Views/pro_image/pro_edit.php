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
        <div class="ava-form">
            <?php foreach ($putid as $key) : ?>
                <form action="#" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Form edit image</legend>

                    <div class="form-group">
                        <label for="product_id">product id</label>
                        <input type="text" class="form-control" name="product_id" value="<?= $key['product_id'] ?>" placeholder="enter product_id">
                    </div>
                    <div class="form-group">
                        <label for="images">images</label>
                        <input type="file" class="form-control" name="images" placeholder="enter images" multiple>
                    </div>
                    <button type="submit" class="btn btn-primary" name="edit_image">Submit</button>
                </form>
            <?php endforeach; ?>
        </div>

    </div>
    <?php include_once('mvc/Views/footer.php') ?>
</div>