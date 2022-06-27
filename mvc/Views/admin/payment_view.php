    <div class="container_header">
        <?php include_once('mvc/Views/admin_site.php');
        ?>
        <div class="avatars">
            <div class="ava-form3">

                <table class="table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Home Number</th>
                            <th>Note</th>
                            <th>Color</th>
                            <th>Size</th>
                            <th>Pay Type</th>
                            <th>Total price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $n = 1; ?>
                        <?php foreach ($data as $key => $val) : ?>
                            <tr>
                                <td><?= $n++ ?></td>
                                <td><?= $val['name'] ?></td>
                                <td><?= $val['email'] ?></td>
                                <td><?= $val['address'] ?></td>
                                <td><?= $val['phone'] ?></td>
                                <td><?= $val['home_number'] ?></td>
                                <td><?= $val['note'] ?></td>
                                <td><?= $val['color'] ?></td>
                                <td><?= $val['size'] ?></td>
                                <td><?=$val['pay_type']?></td>
                                <td><?=$val['total_price']?></td>
                                <td>
                                    <a href="index.php?controller=Branch&run=delete_pay&id=<?= $val['id']?>" onclick="return confirm('Are you sure')" class="btn btn-danger" title="Delete"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>