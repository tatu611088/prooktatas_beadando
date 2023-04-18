<?php

session_start();

if(!isset($_SESSION['id']) || $_SESSION['isadmin'] == 0) {
    header('Location: ../index.php');
    exit();
}

require_once '../dbConnection.php';
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
<script src="../assets/js/crud.js"></script>

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
						<h2>Manage <b>Menu</b></h2>
					</div>
					<div class="col-sm-6">


                            <a href="crudUsers.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>User</span></a>




						<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Menu</span></a>
						<a href="../index.php" class="btn btn-danger"><span>Home</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>

						<th>Name</th>
						<th>Price</th>
						<th>Contains</th>
						<th>Type</th>
						<th>IMG URL</th>
						<th>Modify</th>
					</tr>
				</thead>
				<tbody>


                <?php
                $query = "SELECT m.name, m.price, m.contains, m.img_url, m.id, mt.type FROM menu AS m LEFT JOIN menu_types AS mt ON m.type = mt.id";
                $result = mysqli_query($conn, $query);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                ?>
                        <tr>

                            <td><?=$row['name']?></td>
                            <td>$<?=$row['price']?></td>
                            <td><?=$row['contains']?></td>
                            <td><?=$row['type']?></td>
                            <td class="imgurl"><?=$row['img_url']?></td>
                            <td>
                                <a href="#editEmployeeModal" class="edit" data-id="<?=$row['id']?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                <a href="#deleteEmployeeModal" class="delete" data-id="<?=$row['id']?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>

                <?php
                    }
                }
                ?>
                <?php
                /*
                ?>

                */
                ?>
				</tbody>
		</div>
	</div>
</div>



<!-- Add new menu Modal HTML -->
<div id="addEmployeeModal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" enctype="multipart/form-data" action="addMenu.php">
				<div class="modal-header">
					<h4 class="modal-title">Add Employee</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input  id="name" name="name" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Price</label>
						<input id="price" name="price" type="text" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Contains</label>
						<textarea id="contains" name="contains" class="form-control" required></textarea>
					</div>
					<div class="form-group">
						<label>Type</label>
                        <select id="type" name="type" class="form-control" required>
                            <option value="1">starters</option>
                            <option value="2">salads</option>
                            <option value="3">specialty</option>
                        </select>

					</div>
					<div class="form-group">
						<label>IMG</label>
						<input type="file" name="imgfile" id="imgfile" class="form-control" accept="image/*">
					</div>
                <?php
				/*
                    <div class="form-group">
                        <label>IMG url</label>
                        <input type="text" name="img" id="img" class="form-control" >
                    </div>
                    */
                    ?>
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
<div id="editEmployeeModal" class="modal fade editmenu">
	<div class="modal-dialog">
		<div class="modal-content">
			<form>
				<div class="modal-header">
					<h4 class="modal-title">Edit Menu</h4>
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" id="name" class="form-control" required>
					</div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" name="price" id="price" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Contains</label>
                        <textarea name="contains" id="contains" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Type</label>
                        <select name="type" id="type" class="form-control" id="type" required>
                            <option value="1">starters</option>
                            <option value="2">salads</option>
                            <option value="3">specialty</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label>IMG</label>
                        <input name="img" id="img" class="form-control"></input>
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
</body>
</html>


