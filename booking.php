<?php
include "config.php";
session_start();
if(!isset($_SESSION['username1'])){
	header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Courgette|Pacifico:400,700">
<title>Booking</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bookingstyle.css">
</head>
<body>
<div class="signup-form">
    <form action="bookingproses.php" method="post">
		<div class="form-header">
			<h2>Booking</h2>
			<p>Isikan Sesuai identitas anda!</p>
		</div>
							<div class="form-group">
								<label for="nama">Nama</label>
								<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pelanggan" autocomplete="off" required>
							</div>
                            <div class="form-group">
		                    <label for="jenis">Jenis Kendaraan</label>
			                <select name="jenis" class="form-control" id="jenis" required>
				            <option value="" disable>--- Pilih Jenis Kendaraan ---</option>
			                <?php
                            $collection_datapaket = $db->data_paket;
                            $result = $collection_datapaket->find();
                            foreach($result as $data){ ?>
					        <option value="<?php echo $data['biaya']?>"> <?php echo $data['jenis']?></option>
                            <?php
				            }
			                ?>
			                </select>
	                        </div>
							<input type="hidden" name="jenishidden" id="jenishidden">
							<div class="form-group">
							<label for="biaya" >Biaya</label>
							<input type="number" class="form-control" id="biaya" name="biaya" value="" required readonly>
							</div>
							<div class="form-group">
							<label for="bayar">Bayar</label>
							<input type="number" class="form-control" id="bayar" name="bayar" placeholder="Isi dengan angka" required>
							</div>
							<div class="form-group">
							<label for="total" >Total Bayar</label>
							<input type="number" class="form-control" id="total" name="total" placeholder="Total Bayar" required readonly>
							</div>
							<div class="form-group">
							<label for="kembali" >Kembalian</label>
							<input type="number" class="form-control" id="kembali" name="kembali" placeholder="Kembalian" value=""required readonly>
							</div>
							<div class="form-group">
                            <label class="control-label" for="date">Tanggal</label>
                            <input class="form-control" id="date" name="tanggal" placeholder="MM/DD/YYY" type="text" value='<?php $mydate=getdate(date("U")); echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year]";?>'/>
							</div>
		<div class="form-group">
			<button type="submit" class="btn btn-primary btn-block btn-lg">Pesan</button>
		</div>	
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