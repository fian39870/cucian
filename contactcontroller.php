<?php
include "config.php";
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];
    if(empty($name || $email || $message)) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/contact.php");
		</script>
		<?php
        }else {
        $collection_datapaket = $db->contact;
		$tambah = $collection_datapaket->insertOne(["name" => $name,'email'=>$email, 'message' => $_POST["message"]]);
		if($tambah) {
			?>
			<script>
				alert('Terima Kasih telah menghubungi kami!')
				window.location.replace("http://localhost/project/menuUser.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
}
?>