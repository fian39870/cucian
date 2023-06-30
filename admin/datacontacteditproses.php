<?php
    include '../config.php';

	if(empty($_POST['nama'] || $_POST['email'] || $_POST['message'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/admin/datacontact.php");
		</script>
		<?php
	} else {
        $collection_datapaket = $db->contact;
		$update = $collection_datapaket->updateOne(['_id' => new \MongoDB\BSON\ObjectID($_POST['id'])], ['$set' => ["name"=>$_POST['nama'], "email"=>$_POST['email'], "message"=>$_POST['message']]]);   
		if($update) {
			?>
			<script>
				alert('Data berhasil diedit!')
				window.location.replace("http://localhost/project/admin/datacontact.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
?>