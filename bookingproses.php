<?php
	require __DIR__ . '/vendor/autoload.php';
    include 'config.php';
	
	$kembalian = $_POST["bayar"] - $_POST['biaya'];
	$nama = $_POST['nama'];
  $options = array(
    'cluster' => 'ap1',
    'useTLS' => true
  );
  $pusher = new Pusher\Pusher(
    '99b4eb65cb5c1f6a1420',
    '10a9493f1603035f666d',
    '1531391',
    $options
  );
  $data['message'] = "ada bookingan baru dari $nama";
  $pusher->trigger('my-channel', 'my-event', $data);
	if(empty($_POST['nama'] || $_POST['jenishidden'] || $_POST['biaya'] || $_POST['bayar'] || $_POST['kembalian'] || $_POST['total'] || $_POST['tanggal'])) {
		?>
		<script>
		alert('Mohon lengkapi data terlebih dahulu!');
		window.location.replace("http://localhost/project/booking.php");
		</script>
		<?php
	} else {
        $collection_datapaket = $db->transaksi;
		$tambah = $collection_datapaket->insertOne(['no_nota'=>$_POST['nota'], 'nama'=>$_POST['nama'], 'jenis'=>$_POST['jenishidden'], 'biaya'=>$_POST['biaya'], 'bayar'=> $_POST['bayar'], 'total'=> $_POST['total'], 'kembalian'=>$kembalian,  'tanggal'=>$_POST['tanggal']]);
		if($tambah) {
			?>
			<script>
				alert('Selamat Anda booking anda berhasil!')
				window.location.replace("http://localhost/project/menuUser.php");
			</script>
			<?php
		}
		else {
			printf("Error: %s\n", mysqli_error($conn));
			exit();
		}
	}
?>