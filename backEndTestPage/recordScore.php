<?php
    session_start();
    extract($_POST);
    $fullname = $_POST["fullname"];
    $score = $_POST["score"];

    Insert($fullname, $score, date("YYYY-mm-dd"));
    die();

    public function Insert($FullName,$Score, $Date){
        if ($FullName != '' && $Score != '') {
        $f = fopen('credentials.php', 'w') or die("can't open file");
        fwrite($f, ',' . $FullName . ',' . $Score . '<br  />');
        fclose($f);
        } else {
            die();// write default values or show an error message 
            }
        }
?>