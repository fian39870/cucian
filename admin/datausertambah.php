<?php
    include '../config.php';
	$firstname = $_POST['first_name'];
    $lastname = $_POST["last_name"];
    $fullname = $firstname." ".$lastname;
	

	if(empty($_POST['first_name'] || $_POST['last_name'] || $fullname || $_POST['username'] || $_POST['email']|| $_POST['password']||$_POST['password'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/admin/datauser.php");
		</script>
		<?php
	} else {
        $collection_datapaket = $db->user;
		$tambah = $collection_datapaket->insertOne(['profile'=>['fullname'=>$fullname,'fname'=>$firstname,'lname'=>$lastname,'email'=>$_POST['email']],  'username'=>$_POST['username'], 'password'=>$_POST['password'],"role"=>$_POST['role']]);
		if($tambah) {
			?>
			<script>
				alert('Data berhasil ditambahkan!')
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
?>