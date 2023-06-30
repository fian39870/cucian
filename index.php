<?php
include "config.php";
session_start();
if(!isset($_SESSION['username1'])){
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman User</title>
    <link rel="stylesheet" href="menuUserstyle.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="menustyle2.css">
</head> 

<body>
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="menuUser.php"><img src="logo.png" alt="logo" width="60px"></a>
                </div>
                <nav>
                    <ul id="MenuItems">
                        <li><a href="menuUser.php">Home</a></li>
                        <li><a href="booking.php">Booking</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li>
                    <div class="action">
                        <div class="profile" onclick="menuToggle();">
                        <img src="avatar_profile.png" alt="">
                        </div>
        <div class="menu">
            <h3>
                <?php
                echo $_SESSION['username1'];
                ?>
            </h3>
            <ul>
                <li>
                    <span class="material-icons icons-size">person</span>
                    <a href="#">My Profile</a>
                </li>
                <li>
                    <span class="material-icons icons-size">mode</span>
                    <a href="#">Edit Account</a>
                </li>
                <li>
                    <span class="material-icons icons-size">logout</span>
                    <a href="logout.php">Logout</a>
                </li>
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
            </div>
            <div class="row">
                <div class="col-2">
                    <h1>Berikan Mobil Dan Motormu, <br> Penampilan Baru!</h1>
                    <p>Tempat cuci motor dan Mobil terbaik yang ada dijepara</p>
                    <a href="booking.php" class="btn">Booking &#8594;</a>
                </div>
                <div class="col-2">
                    <img src="logomenuUser.png">
                </div>
            </div>
        </div>
</div>  
    <div class="small-container">
        <h2 class="title">Layanan yang tersedia</h2>
        <div class="row">
            <div class="col-4">
                <a href="booking.php"><img src="mobil.png">
                <h4>Cuci Mobil Exterior dan Interior</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <p>Rp.20.000</p>
                </a>
            </div>
           
            <div class="col-4">
            <a href="booking.php">
                <img src="motor.jpg">
                <h4>Cuci Motor</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rp.10.000</p>
                </a>
            </div>
            
            <div class="col-4">
            <a href="booking.php">
                <img src="mobil2.png">
                <h4>Cuci Mobil Exterior</h4>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star-o"></i>
                </div>
                <p>Rp.10.000</p>
                </a>
            </div>
       
           
        </div>
    </div>
    <div class="offer">
        <div class="small-container">
            <div class="row">
                <div class="col-2">
                    <img src="mobil.png" class="offer-img">
                </div>
                <div class="col-2">
                    <p>Best Booking</p>
                    <h1>CUCI EXTERIOR DAN INTERIOR</h1>
                    <small>Membuat mobil anda mengkilap luar dalam<br></small>
                    <a href="booking.php" class="btn">Pesan Sekarang &#8594;</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonial -->
    
    <!-- Brands -->

    <!-- Footer -->
    <div class="footer">
            <p class="copyright">Copyright 2022 - Ahmad Sofian</p>
    </div>

    <!-- javascript -->

    

</body>

</html>