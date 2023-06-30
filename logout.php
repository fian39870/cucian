<?php
session_start();
unset($_SESSION['username1']);

?>
<script>
 	alert('<?php echo "Anda Berhasil Logout";?>');
 	location='login.php';
</script>