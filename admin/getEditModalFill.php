<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../dbConnection.php';

if (isset($_POST['id'])){
    $id = (int)$_POST['id'];
}else {
    print 'nincs nyúlkapiszka!';
    die();
}

//$id = 2;
$query = "SELECT m.name, m.price, m.contains, m.img_url, m.id, m.type FROM menu AS m WHERE m.id=".$id."";
$result = mysqli_query($conn, $query);
//print $query;
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);

}

