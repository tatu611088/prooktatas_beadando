<?php

session_start();

if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}


require_once '../dbConnection.php';

//print_r($_POST);
$id = (int)$_POST['id'];

if (isset($_POST['name'])){
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
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
$sql = "UPDATE menu SET name='$name', price='$price', contains='$contains', img_url='$img', type='$type' WHERE id='$id'";
if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $conn->error;
}

$conn->close();

