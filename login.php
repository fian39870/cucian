<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="registrationstyle.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<body>
<div class="signup-form">
    <form action="logincontroller.php" method="post">
    <center>
    <img src="logo.png" style="width: 230px; height: 200px;">
    </center>
		<h2>Login</h2>
		<p class="hint-text">Silahkan Login</p>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		      
		<div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Login</button>
        </div>
    </form>
	<div class="text-center">Daftar? <a href="registration.php">Sign up</a></div>
</div>
</body>
</html>