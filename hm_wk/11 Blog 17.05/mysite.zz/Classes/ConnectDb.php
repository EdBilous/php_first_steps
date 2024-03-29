<?php

namespace Classes;

use PDO;

abstract class ConnectDb
{
    const HOST = 'localhost';
    const DB_NAME = 'custom_blog';
    const USER = 'root';
    const PASSWORD = '111111';
    
    public static function getConnect()
    {
        if (!self::connectDb()) {
             self::connectDb();
             self::getConnect();
        }
        return self::connectDb();
    }
    private static function connectDb()
    {
        return new PDO(
            'mysql:host=' . self::HOST . ';
            dbname=' . self::DB_NAME . ';
            charset=utf8',
            self::USER,
            self::PASSWORD
        );
    }
}