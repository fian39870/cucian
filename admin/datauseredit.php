<?php
    include '../config.php';
    $collection_datapaket = $db->user;
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
	$result = $collection_datapaket->find(["_id"=> $id]);
    foreach($result as $data){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aplikasi CRUD sederhana - Edit</title>
	<link rel="stylesheet" href="datapaketeditstyle.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Edit Data</h1>
		<form action="datausereditproses.php" method="post">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" readonly value="<?php echo $id; ?>" autocomplete="off">
			</div>
			<div class="form-group">
						<div class="row">
						<div class="col"><input type="text" class="form-control" name="first_name" value="<?php echo $data['profile']["fname"]; ?>" placeholder="First Name" required="required"></div>
						<div class="col"><input type="text" class="form-control" name="last_name" value="<?php echo $data['profile']["lname"]; ?>" placeholder="Last Name" required="required"></div>
						</div>        	
        				</div>
        				<div class="form-group">
        				<input type="text" class="form-control" name="username" value="<?php echo $data["username"]; ?>" placeholder="Username" required="required">
        				</div>
						<div class="form-group">
		                    <label for="role">Role</label>
			                <select name="role" class="form-control" id="role" required>
				            <option value="" disable>--- Pilih Role ---</option>
					        <option value="user">User</option>
							<option value="admin">Admin</option>
			                </select>
	                        </div>
        				<div class="form-group">
        				<input type="email" class="form-control" name="email" value="<?php echo $data['profile']["email"]; ?>" placeholder="Email" required="required">
        				</div>
						<div class="form-group">
           				<input type="password" class="form-control" name="password" value="<?php echo $data["password"]; ?>" placeholder="Password" required="required">
        				</div>
<?php } ?>
			<a href="http://localhost/project/admin/datapaket.php" role="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
			<button type="submit" class="btn btn-success">Update</a>
		</form>
	</div>
</body>
</html>