<?php
    include '../config.php';

	if(empty($_POST['first_name'] || $_POST['last_name'] || $_POST['fullname'] || $_POST['username'] || $_POST['email']|| $_POST['password'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/admin/datauser.php");
		</script>
		<?php
	} else {
        $collection_datapaket = $db->user;
		$update = $collection_datapaket->updateOne(['_id' => new \MongoDB\BSON\ObjectID($_POST['id'])], ['$set' => ['profile'=>['fullname'=>$fullname,'fname'=>$firstname,'lname'=>$lastname,'email'=>$_POST['email']],  'username'=>$_POST['username'], 'password'=>$_POST['password'],"role"=>$_POST['role']]]);   
		if($update) {
			?>
			<script>
				alert('Data berhasil diedit!')
				window.location.replace("http://localhost/project/admin/datauser.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
?>