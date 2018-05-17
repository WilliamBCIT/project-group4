<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <title>Operation Compost - Game Page</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  
  <!-- Script  -->
  <script type="text/javascript"  src="./Pixi/pixi.min.js"/></script>
  <script type="text/javascript" src="./Pixi/game.js"></script>
  <script type="text/javascript" src="./Pixi/scaleToWindow.js"></script>


  </head>
<body>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5af40a0c677ae05c"></script>
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

<div>
    <div class="section">
		<div class="row" id="main">
			<div id="game" class="teal col s12 m12 l8">
				<div id="playframe">
					<script type="text/javascript">
						Init();
					</script>
				</div>
			</div>
			<div id="leaderboard" class="green col s0 m0 l4 hide-on-med-and-down">
				
			<form action="loggedInRecordScore.php" method="post">
				<div class="form-group">
                    Login to Record Your Score <br />and Share it on Facebook!
                    <br />
                    <br />
            <?php
                if(isset($_GET['Message'])){
                    echo $_GET['Message'];
                }
			?>
					<label for="name" class = "whiteText">Email: </label>
					<input type="text" class="form-control" name="userEmail" placeholder="Enter Your Email">
                    <label for="pwd" class = "whiteText">Password: </label>
                    <input type="password" class="form-control" name="userPwd" placeholder="Enter Your Password">
					<input type="hidden" class="form-control" name="score" id = "scoreForm1">
				</div>
				<button type="submit" class="btn btn-default" onclick="setScore();">Login</button>
			</form>
			<br/>
			<form action="registration.php" method="post">
                <input type="hidden" class="form-control" name="score" id = "scoreForm2">
                    <button type="submit" class="btn btn-default" onclick="setScore();">Register</button>
            </form> 
			<br />
			<div class="addthis_inline_share_toolbox"></div>
			<h3>Your Score: </h3><h2 id="scoreUpdate"></h2>
			
			<script>
				function setScore() {
					document.getElementById("scoreForm1").value = getScore();
					document.getElementById("scoreForm2").value = getScore();
				}
			</script>

			<ul class="list-unstyled components">
				<li class="active"><h3>High Scores</h3></li>
			</ul>
			<?php
			/*
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
    
				$sql = "SELECT TOP 10 s.score, s.userNo, u.userFirstName, u.userLastName,s.dateRecorded FROM ScoreRecord s JOIN userInfo u ON s.userNo = u.userNo  ORDER BY s.score DESC;";
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
				*/
			?>
			</div>
		</div>
	</div>
</div>			
		
<div id="leaderboard2container">
	<div id="leaderboard2" class="green col s12 hide-on-large-only">				
			<form action="loggedInRecordScore.php" method="post">
				<div class="form-group">
                    Login to Record Your Score <br />and Share it on Facebook!
                    <br />
                    <br />
            <?php
                if(isset($_GET['Message'])){
                    echo $_GET['Message'];
                }
			?>
					<label for="name" class = "whiteText">Email: </label>
					<input type="text" class="form-control" name="userEmail" placeholder="Enter Your Email">
                    <label for="pwd" class = "whiteText">Password: </label>
                    <input type="password" class="form-control" name="userPwd" placeholder="Enter Your Password">
					<input type="hidden" class="form-control" name="score" id = "scoreForm3">
				</div>
				<button type="submit" class="btn btn-default" onclick="setScore();">Login</button>
			</form>
			<br/>
			<form action="registration.php" method="post">
                <input type="hidden" class="form-control" name="score" id = "scoreForm4">
                    <button type="submit" class="btn btn-default" onclick="setScore();">Register</button>
            </form> 
			<br />
			<div class="addthis_inline_share_toolbox"></div>
			<br />
			<br />
			<h3>Your Score: </h3><h2 id="scoreUpdate"></h2>
			
			<script>
				function setScore() {
					document.getElementById("scoreForm1").value = getScore();
					document.getElementById("scoreForm2").value = getScore();
				}
			</script>

			<ul class="list-unstyled components">
				<li class="active"><h3>High Scores</h3></li>
			</ul>
			<?php
			/*
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
    
				$sql = "SELECT TOP 10 s.score, s.userNo, u.userFirstName, u.userLastName,s.dateRecorded FROM ScoreRecord s JOIN userInfo u ON s.userNo = u.userNo  ORDER BY s.score DESC;";
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
				*/
			?>
	</div>
	
	
	
</div>


  <div class="container">
    <div class="section">
	
	<div class="row">
        <div class="col s12 center">
          <h4>About Operation Compost</h4>
          <p class="left-align light">Operation Compost is a tower defense game aimed at casual gamers to educate the public about how to reduce food waste. The game has been developed by Group 4 Achos, the ultimate dysfunctional team handpicked by Project Manager David Lee. The main goal of the game is to process food before it reaches the garbage bin at the end of the path and is wasted. The user places different towers along the track where food will flow towards the garbage bin. The more food waste reduced, the higher the score. </p>
        </div>
      </div>
	

	<div class="row">
        <div class="col s12 center">
          <h4>How To Play</h4>
          <p class="left-align light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a sapien id, viverra ultrices eros. Morbi sem neque, posuere et pretium eget, bibendum sollicitudin lacus. Aliquam eleifend sollicitudin diam, eu mattis nisl maximus sed. Nulla imperdiet semper molestie. Morbi massa odio, condimentum sed ipsum ac, gravida ultrices erat. Nullam eget dignissim mauris, non tristique erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;</p>
        </div>
      </div>
	
	
	<div class="row">
        <div class="col s12 center">
          <h4>Towers</h4>
        </div>
      </div>
      <div class="row">
        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerCompost.png" alt="Compost Bin"></div>
		  <h5 class="center">Compost Tower</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/garbageBin.png" alt="Compost Bin"></div>
		  <h5 class="center">Garbage Bin</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerDonate.png" alt="Compost Bin"></div>
		  <h5 class="center">Donation Tower</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>
		<div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerFarm.png" alt="Compost Bin"></div>
		  <h5 class="center">Farm</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerWater.png" alt="Compost Bin"></div>
		  <h5 class="center">Water Tower</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerFuelALT.png" alt="Compost Bin"></div>
		  <h5 class="center">Fuel Tower</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>
		<div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerRecycle.png" alt="Compost Bin"></div>
		  <h5 class="center">Recycle Tower</h5>

            <p class="light">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam scelerisque id nunc nec volutpat. Etiam pellentesque tristique arcu, non consequat magna fermentum ac. Cras ut ultricies eros. Maecenas eros justo, ullamcorper a</p>
          </div>
        </div>
      </div>
<!-- second row -->
	  
	  
    </div>
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
