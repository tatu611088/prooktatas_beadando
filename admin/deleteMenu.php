<?php
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

require_once '../dbConnection.php';


$sql = "DELETE FROM menu WHERE id=".$id."";

if ($conn->query($sql) === TRUE) {
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();

echo json_encode('success');