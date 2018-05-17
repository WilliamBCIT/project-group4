<?php
    extract($_POST);
    $_SESSION["sscore"] = $score;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Account Registration</title>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


        <!-- Bootstrap CSS CDN -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <!-- Our Custom CSS -->
	<link rel="stylesheet" href="./css/style2.css">
	<link rel="stylesheet" href="./css/style2.css">
	<script type="text/javascript"  src="./pixi.min.js"/></script>
	<script type="text/javascript" src="./scaleToWindow.js"></script>
	<script type="text/javascript" src="./game.js"></script>
    
</head>
<body>
	<div class="container-fluid" id="registration input">
        <p>You scored : <?php echo $_SESSION["sscore"] ?></p>
		<!-- EDIT THIS  action-->
			<form action="register.php" method="post">
			  <div class="form-group">
                  <label for="email">Email:</label>
				<input type="email" class="form-control" name="email">
			  </div>
			  <div class="form-group">
				<label for="uname">First Name:</label>
				<input type="text" class="form-control" name="fname">
			  </div>
            <div class="form-group">
				<label for="uname">Last Name:</label>
				<input type="text" class="form-control" name="lname">
			  </div>
			  <div class="form-group">
				<label for="pwd">Password:</label>
				<input type="password" class="form-control" name="pwd">
			  </div>

			  <button type="submit" class="btn btn-default">Create Account</button>
			</form>
	</div>
</body>
</html>
