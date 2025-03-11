<?php

class DBVezerlo {

    private $conn = null;
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "oscar";

    function __construct() {
        print("mysqli");
        $this->conn = $this->connectDB(); 
    }

    function connectDB() {
        $conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        return $conn;
    }

    function executeSelectQuery($query, $params = []) {
        $stmt = mysqli_prepare($this->conn, $query);

        if ($params) {
            $types = str_repeat('s', count($params));  // All parameters will be treated as strings
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }

        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $resultset = [];

        while ($row = mysqli_fetch_assoc($result)) {
            $resultset[] = $row;
        }

        return $resultset;
    }

    function closeDB() {
        if (!empty($this->conn)) {
            mysqli_close($this->conn);
            $this->conn = null;
        }
    }
}

?>
