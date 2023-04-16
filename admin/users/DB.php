<?php
class DB {
private $host;
private $user;
private $password;
private $database;

public function __construct($host, $user, $password, $database) {
$this->host = $host;
$this->user = $user;
$this->password = $password;
$this->database = $database;
}

public function connect() {
$mysqli = new mysqli($this->host, $this->user, $this->password, $this->database);
if ($mysqli->connect_error) {
die('Connect Error (' . $mysqli->connect_errno . ') '
. $mysqli->connect_error);
}
return $mysqli;
}
}

class User {
private $db;

public function __construct() {
$this->db = new DB('localhost', 'root', '', 'beadando');
}

public function deleteUser($id) {
$mysqli = $this->db->connect();
$stmt = $mysqli->prepare("DELETE FROM user WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
$mysqli->close();
}

public function getAllUsers() {
$mysqli = $this->db->connect();
$sql = "SELECT * FROM user";
$result = $mysqli->query($sql);
$data = [];
if ($result && $result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
$data[] = $row;
}
}
return $data;
}
}


