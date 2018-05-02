<?php
    session_start();
    extract($_POST);
    Insert($fullname, $score, date("YYYY-mm-dd"));
    die();

    public function Insert($FullName,$Score, $Date){
        $sql =" INSERT INTO Records (fullName, score, date)
            VALUES (\"$FullName\",\"$Score\", \"$Date\")";
        $result = $this->conn->query($sql);
    }
?>