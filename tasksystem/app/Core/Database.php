<?php

Class Database{
    private static ?Database $instance = null;

    private mysqli $connection;

    private function __construct()
    {
        $config = require __DIR__ . '/../Config/Database.php';

        $this->connection = new mysqli(
            $config['host'],
            $config['username'],
            $config['password'],
            $config['host'],
            $config['database'],
            $config['port'] ?? 3306
        );

        if($this->connection->connect_error){
            die('Database connection failed' . $this->connection->connect_error);

        }

        $this->connection->set_charset($config['charset']);
    }

    public static function getInstance(): mysqli{
        if(self::$instance === null){
            self::$instance = new self();
        }
        return self::$instance->connection;
    }

}