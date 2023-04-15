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
VALUES ('$name', '$price', '$contains', '$img', '$type')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

echo json_encode('success');