<?php
                    
                    /**
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
                    }*/
            
?>

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
</p>
  </body>
</html>
