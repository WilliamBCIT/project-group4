<?php
    session_start();
    $number = $_SESSION['userNo'];
    session_destroy();
    echo "Loading... Please Wait";
    $Message = "Logout Successful";
    header("location: index.php?Message={$Message}");
    die;
//ukjgbkjghk
?>