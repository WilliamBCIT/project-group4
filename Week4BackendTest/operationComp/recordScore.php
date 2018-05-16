<!DOCTYPE html>
<html lang="en">
  <head>
    <title>PHP - PDO Example (Prepared Insert)</title>
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
        $servername = "localhost:3306";
        $dblogin = "root";
        $password = "";
        $dbname = "test";

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $dblogin, $password);

        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        // e.g., http://localhost/PDOpreparedInsert.php?first_name=arron&last_name=ferguson
        
            // perform update to the DB
            $sql = "INSERT INTO ScoreRecord VALUES (200, $Score, 'GETDATE()', '$FullName');";
            // $insert is a 'PDOStatement
            $statement = $conn->prepare($sql);
            $statement->execute();
        


        // show what's in the DB
        $sql = "SELECT * FROM ScoreRecord";

        $statement = $conn->prepare($sql);
        $statement->execute();
        $count = $statement->rowCount();
        echo "Number of returned values is $count.";

        // PDO::FETCH_ASSOC: returns an array indexed by column name as returned in your result set
        // http://php.net/manual/en/pdostatement.fetch.php
        // basically we want an associate array for each row
        $rows = $statement->fetchAll(PDO::FETCH_ASSOC);

        echo "<ul>";
        echo "</ul>";

    }
?>

  </body>
</html>
