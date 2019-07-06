<?php

// used to get mysql database connection
class Database {

    // specify database info
    private $host = "localhost";
    private $db_name = "article_test";
    private $username = "root";
    private $password = "";
    public $conn;

    // get the database connection
    public function getConnection() {

        $this->conn = null;

        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
//            echo "connection success";
        } catch (PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }

        return $this->conn;
    }

}

?>