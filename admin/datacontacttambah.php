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
		$tambah = $collection_datapaket->insertOne(["name"=>$_POST['nama'], "email"=>$_POST['email'], "message"=>$_POST['message']]);
		if($tambah) {
			?>
			<script>
				alert('Data berhasil ditambahkan!')
				window.location.replace("http://localhost/project/admin/datacontact.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}