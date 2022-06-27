    <div class="container_header">
        <?php include_once('mvc/Views/user_site.php');
        ?>
        <div class="avatars">
            <div class="ava-forms">

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Sale_price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1 ?>
                        <?php foreach ($getfetch as $val) : ?>
                            <?php foreach ($data1 as $val1) : ?>
                                <tr>
                                    <?php if ($val['id'] == $val1['product_id']) : ?>
                                        <td><?= $n++ ?></td>
                                        <td><?= $val['name'] ?></td>
                                        <td><img src="<?= $val['image'] ?>" alt="" width="50"></td>
                                        <td><?= $val['price'] ?></td>
                                        <td><?= $val['sale_price'] ?></td>
                                        <td>
                                            <a href="index.php?controller=Shop&action=deletewish&id=<?php echo $val1['id'] ?>" class="btn btn-danger" onclick="return confirm('are you sure?')"><i class="fa fa-trash"></i></a>
                                            <a href="index.php?controller=Shop&action=product_detail&id=<?php echo $val['id'] ?>" class="btn btn-primary" onclick="return confirm('are you sure?')"><i class="fa fa-Shopping-cart"></i></a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>