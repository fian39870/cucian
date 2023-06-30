<?php
    include '../config.php';
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
	}
    $collection_datapaket = $db->user;


?>
<!DOCTYPE html>
<html lang="id">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data User</title>

	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="profile.css">

</head>
<body>
<div class="grid-container">
    <header class="header" >
	<nav style="list-style-type: none">
                    <ul id="MenuItems" >
                        <li>
						<div class="search-container" style="position: flex; margin-right: 70px;   float: right;">
						<form action="" method="post">
						<input type="text" name="cari" placeholder="search..." style="padding: 6px;border: none;margin-top: 5px;font-size: 17px;border: 1px solid #ccc;">
						<button style="float: right;padding: 6px 10px;margin-top: 6px;margin-right: 16px;background: #ddd;font-size: 18px;border: none;cursor: pointer;" type="submit" name="search"><i class="fa fa-search"></i></button >
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
        function menuToggle(){
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
	  include"sidebar.php";
	  ?>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
	  <div class="main-title">
          <p class="font-weight-bold">DATA USER</p>
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
						<form action="datausertambah.php" method="post">
						<div class="form-group">
						<div class="row">
						<div class="col"><input type="text" class="form-control" name="first_name" placeholder="First Name" required="required"></div>
						<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Last Name" required="required"></div>
						</div>        	
        				</div>
        				<div class="form-group">
        				<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        				</div>
						<div class="form-group">
		                    <label for="role">Role</label>
			                <select name="role" class="form-control" id="role" required>
				            <option value="" disable>--- Pilih Role ---</option>
					        <option value="user">User</option>
							<option value="admin">Admin</option>
			                </select>
	                        </div>
        				<div class="form-group">
        				<input type="email" class="form-control" name="email" placeholder="Email" required="required">
        				</div>
						<div class="form-group">
           				<input type="password" class="form-control" name="password" placeholder="Password" required="required">
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
		<a href="datausertambah.php" role="button" class="btn btn-primary btn-tambah" data-toggle="modal" data-target="#modalTambahData" style="margin:10px; float: right;">Tambah Data</a>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">No.</th>
					<th scope="col">Nama</th>
					<th scope="col">Role</th>
					<th scope="col">Username</th>
					<th scope="col">Email</th>
					<th scope="col">Password</th>
					<th scope="col">Actions</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$collection_datapaket = $db->user;
		if (isset($_POST["search"])){
			
			$result = $collection_datapaket->find(array('username' => new \MongoDB\BSON\Regex($_POST["cari"])));
		}else{
			$result = $collection_datapaket->find();
		}
				$i = 1;
				foreach($result as $hasil){
				$firstname = $hasil['profile']['fname'];
    			$lastname = $hasil['profile']["lname"];
    			$fullname = $firstname." ".$lastname;
				?>
				<tr>
					<th scope="row"><?php echo $i++ ?></th>
					<td><?php echo $fullname; ?></td>
					<td><?php echo $hasil['role']; ?></td>
					<td><?php echo $hasil['username']; ?></td>
					<td><?php echo $hasil['profile']['email']; ?></td>
					<td><?php echo $hasil['password']; ?></td>
					<td>
						<a href="datauseredit.php?id=<?php echo $hasil['_id']; ?>" role="button" class="btn btn-success">Edit</a>
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
			
			if(tanya == true) {
				window.location.replace("datauserhapus.php?id=" + getId);
			} else {
				return false;
			}
		}
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