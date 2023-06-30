<?php
    include '../config.php';
	$kembalian = $_POST["bayar"] - $_POST['biaya'];

	if(empty($_POST['nama'] || $_POST['jenishidden'] || $_POST['biaya'] || $_POST['bayar'] || $_POST['kembalian'] || $_POST['total'] || $_POST['tanggal'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/admin/datatransaksi.php");
		</script>
		<?php
	} else {
        $collection_datapaket = $db->transaksi;
		$update = $collection_datapaket->updateOne(['_id' => new \MongoDB\BSON\ObjectID($_POST['id'])], ['$set' => ['nama'=>$_POST['nama'], 'jenis'=>$_POST['jenishidden'], 'biaya'=>$_POST['biaya'], 'bayar'=> $_POST['bayar'], 'total'=> $_POST['total'], 'kembalian'=>$kembalian,  'tanggal'=>$_POST['tanggal']]]);   
		if($update) {
			?>
			<script>
				alert('Data berhasil diedit!')
				window.location.replace("http://localhost/project/admin/datatransaksi.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
?>