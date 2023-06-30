<?php
    include '../config.php';

	if(empty($_POST['jenis']) || empty($_POST['biaya'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/admin/datapaket.php");
		</script>
		<?php
	} else {
        $collection_datapaket = $db->data_paket;
		$update = $collection_datapaket->updateOne(['_id' => new \MongoDB\BSON\ObjectID($_POST['id'])], ['$set' => ["jenis" => $_POST["jenis"], "biaya"=>$_POST["biaya"]]]);   
		if($update) {
			?>
			<script>
				alert('Data berhasil diedit!')
				window.location.replace("http://localhost/project/admin/datapaket.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
?>