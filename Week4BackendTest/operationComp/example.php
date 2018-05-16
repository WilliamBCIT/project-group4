<?php
session_start();
extract($_POST);
    
$credentials = explode(",", file_get_contents("credentials.config"));
$size        = sizeof($credentials);
$fullname      = array();
$score   = array();
$user_match  = false;
$pass_match  = false;

for ($i = 0; $i < $size; $i++) {
    if (($i % 2) == 0) {
        $emails[] = trim($credentials[$i]);
    }
}

for ($i = 0; $i < $size; $i++) {
    if (!(($i % 2) == 0)) {
        $passwords[] = trim($credentials[$i]);
    }
}

for ($i = 0; $i < sizeof($emails); $i++) {
    if ($user == $emails[$i]) {
        $user_match = true;
    }
}

for ($i = 0; $i < sizeof($passwords); $i++) {
    if ($pass == $passwords[$i]) {
        $pass_match = true;
    }
}

if (isset($user) && $user_match && isset($pass) && $pass_match) {
    header("location: index.php");
    session_unset();
    session_destroy();
    die();
} else {
    $msg = "Enter valid credentials";
    header("location: login.php?msg=$msg");
    session_unset();
    session_destroy();
    die();
}
?>