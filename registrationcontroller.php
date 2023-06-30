<?php
include "config.php";
if(isset($_POST["submit"])){
	session_start();
    $firstname = $_POST['first_name'];
    $lastname = $_POST["last_name"];
    $fullname = $firstname." ".$lastname;
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["confirm_password"];
    if(empty($firstname || $lastname || $username || $email || $password || $cpassword)) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/registration.php");
		</script>
		<?php
	}else if($password != $cpassword) {
		?>
		<script>
		alert('Silahkan masukkan password sama');
		window.location.replace("http://localhost/project/registration.php");
		</script>
		<?php
        }else {
        $collection_datapaket = $db->user;
		$tambah = $collection_datapaket->insertOne(['profile'=>['fullname'=>$fullname,'fname'=>$firstname,'lname'=>$lastname,'email'=>$email],  'username'=>$username, 'password'=>$password, 'role'=>"user"]);
		if($tambah) {
			?>
			<script>
				alert('Registrasi anda telah berhasil silahkan login!')
				window.location.replace("http://localhost/project/login.php");
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