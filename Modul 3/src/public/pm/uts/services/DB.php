<?php

class DB
{
    private static $dbHost = 'mysql';
    private static $dbUser = 'user';
    private static $pass = 'akuadalahanakgembala';
    private static $dbName = 'pemrograman_web_said';
    private static $cont = null;

    public function __construct()
    {
        die('Connection issue!');
    }

    public static function connector()
    {
        if (null == self::$cont) {
            try {
                self::$cont =  new PDO("mysql:host=" . self::$dbHost . ";" . "dbname=" . self::$dbName, self::$dbUser, self::$pass);
            } catch (PDOException $exception) {
                die($exception->getMessage());
            }
        }
        return self::$cont;
    }

    public static function disconnect()
    {
        self::$cont = null;
    }
}
