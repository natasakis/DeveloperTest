<?php

namespace Models\Model;

class Model
{
    protected static $hostname = "127.0.0.1";
    protected static $username = "root";
    protected static $password1 = "";
    protected static $database = "30hills";
    protected static $connection;
    protected static $db_status;
    protected static $statement;

    protected static function connection($table)
    {
        self::$connection = new \PDO("mysql:host=" . self::$hostname . ";dbname=" . self::$database . ";charset=utf8", self::$username, self::$password1);
        self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        $sqlQueryString = "SELECT * FROM " . $table;
        self::$statement = self::$connection->prepare($sqlQueryString);
        self::$db_status = self::$statement->execute();
    }

    protected static function fetchAll()
    {
        $rows = self::$statement->fetchAll();
        $numberOfRows = count($rows);
        if ($numberOfRows > 0) {
            return $rows;
        }
        return null;
    }
}
