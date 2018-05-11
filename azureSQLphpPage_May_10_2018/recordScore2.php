<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Azure server test.</title>
  </head>
  <body>

<?php
    session_start();
    extract($_POST);
    Insert($fullname, $score);
    header("location: index.html");
    session_unset();
    session_destroy();
    die();
      
   

    function Insert($FullName,$Score){
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
        $serverName = "disk1.database.windows.net";
            $connectionOptions = array(
                "Database" => "disk1",
                "Uid" => "apollo78124",
                "PWD" => "bcitGroup4$"
            );
            //Establishes the connection
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            $tsql= "INSERT INTO dbo.ScoreRecord VALUES (692, $Score, GETDATE(), '$FullName');";
            $getResults= sqlsrv_query($conn, $tsql);
            if ($getResults == FALSE) {
                echo (sqlsrv_errors());
                echo "Fail";
            }
                
            sqlsrv_free_stmt($getResults);
        }
    ?>

  </body>
</html>