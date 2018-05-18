<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Operation Compost - Sign Up</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Achos</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./index.php">Game Page</a></li>
        <li><a href="./leaderboard.php">Leader board</a></li>
		<li><a href="./signup.php">Sign Up</a></li>
        <li><a href="./scorehistory.php">Score History</a></li>
        <li><a href="./plantsitemap.php'">Nearest Compost Site</a></li>

      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="./index.php">Game Page</a></li>
        <li><a href="./leaderboard.php">Leader board</a></li>
		<li><a href="./signup.php">Sign Up</a></li>
        <li><a href="./scorehistory.php">Score History</a></li>
        <li><a href="./plantsitemap.php'">Nearest Compost Site</a></li>

		</ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


<div class="row">
    <form class="col s12" action="register.php" method="post">
	  <div class="row center">
	  <h3>Sign Up</h3>
          <p>You scored : <?php echo $_SESSION["sscore"] ?></p>
	  </div>
      <div class="row">
		<div class="input-field col s3"></div>
        <div class="input-field col s12 m6">
          <input type="email" class="validate" name="email">
          <label for="email">Email</label>
        </div>
		<div class="input-field col s3"></div>
	  </div>
      <div class="row">
		<div class="input-field col s3"></div>
        <div class="input-field col s12 m6">
          <input type="text" class="form-control" name="fname">
          <label for="fname">First Name</label>
        </div>
		<div class="input-field col s3"></div>
	  </div>
      <div class="row">
		<div class="input-field col s3"></div>
        <div class="input-field col s12 m6">
          <input type="text" class="form-control" name="lname">
          <label for="fname">Last Name</label>
        </div>
		<div class="input-field col s3"></div>
	  </div>
      <div class="row">
	    <div class="input-field col s0 m3"></div>
		<div class="row">
        <div class="input-field col s12 m6">
          <input type="password" class="validate" name="pwd">
          <label for="password">Password</label>
        </div>
      </div>
          <button type="submit" class="btn btn-default">Create Account</button>
	    <div class="input-field col s0 m3"></div>
	  </div>
	</form>
    
    
		<!-- EDIT THIS  action-->
</div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light">Please kill me</h5>
        </div>
      </div>
    </div>
    <div class="parallax"><img src="background3.jpg" alt="Unsplashed background img 2"></div>
  </div>



  <footer class="page-footer teal">
    <div class="container">
      <div class="row">
        <div class="col s6">
          <h5 class="white-text">Achos</h5>
          <ul class="grey-text text-lighten-4">
			<li>Tommy</li>
			<li>Sagar</li>
			<li>David</li>
			<li>Khide</li>
			<li>William</li>
		  </ul>


        </div>
        <div class="col s6">
          <h5 class="white-text">Email</h5>
          <ul>
            <li><a class="white-text" href="#!">tommy@email.com</a></li>
            <li><a class="white-text" href="#!">sagar@email.com</a></li>
            <li><a class="white-text" href="#!">david@email.com</a></li>
            <li><a class="white-text" href="#!">khide@email.com</a></li>
            <li><a class="white-text" href="#!">william@email.com</a></li>
          </ul>
        </div>

      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
