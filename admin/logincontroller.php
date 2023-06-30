<?php
include "../config.php";
session_start();
if(isset($_POST["submit"])){
    $username = $_POST["username"];
    $password = $_POST["password"];
	$collection_datapaket = $db->user;
	$cari = $collection_datapaket->findOne(["username" => $username,'password'=>$password,'role'=>'admin']);
		if(!$cari) {
			?>
			<script>
 			alert('<?php echo "login gagal";?>');
 			location='login.php';
			</script>
			<?php
		}
		else {
			$_SESSION['username']=$cari["username"];
			?>
			<script>
			alert('<?php echo "login berhasil";?>');
			location='index.php';
			</script>
			<?php
	}
}
?>