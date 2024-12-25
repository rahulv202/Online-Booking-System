<?php

namespace App\Core;

use PDO;
use PDOException;

class Database
{
    private static $instance;
    private $connection;
    private function __construct()
    {

        try {
            // $this->connection = new PDO($dsn, DB_USER, DB_PASS, $options);
            $this->connection =   new PDO(
                "mysql:host=localhost;dbname=" . DB_NAME . "",
                "" . DB_USER . "",
                "" . DB_PASS . "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );
        } catch (PDOException $e) {
            //throw new PDOException($e->getMessage(), (int)$e->getCode());
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new self();
        }
        return self::$instance->connection; // Return the PDO connection
    }
}
