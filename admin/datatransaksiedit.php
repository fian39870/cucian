<?php
    include '../config.php';
    $collection_datapaket = $db->transaksi;
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
		<form action="datatransaksieditproses.php" method="post">
			<div class="form-group">
				<label for="id">ID</label>
				<input type="text" class="form-control" name="id" readonly value="<?php echo $id; ?>" autocomplete="off">
			</div>
			<div class="form-group">
			    <label for="nama">Nama</label>
				<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pelanggan" value="<?php echo $data["nama"]; ?>" autocomplete="off" required>
			</div>
            <div class="form-group">
		        <label for="jenis">Jenis Kendaraan</label>
			    <select name="jenis" class="form-control" id="jenis" required>
				    <option value="" disable>--- Pilih Jenis Kendaraan ---</option>
			            <?php
                            $collection_datapaket = $db->data_paket;
                            $result = $collection_datapaket->find();
                            foreach($result as $data1){ ?>
					        <option value="<?php echo $data1['biaya']?>"> <?php echo $data1['jenis']?></option>
                            <?php
				            }
			            ?>
			    </select>
	        </div>
			<input type="hidden" name="jenishidden" id="jenishidden">
			<div class="form-group">
				<label for="biaya" >Biaya</label>
				<input type="number" class="form-control" id="biaya" name="biaya" value=""required readonly>
			</div>
			<div class="form-group">
				<label for="bayar">Bayar</label>
				<input type="number" class="form-control" id="bayar" name="bayar" value="<?php echo $data['bayar'];?>" required>
			</div>
			<div class="form-group">
				<label for="total" >Total Bayar</label>
				<input type="number" class="form-control" id="total" name="total" placeholder="Total Bayar" required readonly>
			</div>
			<div class="form-group">
				<label for="kembali" >Kembalian</label>
				<input type="number" class="form-control" id="kembali" name="kembali" value="<?php echo $data['kembalian']; ?>" placeholder="Kembalian" value=""required readonly>
			</div>
			<div class="form-group">
                <label class="control-label" for="date">Tanggal</label>
                 <input class="form-control" id="date" name="tanggal" value="<?php echo $data["tanggal"]; ?>" placeholder="MM/DD/YYY" type="date"/>
			</div>
            <?php } ?>
			<a href="http://localhost/project/admin/datatransaksi.php" role="button" class="btn btn-secondary" data-dismiss="modal">Batal</a>
			<button type="submit" class="btn btn-success">Update</a>
		</form>
	</div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script>
$(document).ready(function(){
  $("#jenis").change(function(){
	var b=document.getElementById('jenis');
	var c=document.getElementById('jenishidden');
	c.value=b.options[b.selectedIndex].text
	var biaya = $(this).val();
	$("#biaya").val(biaya);
  });
  $("#bayar").keyup(function(){
	  var biaya = $("#biaya").val();
	  var bayar = $("#bayar").val();
	  $("#kembali").val(bayar - biaya);
	  $("#total").val(biaya);
  });
});
</script>
</body>
</html>