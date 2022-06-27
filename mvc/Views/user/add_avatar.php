    <div class="container_header">
        <?php include_once('mvc/Views/user_site.php');
        ?>
        <div class="avatars">
              <div class="ava-form">
                
                <form action="" method="POST" role="form" enctype="multipart/form-data">
                    <legend>Form Add New Avatar</legend>
                
                    <div class="form-group">
                        <label for="avatar">avatar</label>
                        <input type="file" class="form-control" name="avatar" placeholder="add image">
                    </div>
                    <button type="submit" class="btn btn-primary" name="add_avatar">Submit</button>
                </form>
                
              </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>