<?php
    include '../config.php';
    $collection_datapaket = $db->transaksi;

	$hapus = $collection_datapaket->deleteOne(['_id' =>new MongoDB\BSON\ObjectID($_GET['id'])]);

	if($hapus) {
		?>
		<script>
			alert('Data berhasil dihapus!')
			window.location.replace("http://localhost/project/admin/datatransaksi.php");
		</script>
		<?php
	}
	else {
        printf("Error: %s\n", mysqli_error($conn));
        exit();
    }
?>