<?php
    include '../config.php';
	session_start();
	if(!isset($_SESSION['username'])){
		header("Location: login.php");
	}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="profile.css">
  <link rel="stylesheet" href="indexstyle.css">
	

  </head>
  <body>
  <div class="grid-container">
    <header class="header" >
	<nav>
                    <ul id="MenuItems" style="list-style-type: none" >
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
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> Sop's Washing
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list" >
        <a href="index.php" style="text-decoration:none; color: white;">
          <li class="sidebar-list-item">
              <span class="material-icons-outlined">dashboard</span> Dashboard
          </li>
          </a>

          <a href="datapaket.php" style="text-decoration:none; color: white;">
          <li class="sidebar-list-item">
              <span class="material-icons-outlined">inventory_2</span> Data Paket 
          </li>
          </a>

          <a href="datatransaksi.php" style="text-decoration:none; color: white;">
          <li class="sidebar-list-item">
              <span class="material-icons-outlined">fact_check</span> Transaksi
          </li>
          </a>
          <a href="datacontact.php" style="text-decoration:none; color: white;">
          <li class="sidebar-list-item">
              <span class="material-icons-outlined">add_shopping_cart</span> Data Contact
          </li>
          </a>

          <a href="datauser.php" style="text-decoration:none; color: white;">
          <li class="sidebar-list-item">
              <span class="material-icons-outlined">shopping_cart</span> Data pengguna
          </li>
          </a>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <p class="font-weight-bold">DASHBOARD</p>
        </div>

        <div class="main-cards">
        <a href="datapaket.php" style="text-decoration:none; color: black;">
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">DATA PAKET</p>
              <span class="material-icons-outlined text-blue">inventory_2</span>
            </div>
            <span class="text-primary font-weight-bold"><?php  $collection_datapaket = $db->data_paket; echo $collection_datapaket->count();?></span>
          </div>
          </a>
          <a href="datatransaksi.php" style="text-decoration:none; color: black;">
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">TRANSAKSI</p>
              <span class="material-icons-outlined text-orange">add_shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"><?php  $collection_datapaket = $db->transaksi; echo $collection_datapaket->count();?></span>
          </div>
        </a>
        <a href="datacontact.php" style="text-decoration:none; color: black;">
          <div class="card">
          
            <div class="card-inner">
              <p class="text-primary">CONTACT</p>
              <span class="material-icons-outlined text-green">shopping_cart</span>
            </div>
            <span class="text-primary font-weight-bold"><?php  $collection_datapaket = $db->contact; echo $collection_datapaket->count();?></span>
          </div>
          </a>
          <a href="datauser.php" style="text-decoration:none; color: black;">
          <div class="card">
            <div class="card-inner">
              <p class="text-primary">DATA USER</p>
              <span class="material-icons-outlined text-red">notification_important</span>
            </div>
            <span class="text-primary font-weight-bold"><?php  $collection_datapaket = $db->user; echo $collection_datapaket->count();?></span>
          </div>
          </a>
        </div>

      </main>
      <!-- End Main -->

    </div>
    <!-- Custom JS -->
    <script src="js/scripts.js"></script>
  </body>
</html>