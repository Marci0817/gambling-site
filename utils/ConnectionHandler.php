<?php

class ConnectionHandler
{
    private static $connection;

    private static $server = "localhost";
    private static $user = "root";
    private static $password = "";
    private static $database = "grandle";

    public static function getConnection()
    {
        if (self::$connection === null) {
            self::$connection = new mysqli(self::$server, self::$user, self::$password, self::$database);
        }
        return self::$connection;
    }

    public static function closeConnection()
    {
        if (self::$connection !== null) {
            self::$connection->close();
        }
    }
}
