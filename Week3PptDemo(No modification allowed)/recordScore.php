<?php
    session_start();
    extract($_POST);

    Insert($fullname, $score);
    header("location: index.html");
    session_unset();
    session_destroy();
    die();

    function Insert($FullName,$Score){
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
    }
?>