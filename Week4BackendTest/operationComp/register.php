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
    Register($email, $fname, $lname, $pwd);
    die();
    function Register($email, $fname, $lname, $pwd){
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
        if ($email != "" && $pwd != "" 
            && $fname != "" && $lname != ""
           ) {
        $serverName = "disk1.database.windows.net";
            $connectionOptions = array(
                "Database" => "disk1",
                "Uid" => "apollo78124",
                "PWD" => "bcitGroup4$"
            );
            //Establishes the connection
            
            $conn = sqlsrv_connect($serverName, $connectionOptions);
            $tsql= "INSERT INTO userInfo VALUES (CURRENT_TIMESTAMP, '$fname', '$lname', '$email', '$pwd');";
            
        //Get the number of the user. 
        $stmt = sqlsrv_query($conn, $tsql);
        if( $stmt === false) {
            die( print_r( sqlsrv_errors(), true));
            echo (sqlsrv_errors());
            $Message = "User does not exist!";
            header("location: index.php?Message={$Message}");
        }

        while($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
            $userNo = $row['userNo'];
        }
        
        sqlsrv_free_stmt($stmt);
            $Message = "successfully registered";
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