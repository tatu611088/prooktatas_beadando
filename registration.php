<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>

        body{
            background-color: #525252;
        }
        .centered-form{
            margin-top: 60px;
        }

        .centered-form .panel{
            background: rgba(255, 255, 255, 0.8);
            box-shadow: rgba(0, 0, 0, 0.3) 20px 20px 20px;
        }
    </style>


    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>



<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row centered-form">
        <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Please sign up for Bootsnipp <small>It's free!</small></h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="post">

                                <div class="form-group">
                                    <input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
                                </div>



                        <div class="form-group">
                            <input type="email" name="email" id="email" class="form-control input-sm" placeholder="Email Address">
                        </div>

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password" id="password" class="form-control input-sm" placeholder="Password">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control input-sm" placeholder="Confirm Password">
                                </div>
                            </div>
                        </div>

                        <input type="submit" value="Register" class="btn btn-info btn-block">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>

<?php

//print password_hash('abc', PASSWORD_DEFAULT);
if (isset($_POST['name'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $passwd = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $passwdConfirm = filter_var($_POST['password_confirmation'], FILTER_SANITIZE_STRING);

    if ($passwd !== $passwdConfirm){
        print 'A jelszavak nem egyeznek meg!';
        die();
    }
    require_once 'dbConnection.php';
    $passwdHash = password_hash($passwd, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (name, email, password, isadmin) VALUES ('$name', '$email', '$passwdHash', '0')";


    if ($conn->query($sql) === TRUE) {
        header('location:index.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



}

?>