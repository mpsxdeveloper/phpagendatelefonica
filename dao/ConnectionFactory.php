<?php

class ConnectionFactory {

    public static function connect() {

        $dbname = "agenda";
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpasswd = "";
        try {
            $connection = new PDO("mysql:host=$dbhost;dbname=$dbname;charset=utf8", $dbuser, $dbpasswd);
        }
        catch(PDOException $e) {
            die($e->getMessage());
        }
        return $connection;
    }

    public static function disconnect($conn) {
        $this->connection = $conn;
    }
    
}
