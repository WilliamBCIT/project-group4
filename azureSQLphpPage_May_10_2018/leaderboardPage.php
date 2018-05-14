<?php?>
<!DOCTYPE html>
<!-- saved from url=(0044)https://tommyyeh0505.github.io/Term-Project/ -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <!-- STYLESHEETS -->
    <link href="./Home_files/css" rel="stylesheet">
    <link href="./Home_files/css(1)" rel="stylesheet">
    <link href="./Home_files/all.css" rel="stylesheet">
    <link rel="stylesheet" href="./Home_files/bootstrap.min.css">
    <link rel="stylesheet" href="./Home_files/styles.css">
	<link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
	

    <!-- JAVASCRIPT -->
    
    <script src="./Home_files/bootstrap.min.js.download"></script>
    <title>Leaderboard test page</title>

	
</head><body>--&gt;
    <nav class="navbar fixed-top">
        <a class="navbar-brand" href="./index.html"><h3>Achos</h3></a>
		<a class="navbar-brand" href="./index.html">Game Page</a>
		<a class="navbar-brand" href="./gameManual.html">Game Manual</a>
		<a class="navbar-brand" href="./explanation.html">Explanation</a>
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
	<!-- LINK HTML5 GAME IN HERE -->
    <div class="wide-text-container jumbotron">
        <div class="wide-text-holder-quote">
            <?php
                    extract($_POST);

                    $credentials = explode(",", file_get_contents("credentials.config"));
                    $size        = sizeof($credentials);
                    $fullnames      = array();
                    $scores   = array();
                    $tempMax = 0;
                    $tempPos = 0;
                    $topTen = array();
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
                     
                    //sorting
                    for ($k = 0; $k < 10; $k++) {
                        $tempMax = 0;
                        for ($i = 0; $i < sizeof($scores); $i++) {
                            if ($scores[$i] >= $tempMax && !in_array($i, $topTen)) {
                                $tempMax = $scores[$i];
                                $tempPos = $i;
                            }
                            
                        }
                        $topTen[] = $tempPos;
                    }
                    for ($i = 0; $i < sizeof($topTen); $i++) {
                        echo ($i+1).". ".$fullnames[$topTen[$i]]." ".$scores[$topTen[$i]]."<br />";
                    }
                ?>
        </div>
    </div>

    <footer class="footer-container jumbotron">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <div>
                    <h2>Operation Compost</h2>
                </div>

                <div class="footer-contact">
                    <p>E:
                        <a href="https://tommyyeh0505.github.io/Term-Project/EMAIL">elee277@my.bcit.ca</a></p>
                </div>
                <div>
                    <span id="authors">Tommy ◆ Sagar ◆ William ◆ Khide ◆ David</span>
                </div>
                <!-- <hr class="short-hr"> fix later--> 
            </div>
            <div class="col-sm-3"></div>
        </div>
    </footer>



</body></html>