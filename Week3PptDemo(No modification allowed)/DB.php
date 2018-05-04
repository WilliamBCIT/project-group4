<?php 
class DB
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "alice";

    public function connect()
    {
        $this->conn = new mysql(
            $this->servername, $this->username, 
            $this->password, $this->dbname);
        return;
    }
}
//$sql ="CREATE TABLE Records
//(fullname         CHAR(20)       NOT NULL
//,score          NUMBER(4)    NOT NULL
//,hotelAddress    DATE(40)    NOT NULL
//,PRIMARY KEY (fullName)
//);
//";

?>