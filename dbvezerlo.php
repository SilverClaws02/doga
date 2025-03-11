<?php

class DBVezerlo {

    private $conn;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "oscar";

    function __construct() {
        $this->connectDB();
    }

    function connectDB() {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);

        if (!$this->conn) {
            die("Database connection failed: " . mysqli_connect_error());
        }
    }

    function executeSelectQuery($query) {
        $resultset = []; 
        $result = mysqli_query($this->conn, $query);
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $resultset[] = $row;
            }
        }
        return $resultset;
    }

    function closeDB() {
        if ($this->conn) {
            mysqli_close($this->conn);
            $this->conn = null;
        }
    }
}

?>
