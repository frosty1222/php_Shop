    <div class="container_header">
        <?php include_once('mvc/Views/user_site.php');
        ?>
        <div class="avatars">
            <div class="ava-form">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Eamil</th>
                            <th>Phone</th>
                            <th>Avatar</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1 ?>
                        <?php foreach ($account as $user) : ?>
                            <tr>
                                <td><?= $n++ ?></td>
                                <td><?= $user['name'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td><?= $user['phone'] ?></td>
                                <td><img src="<?= $user['avatar'] ?>" alt="" width="70"></td>
                                <td>
                                    <a href="index.php?controller=Shop&action=edit_profile&id=<?=$user['id'] ?>"><i class="fa fa-pencil"></i></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>