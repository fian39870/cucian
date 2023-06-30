<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
<title>PROFILE</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="registrationstyle.css">
</head>
<?php
    include 'config.php';
    $collection_datapaket = $db->user;
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
	$result = $collection_datapaket->find(["_id"=> $id]);
    foreach($result as $data){
?>
<body>
<div class="signup-form">
    <form action="registrationcontroller.php" method="post">
		<h2>EDIT PROFILE</h2>
		<p class="hint-text">Edit Profile</p>
        <div class="form-group">
            
			<div class="row">
				<div class="col"><input type="text" class="form-control" name="first_name" placeholder="Edit First Name" value="<?php echo $data['profile']['fname']; ?>" required="required">
            </div>
				<div class="col"><input type="text" class="form-control" name="last_name" placeholder="Edit Last Name" value="<?php echo $data['profile']['lname']; ?>" required="required"></div>
			</div>        	
        </div>
        <div class="form-group">
        	<input type="text" class="form-control" name="username" placeholder="Username" value="<?php echo $data['username']; ?>" required="required">
        </div>
        <div class="form-group">
        	<input type="email" class="form-control" name="email" placeholder="Email" value="<?php echo $data['profile']['email']; ?>" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password" required="required">
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" required="required">
        </div>  
        <?php
         }
         ?>      
		<div class="form-group">
         <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Confirm</button></a>
        </div>
    </form>
    
</div>
</body>
</html>