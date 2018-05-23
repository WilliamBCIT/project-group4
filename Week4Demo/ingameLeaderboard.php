<?php
header("Content-type: application/javascript");
?>
<?php   $stringName = "Name\\n";
        $stringScore = "Score\\n";
        $stringDate = "Date\\n";

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
        
        
        $sql = "SELECT TOP 30 s.score, s.userNo, u.userFirstName, u.userLastName,s.dateRecorded FROM ScoreRecord s JOIN userInfo u ON s.userNo = u.userNo ORDER BY s.score DESC;";
            $stmt = sqlsrv_query( $conn, $sql );
            if( $stmt === false) {
                die( print_r( sqlsrv_errors(), true) );
            }
            $j = 1;
            while( $row = sqlsrv_fetch_array( $stmt, SQLSRV_FETCH_ASSOC) ) {
                  $stringName .= $j.". ".$row['userFirstName']." ".$row['userLastName']."\\n";
                $stringScore .= $row['score']."\\n";
                    $stringDate .= date_format($row['dateRecorded'], 'y/m/d')."\\n";
                $j++;
            }

            sqlsrv_free_stmt( $stmt);

?>
var stringName='<?php echo $stringName; ?>';
var stringScore='<?php echo $stringScore; ?>';
var stringDate='<?php echo $stringDate; ?>';
