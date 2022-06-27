<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container_header">
        <?php require_once "mvc/Views/header.php"; ?>
        <div class=" main_detail">
            <div class="center">
                <?php foreach ($data as $val) : ?>
                    <div class="text">
                        <div class="image-top">
                            <img src="<?php echo $val['image'] ?>" alt="">
                        </div>
                    <?php endforeach; ?>
                    <div class="image-bottom">
                        <ul>
                            <?php foreach ($data2 as $key => $val) : ?>
                                <li><img src="<?php echo $val['images'] ?>"></li>   
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    </div>
                    <div class="text-right">
                        <div class="infor">
                            <h3>Product Information</h3>
                            <div class="main-pay">
                                <form action="#" method="POST" role="form">
                                    <div class="sub-miner">
                                        <div class="form-color">
                                            <?php foreach ($color as $key => $val) : ?>
                                                <li>
                                                    <span>Choose color</span>
                                                    <input type="checkbox" name="color" value="<?php echo $val['color'] ?>">
                                                    <i class="fa fa-tree" style="color:<?php echo $val['color'] ?>"></i>
                                                </li>
                                            <?php endforeach; ?>
                                            <span>Choose size</span>
                                            <select name="size" type="text">

                                                <?php foreach ($color as $key => $value) : ?>
                                                    <option value="<?php echo $value['size'] ?>"><?php echo $value['size'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-pro">
                                            <?php foreach ($data as $val) : ?>
                                                <h4>Name:<?php echo $val['name'] ?></h4>
                                                <h4>Price:<?php echo $val['sale_price'] ?>$</h4>
                                                <h4><del>Price:<?php echo $val['price'] ?>$</h4></del>
                                            <?php endforeach ?>
                                        </div>
                                    </div>
                                    <div class="clear"></div>
                                    <div class="miner-image">

                                        <ul>
                                            <span>Choose image</span>
                                            <br>
                                            <?php foreach ($proimage as $key) : ?>
                                                <li>
                                                    <span><img src="<?= $key['images'] ?>" alt="" width="70px" height="50px"><input type="checkbox" name="images" value="<?php echo $key['id'] ?>"></span>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                    <div class="button">
                                        <button type="submit" name="add_cart">Add To Cart</button>
                                        <a href="shop.html" id="return">Return To Shop</a>
                                    </div>
                                </form>
                            </div>
                            <div class="comment">
                                <p id="com">Comment</p>
                                <?php if (@!$a1) { ?>
                                    <div id="form">
                                        <form action="#" method="POST" role="form">
                                            <div class="form-group">
                                                <label for="">Rate stars</label>
                                                <input type="text" class="rating rating-loading" name="star" value="" data-size="xs" data-theme="krajee-gly" title="">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Name</label>
                                                <input type="text" name="name" value="<?php echo $_COOKIE['name'] ?>" placeholder="Input field">
                                            </div>
                                            <?php foreach ($getmail as $mail) : ?>
                                                <div class="form-group">
                                                    <label for="">Email</label>
                                                    <input type="text" name="email" value="<?php echo $mail['email'] ?>" placeholder="Input field">
                                                </div>
                                            <?php endforeach ?>
                                            <div class="form-group">
                                                <label for="content">Content</label>
                                                <textarea name="content" cols="30" rows="5" value=""></textarea>
                                            </div>
                                            <button type="submit" onclick="return confirm('do you wanna submit this?')" class="btn btn-success" name="rating">Submit</button>
                                            <input type="reset" value="reset">
                                        </form>
                                    </div>

                                <?php } ?>
                                <?php if (@$a1) { ?>
                                    <h6><?= $you ?></h6>
                                <?php } ?>

                            </div>

                            <div class="comments">
                                <input type="text" class="rating rating-loading" value="<?= $total ?>" data-size="sm" data-theme="krajee-gly" title="">
                            </div>
                            <div class="appear-comment">
                                <legend>
                                    Comment Section
                                </legend>
                                <div class="user_comment_line">
                                    <?php foreach ($comments as $comment) : ?>
                                        <?php foreach ($getava as $ava) : ?>
                                            <div class="sub-line">
                                                <span><img src="<?php echo $ava['avatar'] ?>" alt="" width="50px" height="50px"></span>
                                                <p> comment:<?php echo $comment['content'] ?></p>
                                                <span id="admin">
                                                    <p>Admin =><?php echo $comment['admin_rep'] ?></p>
                                                </span>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        <?php require_once "mvc/Views/footer.php"; ?>
    </div>
</body>

</html>
<script>
    $(function() {
        $('#com').click(function() {
            $('#form').slideToggle(1000);
        });
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script scr="public/js/curson.js" type="text/javascript"></script>
</body>

</html>