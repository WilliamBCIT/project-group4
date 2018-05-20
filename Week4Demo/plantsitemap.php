<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Achos</title>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


        <!--Bootstrap CSS CDN-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
        <!-- Our Custom CSS -->
	<link rel="stylesheet" href="./css/style2.css">
	<link rel="stylesheet" href="./css/style.css">
	<script type="text/javascript"  src="./pixi.min.js"/></script>
	<script type="text/javascript" src="./scaleToWindow.js"></script>
	<script type="text/javascript" src="./game.js"></script>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      var map;
      var infowindow;

      function initMap() {
        var pyrmont = {lat: 49.252378, lng: -123.001170, };

        map = new google.maps.Map(document.getElementById('map'), {
          center: pyrmont,
          zoom: 12
        });
          
          var request = {
            location: pyrmont,
            radius: '50000',
            query: 'compost'
            };

            var service = new google.maps.places.PlacesService(map);
        service.textSearch(request, callback);
        infowindow = new google.maps.InfoWindow();
          
      }

      function callback(results, status) {
        if (status === google.maps.places.PlacesServiceStatus.OK) {
          for (var i = 0; i < results.length; i++) {
            createMarker(results[i]);
          }
        }
      }

      function createMarker(place) {
        var placeLoc = place.geometry.location;
        var marker = new google.maps.Marker({
          map: map,
          position: place.geometry.location
        });

        google.maps.event.addListener(marker, 'click', function() {
          infowindow.setContent(place.name);
          infowindow.open(map, this);
        });
      }
    </script>
    
</head>
<body>
    <div class = "whole">
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5af40a0c677ae05c"></script>
	<div class="container-fluid">
	  <div class="row row-gutters">
		<div class="col-3 d-none d-md-block">
            <!-- Sidebar Holder -->
            <nav id="sidebar">
                <div class="sidebar-header">
                    <h3>Compost Sites Near You!</h3>
                </div>

                <ul class="list-unstyled components">
                    <p>Dummy Heading</p>
                    <li class="active">
                        <a href="index.php" >Game</a>
                    </li>
                    <li>
                        <a href="#">About</a>
                        <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">How to reduce Waste</a>
                        <ul class="collapse list-unstyled" id="pageSubmenu">
                            <li><a href="#">Feed Animals</a></li>
                            <li><a href="#">Micro Organisms</a></li>
                            <li><a href="#">Fuel Conversion</a></li>
                            <li><a href="#">Donation</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="leaderboardPage.php">Leaderboard</a>
                    </li>
                    <li>
                        <a href="#">Game Manual</a>
                    </li>
                </ul>

                <ul class="list-unstyled CTAs">
                    <li>Tommy</li>
                    <li>William</li>
                    <li>Khide</li>
                    <li>David</li>
                    <li>Sagar</li>
                </ul>
				
                		
            </nav>
		</div>
		<div class="col-md-6 col-lg-6 col-sm-12 col-xs-12">
            <!-- Page Content Holder -->
            <div id="middleblock">
                <div id="map"></div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBITrFt7F42rJEkoicjWu5gQhpqTitAZw8&libraries=places&callback=initMap" async defer></script>
			</div>
                
        </div>
		<!-- Leaderboard holder -->

		<div class="col-3 d-none d-md-block">
			<nav id="leaderboard" >
                <div class="leaderboard-header ">
                   <div class = "warning"> 
                        <?php
                        
                            if(isset($_GET['Message'])){
                                echo $_GET['Message'];
                            }
                        ?>
                        </div>
                <?php 
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
                    sqlsrv_free_stmt( $stmt);}?>
                
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
                        echo "Login to record your score";}?>
                
			<form action="loggedInRecordScore.php" method="post">
				<div class="form-group">
					<label for="name" class = "whiteText">Email: </label>
					<input type="text" class="form-control" name="userEmail" placeholder="Enter Your Email">
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
                   }?>
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
                    <br />
			<ul class="list-unstyled components">
				<li class="active"><h3>High Scores</h3></li>
			</ul>
			<?php
                extract($_POST);
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
?>
					</div>
				</div>
            </nav>
		</div>
	</div>
</div>
        </div>
</body>
</html>
