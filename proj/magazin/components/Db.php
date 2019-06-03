<?php

class Db
{
    
    /**
     * Устанавливает соединение с базой данных
     * @return \PDO <p>Объект класса PDO для работы с БД</p>
     */
    public static function getConnect()
    {
        $host = 'localhost';
        $dbname = 'phpshop';
        $user = 'root';
        $pass = '';
        $charset = 'utf8';        
        $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
        $db = new PDO($dsn,$user,$password);
        return $db;
    }    
}

