<?php

class Base
{
    protected $connection;

    public function __construct()
    {
        require __DIR__ . '/../dbconfig.php';

        try {
            $this->connection = new PDO("mysql:host=$servername;dbname=$databasename", $dbusername, $dbpassword);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " .$e->getMessage();
        }
    }
}