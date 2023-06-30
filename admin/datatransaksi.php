<?php
include '../config.php';
session_start();
if (!isset($_SESSION['username'])) {
	header("Location: login.php");
}
$collection_datapaket = $db->transaksi;


?>
<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Transaksi</title>
	<link rel="stylesheet" href="profile.css">

</head>

<body>
	<div class="grid-container">
		<header class="header">
			<nav style="list-style-type: none">
				<ul id="MenuItems">
					<li>
						<div class="search-container" style="position: flex; margin-right: 70px;   float: right;">
							<form action="" method="post">
								<input type="text" name="cari" placeholder="search..." style="padding: 6px;border: none;margin-top: 5px;font-size: 17px;border: 1px solid #ccc;">
								<button style="float: right;padding: 6px 10px;margin-top: 6px;margin-right: 16px;background: #ddd;font-size: 18px;border: none;cursor: pointer;" type="submit" name="search"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</li>
					<li>
						<div class="action">
							<div class="profile" onclick="menuToggle();">
								<img src="../avatar_profile.png" alt="" style="display: block;">
							</div>
							<div class="menu">
								<h3>
									<?php
									echo $_SESSION['username'];
									?>
								</h3>
								<ul>
									<li>
										<span class="material-icons icons-size">person</span>
										<a href="#">My Profile</a>
									</li>
									<li>
										<span class="material-icons icons-size">mode</span>
										<a href="editaccount.php">Edit Account</a>
									</li>
									<li>
										<span class="material-icons icons-size">logout</span>
										<a href="logoutadmin.php">Menu Logout</a>
									</li>
								</ul>
							</div>
						</div>
						<script>
							function menuToggle() {
								const toggleMenu = document.querySelector('.menu');
								toggleMenu.classList.toggle('active')
							}
						</script>
					</li>
				</ul>
			</nav>
		</header>
		<!-- End Header -->

		<!-- Sidebar -->
		<?php
		include "sidebar.php";
		?>
		<!-- End Sidebar -->

		<!-- Main -->
		<main class="main-container">
			<div class="main-title">
				<p class="font-weight-bold">DATA TRANSAKSI</p>
			</div>
			<div class="container">
				<div class="modal fade" id="modalTambahData" tabindex="-1" aria-labelledby="modalTambahData" aria-hidden="true">
					<div class="modal-dialog modal-dialog-centered">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="modalTambahData">Tambah Data</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<form action="datatransaksitambah.php" method="post">
									<div class="form-group">
										<label for="nama">Nama</label>
										<input type="text" class="form-control" name="nama" placeholder="Masukkan Nama Pelanggan" autocomplete="off" required>
									</div>
									<div class="form-group">
										<label for="jenis">Jenis Kendaraan</label>
										<select name="jenis" class="form-control" id="jenis" required>
											<option value="" disable>--- Pilih Jenis Kendaraan ---</option>
											<?php
											$collection_datapaket = $db->data_paket;
											$result = $collection_datapaket->find();
											foreach ($result as $data) { ?>
												<option value="<?php echo $data['biaya'] ?>"><?php echo $data['jenis'] ?></option>
									</div>
								<?php
											}
								?>
								</select>
							</div>
							<input type="hidden" name="jenishidden" id="jenishidden">
							<div class="form-group">
								<label for="biaya">Biaya</label>
								<input type="number" class="form-control" id="biaya" name="biaya" value="" required readonly>
							</div>
							<div class="form-group">
								<label for="bayar">Bayar</label>
								<input type="number" class="form-control" id="bayar" name="bayar" placeholder="Isi dengan angka" required>
							</div>
							<div class="form-group">
								<label for="total">Total Bayar</label>
								<input type="number" class="form-control" id="total" name="total" placeholder="Total Bayar" required readonly>
							</div>
							<div class="form-group">
								<label for="kembali">Kembalian</label>
								<input type="number" class="form-control" id="kembali" name="kembali" placeholder="Kembalian" value="" required readonly>
							</div>
							<div class="form-group">
								<label class="control-label" for="date">Tanggal</label>
								<input class="form-control" id="date" name="tanggal" placeholder="MM/DD/YYY" type="text" value='<?php $mydate = getdate(date("U"));
																																echo "$mydate[weekday], $mydate[month] $mydate[mday], $mydate[year] " .  date("h:i:sa"); ?>' />
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
								<button type="submit" class="btn btn-primary">Kirim</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<a href="datatransaksitambah.php" role="button" class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalTambahData" style="margin:10px; float: right;">Tambah Data</a>
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">No. </th>
						<th scope="col">Nama</th>
						<th scope="col">Jenis Kendaraan</th>
						<th scope="col">Biaya</th>
						<th scope="col">Bayar</th>
						<th scope="col">Total</th>
						<th scope="col">kembalian</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Actions</th>
					</tr>
				</thead>
				<?php
				$collection_datapaket = $db->transaksi;
				if (isset($_POST["search"])) {

					$result = $collection_datapaket->find(array('nama' => new \MongoDB\BSON\Regex($_POST["cari"])));
				} else {
					$result = $collection_datapaket->find();
				}
				?>
				<tbody>
					<?php
					$i = 1;
					foreach ($result as $hasil) {
					?>
						<tr>
							<th scope="row"><?php echo $i++ ?></th>
							<td><?php echo $hasil['nama']; ?></td>
							<td><?php echo $hasil['jenis']; ?></td>
							<td><?php echo "Rp. " . number_format($hasil['biaya'], 0, ',', '.'); ?></td>
							<td><?php echo "Rp. " . number_format($hasil['bayar'], 0, ',', '.'); ?></td>
							<td><?php echo "Rp. " . number_format($hasil['total'], 0, ',', '.'); ?></td>
							<td><?php echo "Rp. " . number_format($hasil['kembalian'], 0, ',', '.'); ?></td>
							<td><?php echo $hasil['tanggal']; ?></td>
							<td>
								<a href="datatransaksiedit.php?id=<?php echo $hasil['_id']; ?>" role="button" class="btn btn-success">Edit</a>
								<a href="#" role="button" class="btn btn-danger btn-hapus" onclick="konfirmasiHapus(this)" data-id="<?php echo $hasil['_id']; ?>">Hapus</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
	</div>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script>
		function konfirmasiHapus(id) {
			var getId = id.getAttribute('data-id');
			var tanya = confirm('Anda yakin ingin menghapus data ini?');
			if (tanya == true) {
				window.location.replace("datatransaksihapus.php?id=" + getId);
			} else {
				return false;
			}
		}
	</script>
	<script>
		$(document).ready(function() {
			$("#jenis").change(function() {
				var b = document.getElementById('jenis');
				var c = document.getElementById('jenishidden');
				c.value = b.options[b.selectedIndex].text
				var biaya = $(this).val();
				$("#biaya").val(biaya);
			});
			$("#bayar").keyup(function() {
				var biaya = $("#biaya").val();
				var bayar = $("#bayar").val();
				$("#kembali").val(bayar - biaya);
				$("#total").val(biaya);
			});
		});
	</script>
	<script src="https://js.pusher.com/7.2/pusher.min.js"></script>
	<script>
		Pusher.logToConsole = true;
		var pusher = new Pusher('99b4eb65cb5c1f6a1420', {
			cluster: 'ap1'
		});

		var channel = pusher.subscribe('my-channel');
		channel.bind('my-event', function(data) {
			alert(JSON.stringify(data));
		});
	</script>
	</main>
	</div>
</body>

</html>