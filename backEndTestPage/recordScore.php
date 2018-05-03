<?php
    session_start();
    extract($_POST);

    Insert($fullname, $score);
    die();
    session_destroy();

    function Insert($FullName,$Score){
        if ($FullName != "" && $Score != "") {
        $f = fopen('credentials.config', 'a') or die("can't open file");
        if (fwrite($f, "\n," . $FullName . "," . $Score)) {
            echo "successful!";
        }
        fclose($f);
        } else {
            die();// write default values or show an error message 
            }
        }
?>