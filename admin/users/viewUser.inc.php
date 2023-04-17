<?php


class Views {
    private $userObj;

    public function __construct() {
        $this->userObj = new User();
    }

    public function getAllUsers() {
        $users = $this->userObj->getAllUsers();
        foreach ($users as $user) {
            print "<tr>";
            print "<td>" . $user['name'] . "</td>";
            print "<td>" . $user['email'] . "</td>";
            print "<td>" . $user['isadmin'] . "</td>";


            print "<td>";
            print '<a href="#editEmployeeModal" onclick="setFormAction(this)" class="edit" data-id="' . $user["id"] . '" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
            print '<a href="#deleteEmployeeModal" class="delete" data-id="' . $user["id"] . '" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
            print '</td>';
            print '</tr>';
        }
    }
}
?>
