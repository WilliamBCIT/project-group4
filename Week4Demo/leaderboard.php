<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Operation Compost - Leader Board</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="#" class="brand-logo">Achos</a>
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


  <div class="container">
    <div class="section">
		<h3>Hall of Fame</h3>
		
		
	<?php
extract($_POST);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Leaderboard.</title>
  </head>
  <body>
<p>
<?php
        $serverName = "disk1.database.windows.net";
            $connectionOptions = array(
                "Database" => "disk1",
                "Uid" => "apollo78124",
                "PWD" => "bcitGroup4$"
            );
            //Establishes the connection
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            if( $conn === false ) {
                die( print_r( sqlsrv_errors(), true));
            }
    
        $sql = "SELECT TOP 10 s.score, s.userNo, u.userFirstName, u.userLastName,s.dateRecorded FROM ScoreRecord s JOIN userInfo u ON s.userNo = u.userNo ORDER BY s.score DESC;";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            $j = 1;
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                  echo $j.". ".$row['userFirstName']." ".$row['userLastName']." ".$row['score']." ".date_format($row['dateRecorded'], 'y/m/d')."<br />";
                $j++;
            }

            sqlsrv_free_stmt( $stmt);

?>
		
		
	
	</div>
  </div>


  <div class="parallax-container valign-wrapper">
    <div class="section no-pad-bot">
      <div class="container">
        <div class="row center">
          <h5 class="header col s12 light"></h5>
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
