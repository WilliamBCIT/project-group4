<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- STYLESHEETS -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="libraries/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/styles.css">

    <!-- JAVASCRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="libraries/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/overlay.js"></script>
    <script src="pixi.min.js"></script>
	<script type="text/javascript" src="game.js"></script>

    <title>Home</title>

</head>
<body>--&gt;

    <div id="menu" class="overlay-menu">
        <div class="overlay-content">
            <a id="1" href="./index.html">Game Page</a>
            <a id="2" href="./introduction.html">How to Play</a>
            <a id="3" href="./explanation.html">How to Reduce Food Waste</a>
            <a id="4" href="./leaderboardPage.php">Leaderboard</a>
            <a id="5" href="./searchScore.php">Search Your Score</a>
        </div>
    </div>

    <nav class="navbar fixed-top">
        <a class="navbar-brand" href="./index.html"><h3>Achos</h3></a>
		<a id="menu-icon-link" class="nav navbar-nav navbar-right" href="#">
            <span class="hamburger-menu-icon fas fa-bars"></span>
        </a>
    </nav>
	
    <div id="landing-container">
        <div id="landing-image">
            <div id="landing-message">
                <h2>OPERATION COMPOST</h2>
            </div>
        </div>
    </div>
    
        
        <div class="row">
        <div class="col-lg-3"></div>
            <div class="col-lg-6">
                <form action="searchScore.php" method="post">
                    <div class="form-group">
                      <h2 class = "whiteText">Find your score records by entering your name!</h2>
                      <input type="text" class="form-control" name="fullname" placeholder="Full Name">
                    </div>
                    <button type="submit" class="btn btn-default">Search!</button>
                </form>

            </div>
        <div class="col-lg-3"></div>
    </div>
    <br  /><br  /><br  />
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-6">
                <div class = "whiteText">
                <?php
                    session_start();
                    extract($_POST);

                    if (isset($fullname)) {
                    
                                $credentials = explode(",", file_get_contents("credentials.config"));
                                $size        = sizeof($credentials);
                                $fullnames      = array();
                                $scores   = array();
                                for ($i = 0; $i < $size; $i++) {
                                    if (($i % 2) == 0) {
                                        $fullnames[] = trim($credentials[$i]);
                                    }
                                }

                                for ($i = 0; $i < $size; $i++) {
                                    if (!(($i % 2) == 0)) {
                                        $scores[] = trim($credentials[$i]);
                                    }
                                }
                                echo "<h2>Search Results :</h2><br />";
                                //sorting
                                $j = 0;
                                for ($i = 0; $i < sizeof($fullnames); $i++) {
                                    if ($fullnames[$i] == $fullname) {
                                        $j++;
                                        echo $j.". ".$fullnames[$i]." ".$scores[$i]."<br />";
                                    }
                                }
                                if ($j == 0) {
                                    echo "No such person as ".$fullname."!<br />";
                                }
                    }
                    ?>
                </div>
            </div>
        <div class="col-lg-3"></div>
    </div>
    
    <footer class="footer-container jumbotron">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-lg-12"><h1>Authors</h1>
            <hr class="short-hr">
				Tommy David William Khide Sagar
			</hr>
			</div>
			<div class="col-sm-3"></div>
        </div>
    </footer>
</body>

</html>