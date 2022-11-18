<?php

class Database {
    private $pdo;

    public function __construct($host, $user, $pass, $db) {
        $username = 'ssi3ka'; 
        $password = 'Fall2022';
        $host = 'mysql01.cs.virginia.edu';
        $dbname = 'ssi3ka';
        $dsn = "mysql:host=$host;dbname=$dbname";

        // $this->pdo = new PDO($dsn, $username, $password);
        return new PDO($dsn, $username, $password); //$this->pdo;

    }
}