<?php
session_start();
?>
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
  <!-- <script src='ingameLeaderboard.php' type='text/javascript'></script> -->
  


  </head>
<body>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5af40a0c677ae05c"></script>
  <nav class="white" role="navigation">
    <div class="nav-wrapper container">
      <a id="logo-container" href="index.php" class="brand-logo">Achos</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="./index.php">Game Page</a></li>
        <li><a href="./leaderboard.php">Leader board</a></li>
		<li><a href="./signup.php">Sign Up</a></li>
        <li><a href="./scorehistory.php">Score History</a></li>
        <li><a href="./plantsitemap.php">Nearest Compost Site</a></li>

      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="./index.php">Game Page</a></li>
        <li><a href="./leaderboard.php">Leader board</a></li>
		<li><a href="./signup.php">Sign Up</a></li>
        <li><a href="./scorehistory.php">Score History</a></li>
        <li><a href="./plantsitemap.php">Nearest Compost Site</a></li>

	  </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>


  
<div id="a1" class="valign-wrapper">
<div id="a2" class="section responsive-image">
<div id="containerclass" class="container">
  <div class="section">
		<div class="row" id="main">
			<div class="col s0 m2 l1"></div>

			<div id="game" class="teal col s12 m8 l6">
				<div id="playframe">
					<script type="text/javascript">
						Init();
					</script>
				</div>
			</div>
			<div id="leaderboard" class="green col s0 m0 l4 hide-on-med-and-down">
                <div class = "warning"> 
                        <?php
                        
                            if(isset($_GET['Message'])){
                                echo $_GET['Message'];
                            }
                        ?>
                        </div>
                <?php 
				/*
                //echo "Hi <button>".$row['userFirstName']."</button></form><br />Record your current score by clicking the button below!<br />";
                 
                if(isset($_SESSION['userNo']))
                   {
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
                    $number = $_SESSION['userNo'];
                $sql = "SELECT userNo, userFirstName FROM userInfo WHERE userNo = $number;";
                    $stmt = sqlsrv_query( $conn, $sql );
                    if( $stmt === false) {
                        die( print_r( sqlsrv_errors(), true) );
                    }
                    while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                        echo "Hi <button class=\"btn btn-primary btn-sm\">".$row['userFirstName']."</button></form><br />Record your current score by clicking the button below!<br />";
                    }
                    sqlsrv_free_stmt( $stmt);}
					*/
					?>
                
                    <?php if(!isset($_SESSION['userNo'])) echo "<!--";?>
                    <form action="recordOnly.php" method="post">
                        <input type="hidden" class="form-control" name="score" id = "scoreForm3">
                        <button type="submit" class="btn btn-default" onclick="setScore3();">Record Current Score</button>
                    </form>
                    <form action="logout.php" method="post">
                        <button type="submit" class="btn btn-default">Logout</button>
                    </form>
                    <?php if(!isset($_SESSION['userNo'])) echo "-->";?>
                
                   <?php if(isset($_SESSION['userNo'])) {echo "<!--";
                   } else {
                        echo "Login to record your score";}
						
						?>
                
			<form action="loggedInRecordScore.php" method="post">
				<div class="form-group">
					<label for="name" class = "whiteText">Email: </label>
					<input type="email" class="form-control" name="userEmail" placeholder="Enter Your Email">
                    <label for="pwd" class = "whiteText">Password: </label>
                    <input type="password" class="form-control" name="userPwd" placeholder="Enter Your Password">
					<input type="hidden" class="form-control" name="score" id = "scoreForm1">
				</div>
				<button type="submit" class="btn btn-default" onclick="setScore1();">Login</button>
			</form>
            <form action="signup.php" method="post">
                <input type="hidden" class="form-control" name="score" id = "scoreForm2">
                    <button type="submit" class="btn btn-default" onclick="setScore2();">Register</button>
            </form>
    <?php if(isset($_SESSION['userNo']))
                   {
                    echo "-->";
                   }
				   
				
				   ?>
			<div></div>

			<br/> 
			<div></div>
			<br />
			<div class="addthis_inline_share_toolbox"></div>
			
			<script>
				function setScore1() {
					document.getElementById("scoreForm1").value = getScore();
				}
                function setScore2() {
					document.getElementById("scoreForm2").value = getScore();
				}
                function setScore3() {
					document.getElementById("scoreForm3").value = getScore();
				}
                function setScore4() {
					document.getElementById("scoreForm4").value = getScore();
				}
                function setScore5() {
					document.getElementById("scoreForm5").value = getScore();
				}
			</script>

			<ul class="list-unstyled components">
				<li class="active"><h4>High Scores</h4></li>
			</ul>
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
                     */
                ?>
			</div>
			<div class="col s0 m2 l1"></div>

		</div>
	</div>
