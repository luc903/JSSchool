<?php

class DBConnection
{
    private static $instance;
    private static $connection;

    private $servername = SERVERNAME;
    private $username = USERNAME;
    private $password = PASSWORD;
    private $dbname = DBNAME;

    public function __construct()
    {
        self::$connection = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
        self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function GetInstance()
    {
        self::$instance === null && self::$instance = new self;

        return self::$connection;
    }
}