<?php
require_once '../dbConnection.php';
$id = (int)$_POST['id'];

//$id = 2;
$query = "SELECT m.name, m.price, m.contains, m.img_url, m.id, m.type FROM menu AS m WHERE m.id=".$id."";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);

}