</div>
</div>
</div>
<br/>
<div id="leaderboard2container">
	<div id="leaderboard2" class="green col s12 hide-on-large-only">
	<br/>
	
			<form action="loggedInRecordScore.php" method="post">
				<div class="form-group">
				
				 <?php
                if(isset($_GET['Message'])){
                    echo $_GET['Message'];
                }
				?>	
				
					<label for="name" class = "whiteText">Email: </label>
					<input type="email" class="form-control" name="userEmail" placeholder="Enter Your Email">
                    <label for="pwd" class = "whiteText">Password: </label>
                    <input type="password" class="form-control" name="userPwd" placeholder="Enter Your Password">
					<input type="hidden" class="form-control" name="score" id = "scoreForm5">
				</div>
				<button type="submit" class="btn btn-default" onclick="setScore5();">Login</button>
			</form>
            <form action="signup.php" method="post">
                <input type="hidden" class="form-control" name="score" id = "scoreForm4">
                    <button type="submit" class="btn btn-default" onclick="setScore4();">Register</button>
            </form>
			<br />
			<div class="addthis_inline_share_toolbox"></div>
			<br />
			<br />
			<h3>Your Score: </h3><h2 id="scoreUpdate"></h2>

			<ul class="list-unstyled components">
				<li class="active"><h4>High Scores</h4></li>
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
                
	<br/>
	<br/>
	</div>

		
			
			
		</div>
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
          <p class="left-align light">When we first meet the Boy Genius, he is in a sad town full of people who waste their food. Your job is to place towers around the town, so that no food goes into the garbage bin. Each tower takes in certain foods and gives you score and money. To put a tower on the map, simply click on the tower you want to select and then click on a spot on the map where you would like to place the tower. Keep track of your money, score, and lives in the bar at the top of the screen.  As you move on from wave to wave you will notice the town getting greener!</p>
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

          <p class="light"><i>Price: </i>$250<br />
			<i>Speed: </i>Slow<br />
			This simple tower, a modest wooden box that help produces fertile soil, will accept any non-liquid item that comes along.
		  </p>
		  </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/garbageBin.png" alt="Garbage Bin"></div>
		  <h5 class="center">Garbage Bin</h5>

		  <p class="light"><i>Price: </i>Far Too Great<br />
			<i>Speed: </i>Devastatingly Quick<br />
			Any time food waste is not saved using one of the other towers, this garbage bin at the end of the conveyor system will begin to fill. Garbage will reduce the health of the town. Too much garbage will mean Game Over!
		  </p>         

		  </div>
          </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerDonate.png" alt="Compost Bin"></div>
		  <h5 class="center">Donation Tower</h5>

            <p class="light"><i>Price: </i>$400<br />
			<i>Speed: </i>Fast<br />
			A tower that helps collect food items for those in need. While it does not accept as many items as other towers, it helps prevent food waste quickly.
			</p>
          </div>
        </div>
		</div>
		<div class="row">

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerWater.png" alt="Compost Bin"></div>
		  <h5 class="center">Water Tower</h5>

            <p class="light"><i>Price: </i>$900<br />
			<i>Speed: </i>Fast<br />
			One of the Boy Genius' greatest inventions! It will purify water at record volume and speed, and help keep the world healthy.
			</p>
          </div>
        </div>

        <div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerFuelALT.png" alt="Compost Bin"></div>
		  <h5 class="center">Fuel Tower</h5>

            <p class="light"><i>Price: </i>$1200<br />
			<i>Speed: </i>Average<br />
			An unfortunate yet necessary tower, this factory is able to process everything except meats. Despite being the least environmentally-friendly tower, it still provides the only solution to safely process oil.</p>
		  </div>
        </div>
		<div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerRecycle.png" alt="Compost Bin"></div>
		  <h5 class="center">Recycle Tower</h5>

            <p class="light"><i>Price: </i>$650<br />
			<i>Speed: </i>Average<br />
			A useful tower that helps recycle food and water so it won't go to waste.
			</p>
          
		  </div>
        </div>
		</div>
		<div class="row">

				<div class="col s12 m4">
          <div class="icon-block">
		  <div class="center"><img src="img/towerFarm.png" alt="Compost Bin"></div>
		  <h5 class="center">Farm</h5>

            <p class="light"><i>Price: </i>$770<br />
			<i>Speed: </i>Fast<br />
			This tower is full of hungry livestock! It will quickly take in all meat products that pass by.
			</p>


          </div>
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
