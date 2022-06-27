<div class="container_header">
    <?php include_once('mvc/Views/admin_site.php');
    ?>
    <div class="avatars">
        <div class="ava-cate">
           <?php foreach ( $cate as $key => $val):?>
            <form action="#" method="POST" role="form" enctype="multipart/form-data">
                <legend>Form Edit Category</legend>

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" class="form-control" name="name" value="<?= $val['name']?>">
                </div>

                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" class="form-control" name="image" value="<?= $val['image']?>">
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" class="form-control" name="status" value="<?= $val['status']?>">
                </div>
                <button type="submit" class="btn btn-primary" name="edit_cate">Submit</button>
            </form>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include_once('mvc/Views/footer.php') ?>
</div>