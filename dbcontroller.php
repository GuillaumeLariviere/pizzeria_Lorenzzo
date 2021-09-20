<?php
class DBController {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    //private $password = "root";
    //private $port = "8889";
    //private $port = "3308";
    private $database = "lorenzzobd_dieug";
    private $conn;


    function __construct() {
        $this->conn = $this->connectDB();
    }

    function connectDB() {
        $conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->database, $this->user, $this->password);
        //$conn = new PDO("mysql:host=" . $this->host . ";port=". $this->port .";dbname=" . $this->database, $this->user, $this->password);
        return $conn;
    }

    function runQuery($query) {
        $result = $this->conn->query($query);
        while($row=$result->fetch(PDO::FETCH_ASSOC)) {
            $resultset[] = $row;
        }
        if(!empty($resultset))
            return $resultset;
    }

    function numRows($query) {
        $result  = $this->conn->query($query);
        $rowcount = $result->rowcount();
        return $rowcount;
    }
}
?>