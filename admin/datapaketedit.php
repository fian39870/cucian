<?php
    include '../config.php';
    $collection_datapaket = $db->data_paket;
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
		<form action="datapaketeditproses.php" method="post">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" readonly value="<?php echo $id; ?>" autocomplete="off">
			</div>
			<div class="form-group">
				<label for="jenis">jenis</label>
				<input type="text" class="form-control" name="jenis" value="<?php echo $data['jenis'] ?>" placeholder="Iphone 6s+, Nike AirForce, dsb.." autocomplete="off" required>
			</div>
			<div class="form-group">
				<label for="biaya">Biaya</label>
				<input type="text" class="form-control" name="biaya" value="<?php echo $data['biaya']; ?>" placeholder="Spesifikasi produk" autocomplete="off" required>
<?php } ?>
			<a href="http://localhost/project/admin/datapaket.php" role="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
			<button type="submit" class="btn btn-success">Update</a>
		</form>
	</div>
</body>
</html>