<div class="container_header">
    <?php include_once('mvc/Views/admin_site.php');
    ?>
    <div class="avatars">
        <div class="ava-cate">


            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $n = 1; ?>
                    <?php foreach ($data as $key => $val) : ?>
                        <tr>
                            <td><?= $n++ ?></td>
                            <td><?= $val['name'] ?></td>
                            <td><img src="<?= $val['image'] ?>" alt="" width="50"></td>
                            <td>
                                <a href="cate_add.html" class="btn btn-primary" onclick="return confirm('are you sure?')"><i class="fa fa-plus"></i></a>
                                <a href="index.php?controller=Shop&action=edit_cate&id=<?= $val['id'] ?>" class="btn btn-success" onclick="return confirm('are you sure?')"><i class="fa fa-pencil"></i></a>
                                <a href="index.php?controller=Shop&action=cate_delete&id=<?php $val['id'] ?>" class="btn btn-danger" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </div>
    </div>
    <?php include_once('mvc/Views/footer.php') ?>
</div>