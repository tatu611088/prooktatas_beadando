<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}
if (isset($_POST['id'])){
    $id = (int)$_POST['id'];
    $imgURL = filter_var($_POST['imgurl'], FILTER_SANITIZE_URL);
}else {
    print 'nincs nyúlkapiszka!';
    die();
}

require_once '../dbConnection.php';


$sql = "DELETE FROM menu WHERE id=".$id."";

if ($conn->query($sql) === TRUE) {

    if (unlink('../'.$imgURL)) {
        header("Refresh:0");
    }
}
$conn->close();

echo json_encode('success');