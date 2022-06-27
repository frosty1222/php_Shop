    <div class="container_header">
        <?php include_once('mvc/Views/user_site.php');
        ?>
        <div class="avatars">
            <div class="ava-form5">

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>name</th>
                            <th>color</th>
                            <th>size</th>
                            <th>images</th>
                            <th>quantity</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($ses as $key) : ?>
                                    <tr>
                                        <td><?= $n++ ?></td>
                                        <td><?= $key['name'] ?></td>
                                        <td><i class="fa fa-tree" style="color:<?= $key['color'] ?>"></i></td>
                                        <td><?= $key['size'] ?></td>
                                        <td><img src="<?= $key['images'] ?>" alt="" width="50"></td>
                                        <td><?= $key['quantity'] ?></td>
                                        <td>
                                            <a href="item.html" class="btn btn-danger">return cart</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>