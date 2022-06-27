    <div class="container_header">
        <?php include_once('mvc/Views/user_site.php');
        ?>
        <div class="avatars">
            <div class="ava-form2">
                <?php foreach ($data as $user) : ?>
                    <form action="#" method="post" role="form" enctype="multipart/form-data">
                        <legend>Form Edit Profile</legend>
                        <input type="number" name="id" value="<?php echo $user['id'] ?>" hidden="true">
                        <div class="form-group">
                            <label for="name">name</label>
                            <input type="text" class="form-control" name="name" value="<?php echo $user['name'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="email" class="form-control" name="email" value="<?php echo $user['email'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="address">address</label>
                            <input type="address" class="form-control" name="address" value="<?php echo $user['address'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="phone">phone</label>
                            <input type="phone" class="form-control" name="phone" value="<?php echo $user['phone'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="avatar">avatar</label>
                            <input type="file" class="form-control" name="avatar" value="<?php echo $user['avatar'] ?>">
                            <img src="<?php echo $user['avatar'] ?>" alt="" width="70">
                        </div>
                        <div class="form-group">
                            <label for="pass">password</label>
                            <input type="password" class="form-control" name="pass" value="<?php echo $user['pass'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="re_pass">re_pass</label>
                            <input type="password" class="form-control" name="re_pass" value="<?php echo $user['re_pass'] ?>">
                        </div>
                        <input type="submit" name="profile" value="Save">
                    </form>
                <?php endforeach ?>
            </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>