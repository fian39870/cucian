<?php
    include '../config.php';
    $collection_datapaket = $db->contact;
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
	$result = $collection_datapaket->find(["_id"=> $id]);
    foreach($result as $data){
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit</title>
	<link rel="stylesheet" href="datapaketeditstyle.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"><link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<h1>Edit Data</h1>
		<form action="datacontacteditproses.php" method="post">
        <div class="form-group">
        				<input type="text" class="form-control" name="nama" placeholder="Nama" value="<?php echo $data['name']; ?>" required="required">
        				</div>
        				<div class="form-group">
        				<input type="email" class="form-control" name="email"value="<?php echo $data['email']; ?>" placeholder="Email" required="required">
        				</div>
						<div class="form-group">
           				<input type="textarea" class="form-control" name="message" value="<?php echo $data['message']; ?>"placeholder="Message" required="required">
        				</div>    
<?php } ?>
			<a href="http://localhost/project/admin/datacontact.php" role="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
			<button type="submit" class="btn btn-success">Update</a>
		</form>
	</div>
</body>
</html>