<?php

class Dbh {

    private $host = "localhost";
    private $user_name = "root";
    private $password = "root";
    private $dbName = "oop";


    protected function Connect() {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn,$this->user_name,$this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }



}