<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if(!isset($_SESSION['id']) || $_SESSION['isadmin'] == 0) {
    header('Location: ../index.php');
    exit();
}

include_once 'users/DB.php';
include_once 'users/viewUser.inc.php';




if (isset($_POST['editid'])){

    if (isset($_POST['name'])){
        $name = filter_var($_POST['name'], FILTER_SANITIZE_SPECIAL_CHARS);
    }
    if (isset($_POST['mail'])) {
        $email = filter_var($_POST['mail'], FILTER_SANITIZE_EMAIL);
    }
    if (isset($_POST['pswd'])){
        $password = filter_var($_POST['pswd'], FILTER_SANITIZE_STRING);
        $passwdHash = password_hash($password, PASSWORD_DEFAULT);
    }
    if (isset($_POST['isadmin'])){
        $isadmin = filter_var($_POST['isadmin'], FILTER_SANITIZE_NUMBER_INT);
    }
    if (isset($_POST['editid'])){
        $id = filter_var($_POST['editid'], FILTER_SANITIZE_NUMBER_INT);
    }


    $userEdit = new User();

    $userEdit->editUser($id, $name, $email, $passwdHash, $isadmin);


}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Bootstrap CRUD Data Table for Database with Modal Form</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="../assets/css/crud.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="../assets/js/crudUser.js"></script>

<script>

</script>
</head>
<body>
<div class="container-xl">
	<div class="table-responsive">
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Manage <b>Users</b></h2>
					</div>
					<div class="col-sm-6">
                        <a href="crud.php" class="btn btn-success" ><i class="material-icons">&#xE147;</i> <span>Menu</span></a>
						<a href="../registration.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a>
						<a href="../index.php" class="btn btn-danger"><span>Home</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>

						<th>Name</th>
						<th>E-mail</th>
						<th>isAdmin</th>

						<th>Modify</th>
					</tr>
				</thead>
				<tbody>


                <?php

                $views = new Views();
                $views->getAllUsers();

    ?>
				</tbody>
		</div>
	</div>
</div>



<!-- Add new menu Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" name="addnew" value="1">
					<div class="form-group">
						<label>Name</label>
						<input id="name" name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>E-mail</label>
						<input id="mail" name="mail" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input id="password" name="password" class="form-control" required></input>
					</div>
                    <div class="form-group">
                        <label>Password again</label>
                        <input id="password2" name="password2" class="form-control" required></input>
                    </div>
					<div class="form-group">
						<label>Is admin</label>
                        <select id="isadmin" name="isadmin" class="form-control" required>
                            <option value="0">Not Admin</option>
                            <option value="1">Admin</option>

                        </select>

					</div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-success submit" value="Add">
				</div>
			</form>
		</div>
	</div>
</div>



<!-- Edit Modal HTML -->
<div id="editEmployeeModal" class="modal fade edituser">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post">
				<div class="modal-header">
					<h4 class="modal-title">Edit Menu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
                    <input type="hidden" name="editid" id="editid" value="">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="mail" id="mail" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input name="pswd" id="pswd" class="form-control" required></input>
                    </div>

                    <div class="form-group">
                        <label>IsAdmin</label>
                        <select name="isadmin" id="isadmin" class="form-control" id="type" required>
                            <option value="0">No admin</option>
                            <option value="1">Admin</option>

                        </select>

                    </div>

				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-info submit" value="Save">
				</div>
			</form>
		</div>
	</div>
</div>
<!-- Delete Modal HTML -->
<div id="deleteEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Delete Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<p>Are you sure you want to delete these Records?</p>
					<p class="text-warning"><small>This action cannot be undone.</small></p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
					<input type="submit" class="btn btn-danger confirmdelete" value="Delete">
				</div>
			</form>
		</div>
	</div>
</div>

<?php
/*
$getUser = new User();
$userData = $getUser->getUser(2);*/

//print_r($userData);

?>


</body>
<script>

</script>
</html>


