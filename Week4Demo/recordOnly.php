<?php
    extract($_POST);
    session_start();
    $number = $_SESSION['userNo'];
    echo "Loading... Please Wait";
    echo $number;
    echo $score;
    Insert($number, $score);
    die;

    function Insert($Number,$Score){
        /**
        if ($FullName != "" && $Score != "") {
            
        $f = fopen('credentials.config', 'a') or die("can't open file");
        if (fwrite($f, "\n," . $FullName . "," . $Score)) {
            echo "successful!";
        }
        fclose($f);
        } else {
            echo "invalid";
            die();// write default values or show an error message 
            }
        */
        if ($Number != "" && $Score != ""
           ) {
        $serverName = "disk1.database.windows.net";
            $connectionOptions = array(
                "Database" => "disk1",
                "Uid" => "apollo78124",
                "PWD" => "bcitGroup4$"
            );
            //Establishes the connection
            
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            
        if ($Score > 0 && $Score != "") {
        $tsql= "INSERT INTO ScoreRecord VALUES ($Number, $Score, CURRENT_TIMESTAMP);";
        $getResults= sqlsrv_query($conn, $tsql);
            if ($getResults == FALSE) {
                echo (sqlsrv_errors());
                $Message = "Cannot access the database at this moment!";
                header("location: index.php?Message={$Message}");
            }
        sqlsrv_free_stmt($stmt);
            $Message = "Recorded successfully";
        }
            
                header("location: index.php?Message={$Message}");
        } else {
            echo (sqlsrv_errors());
            $Message = "Info is not correct or not set";
            if ($Number == "")
                $Message = "Number is not correct or not set";
            header("location: index.php?Message={$Message}");
        }
    }
?>