<?php
extract($_POST);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Azure server test.</title>
  </head>
  <body>

<?php
    echo "Loading... Please Wait";
    $userEmail = filter_var($userEmail);
    $userPwd = filter_var($userPwd);
    $score = filter_var($score);
    Insert($userEmail, $userPwd, $score);
    die;
    function Insert($Email,$Pwd,$Score){
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
        if ($Email != "" && $Pwd != "" 
            && $Score != ""
           ) {
        $serverName = "disk1.database.windows.net";
            $connectionOptions = array(
                "Database" => "disk1",
                "Uid" => "apollo78124",
                "PWD" => "bcitGroup4$"
            );
            //Establishes the connection
            
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            $tsql= "SELECT userNo FROM dbo.userInfo 
WHERE userEmail LIKE '$Email' AND userPwd LIKE '$Pwd';";
            
        //Get the number of the user. 
        $stmt = sqlsrv_query($conn, $tsql);
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true));
            echo (sqlsrv_errors());
            $Message = "User does not exist!";
            header("location: index.php?Message={$Message}");
        }

        while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
            $userNo = $row['userNo'];
        }
            
        
        $tsql= "INSERT INTO ScoreRecord VALUES ($userNo, $Score, CURRENT_TIMESTAMP);";
        $getResults= sqlsrv_query($conn, $tsql);
            if ($getResults == FALSE) {
                echo (sqlsrv_errors());
                $Message = "Cannot access the database at this moment!";
                header("location: index.php?Message={$Message}");
            }
        sqlsrv_free_stmt($stmt);
                header("location: index.php?Message={$Message}");
        } else {
            echo (sqlsrv_errors());
            $Message = "Info is not correct or not set";
            header("location: index.php?Message={$Message}");
        }
    }
?>

  </body>
</html>