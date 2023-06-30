<?php
session_start();
unset($_SESSION['username']);

?>
<script>
 	alert('<?php echo "Anda Berhasil Logout";?>');
 	location='login.php';
</script>