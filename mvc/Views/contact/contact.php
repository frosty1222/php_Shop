<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fashion Shop</title>

    <!-- Bootstrap CSS -->
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    <link rel="stylesheet" href="public/css/contact.css">
</head>

<body>
    <div class="col-md-12">
        <?php include_once('mvc/Views/header.php'); ?>
    </div>
    <div class="container_contact">
        <div class="contact">
            <div class="contact-form">
                <legend>Contact</legend>
                <form action="#" method="post" enctype="multipart/form-data" role="form">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <input type="number" name="phone" placeholder="Phone" required>
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" name="note" placeholder="Notes" required>
                    </div>
                    <div class="form-group1">
                        <button class="submit" name="contact">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="clear"></div>

    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
<?php require_once "mvc/Views/footer.php"; ?>