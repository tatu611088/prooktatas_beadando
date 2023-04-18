<?php
session_start();

if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}

require_once '../dbConnection.php';

//print_r($_POST);
//$id = (int)$_POST['id'];

if (isset($_POST['name'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
}else {
    print 'nincs nyúlkapiszka!';
    die();
}

//print_r($_FILES);
$target_dir = "../assets/img/menu/";
$target_file = $target_dir . basename($_FILES["imgfile"]["name"]);
//print $target_file;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["imgfile"]["tmp_name"]);
    if($check !== false) {

        $uploadOk = 1;
    } else {

        $uploadOk = 0;
    }

if ($uploadOk == 0) {

// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["imgfile"]["tmp_name"], $target_file)) {

        $uploadedfile = '/assets/img/menu/'. basename($_FILES["imgfile"]["name"]);
    }
}

if (isset($_POST['price'])){
    $price = filter_var($_POST['price'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['contains'])){
    $contains = filter_var($_POST['contains'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['img'])){
    $img = filter_var($_POST['img'], FILTER_SANITIZE_STRING);
}
if (isset($_POST['type'])){
    $type = filter_var($_POST['type'], FILTER_SANITIZE_STRING);
}
//$id = 2;

$sql = "INSERT INTO menu (name, price, contains, img_url, type)
VALUES ('$name', '$price', '$contains', '$uploadedfile', '$type')";

if ($conn->query($sql) === TRUE) {
    header("location:crud.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo json_encode('success');