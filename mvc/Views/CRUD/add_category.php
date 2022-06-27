<div class="container_header">
    <?php include_once('mvc/Views/admin_site.php');
    ?>
    <div class="avatars">
        <div class="ava-cate">

            <form action="#" method="POST" role="form" enctype="multipart/form-data">
                <legend>Form Add New Category</legend>

                <div class="form-group">
                    <label for="name">name</label>
                    <input type="text" name="name" placeholder="name...">
                </div>
                <div class="form-group">
                    <label for="image">image</label>
                    <input type="file" name="image" placeholder="image...">
                </div>
                <div class="form-group">
                    <label for="status">status</label>
                    <input type="text" name="status" placeholder="status...">
                </div>
                <button type="submit" class="btn btn-primary" name="add_cate">Submit</button>
            </form>

        </div>
    </div>
    <?php include_once('mvc/Views/footer.php') ?>
</div>