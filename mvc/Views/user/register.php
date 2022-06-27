<!DOCTYPE html>
<html lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="publuc/css/shop.css"> -->

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.3/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>
    <div class="container_header">
        <?php include_once('mvc/Views/header.php');
        ?>
        <div class="avatars">
            <div class="ava-regis">

                <form action="#" method="POST" role="form">
                    <legend>Form Register</legend>

                    <div class="form-group">
                        <input type="text" name="name" id="textname" placeholder="fill your name...">
                        <span id="showerrorname"></span>
                    </div>

                    <div class="form-group">
                        <input type="email" name="email" id="textemail" placeholder="fill your email...">
                        <span id="showerroremail"></span>
                    </div>

                    <div class="form-group">
                        <input type="phone" name="phone" id="textphone" placeholder="fill your phone...">
                        <span id="showerrorphone"></span>
                    </div>

                    <div class="form-group">
                        <input type="text" name="address" placeholder="fill your address...">
                    </div>

                    <div class="form-group">
                        <input type="password" name="pass" placeholder="fill your password...">
                    </div>

                    <div class="form-group">
                        <input type="password" name="re_pass" placeholder="confirm password...">
                    </div>
                    <button type="submit" name="Register">Save</button>
                    <button type="reset">Reset</button>
                </form>

            </div>
        </div>
        <?php include_once('mvc/Views/footer.php') ?>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="public/js/check.js" type="text/javascript"></script>
</body>