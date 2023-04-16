<?php

class DBH
{
    private $servername;
    private $username;
    private $password;
    private $dbname;

  /*  public function __construct($servername, $username, $password, $dbname) {
        $this->host = $servername;
        $this->user = $username;
        $this->password = $password;
        $this->database = $dbname;
    }*/
    protected function connect()
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "beadando";

        $conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        return $conn;
    }


}
