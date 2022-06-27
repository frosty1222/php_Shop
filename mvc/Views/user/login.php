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
    <div class="col-md-12">
        <?php include_once('mvc/Views/header.php'); ?>
    </div>
    <div class="container_header">
        <div class="row">
            <div class="col-md-12 main3">
                
                <form action="#" method="POST" role="form">
                    <legend>Form Login</legend>

                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo $name ?>"placeholder="fill your name...">
                    </div>

                    <div class="form-group">
                        <input type="password" name="pass" value="<?php echo $pass ?>placeholder="fill your password...">
                    </div>
                    <div class="form-group">
                            <label class="custom-control custom-checkbox">
                                <input class="custom-control-input" <?php echo ($check)?"checked":""?> value="1" type="checkbox" name="remember">
                                <span class="custom-control-label">Remember me</span>
                            </label>
                    </div>
                    <div class="form-group">
                       <input type="submit" name="lg" value="Login" />
                        <strong>or</strong>
                        <i><a href="index.php?controller=Shop&action=register">Regester</a></i>
                    </div>
                    
                </form>

            </div>
        </div>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
<h1></h1>
<div class="col-md-12">
    <?php require_once "mvc/Views/footer.php"; ?>
</div>