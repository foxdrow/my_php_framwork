<?php

abstract class DbModel
{
    private static $pdo;

    private static function setDb()
    {

        $host = "localhost";
        $dbname = "datatest";
        $user = "root";
        $pass = "";

        self::$pdo = new PDO("mysql:host=" . $host . ";dbname=" . $dbname . ";charset=utf8", $user, $pass);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    protected function getDb()
    {
        if (self::$pdo === null) {
            self::setDb();
        }
        return self::$pdo;
    }
}
