<?php
session_start();

if (!isset($_SESSION['id'])){
    header('LOCATION: login.php');
}

require_once 'dbConnection.php';
$postID = (int)$_GET['id'];
$query = "SELECT post.id, post.title, post.body, post.userid, user.name FROM post LEFT JOIN user ON post.userid = user.id WHERE post.id = $postID";
$result = mysqli_query($conn, $query);
$data = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {

        $data[] = $row['id'];
        $data[] = $row['title'];
        $data[] = $row['body'];
        $data[] = $row['name'];

    }
}

if (isset($_POST['title'])) {
    $title = filter_var($_POST['title'], FILTER_SANITIZE_STRING);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_STRING);
    $id = $postID;

    $sql = "UPDATE post SET title='$title', body='$body'  WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        header("location: post.php?id=".$postID);
        unset($_POST);

    } else {
        echo "Error updating record: " . $conn->error;
    }

}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <style>


    </style>
    <title>Document</title>
</head>
<body>
<div class="container">
    <!-- Begin Modal Body -->

    <div class='border border-dark p-4 rounded' id='basicInfo'>







    <form method="post">

        <input type="hidden" name="id" value="<?=$data[0];?>">
        <!-- Begin Action Title -->
        <div class='form-group'>
            <label for='actionTitle' class='text-primary'>Action Title</label>
            <input type='text' name='title' class='form-control' placeholder='Action Title' id='actionTitle' value="<?=$data[1];?>">
            <div class='text-danger collapse' id='valTitle'>Action Title is required.</div>
        </div>
        <!-- End Action Title -->

        <!-- Begin Action Description -->
        <div class='form-group'>
            <label for='samsDesc' class='text-primary'>Action Description</label>
            <textarea class='form-control' id='samsDesc' name='body' rows='4' placeholder='Action Description' ><?=$data[2];?></textarea>
            <div class='text-danger collapse' id='valDesc'>Action Description is required.</div>
        </div>
        <!-- End Action Description -->

        <!-- Begin Action Dept/Due/Assigned -->
        <div class='form-group row'>



            <div class='col'>
                <label for='assignedTo' class='text-primary'>Assigned To</label>
                <div id='assignedTo'><span><?=$data[3];?></span></div>
            </div>
            <div class='col'>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class='col'>
                <button type="submit" class="btn btn-primary"><a style="color:white" href="index.php">Főoldal</a></button>
            </div>
        </div>
        <!-- Begin Action Dept/Due/Assigned -->
    </form>
    </div>
</div>



<!-- End Modal Body -->
</div>



</body>
</html>


