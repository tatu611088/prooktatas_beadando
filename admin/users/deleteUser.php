<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['id'])) {
    header('Location: ../index.php');
    exit();
}
if (isset($_POST['id'])){
    $id = (int)$_POST['id'];
}else {
    print 'nincs nyúlkapiszka!';
    die();
}

//include_once '../dbh.inc.php';
include_once 'test.php';

$user = new User();
$user->deleteUser(2); // töröljük a felhasználót az ID 1 alapján

$users = new User();
$users->deleteUser($id);

//echo json_encode('success');