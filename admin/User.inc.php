<?php

class User extends DBH
{
       protected function getAllUsers()
    {
        $sql = "SELECT * FROM user";
        $result = $this->connect()->query($sql);
        $numRows = $result->num_rows;
        if ($numRows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }




}



