<?php

class Select
{
    public static function getDatabases($database){
        $sql = "show databases";
        $result = Connection::get_instance($database)->dbh->query("$sql");
        $databaselist = $result->fetchAll(PDO::FETCH_COLUMN);
        return $databaselist;
    }

    public static function getTables($database)
    {
        $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = DATABASE(); ";
        $query = Connection::get_instance($database)->dbh->prepare($sql);
        $execute = [];
        $query->execute($execute);
        $tableList = $query->fetchAll(PDO::FETCH_COLUMN);
        return $tableList;

    }

    public static function getColumns($table,$database)
    {
        $sql = "SELECT COLUMN_NAME FROM information_schema.COLUMNS
                     WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? ORDER BY ORDINAL_POSITION;" ;
        $query = Connection::get_instance($database)->dbh->prepare($sql);
        $query->execute(array($table));
        $columns = $query->fetchAll(PDO::FETCH_COLUMN);
        $sql ="DESC ".$table."";
        $query = Connection::get_instance($database)->dbh->query($sql);
        $descTable = $query->fetchAll(PDO::FETCH_ASSOC);
        foreach ($descTable as &$column){
            $chekpiece = mb_substr($column['Type'],0,3);
            if($chekpiece == 'int' || $chekpiece == 'flo' ){
                $column['class'] = "number";
            }
            else $column['class'] = "text";
        }
        unset($column);
        //var_dump($descTable);
        $totalColumns = [$columns,$descTable];
        return $totalColumns;
    }

    public static function getItems($column,$table,$database)
    {
        $sql = "SELECT ". $column . " FROM " . $table ."";
        $query = Connection::get_instance($database)->dbh->query($sql);
        $items = $query->fetchAll(PDO::FETCH_COLUMN);
        return $items;
    }

    public static function getResult($database)
    {
        $qwery = $_POST['qwery'];
        $checkSQL = mb_strtolower(mb_substr($qwery,0,6));
        if($checkSQL == 'select') {
            $obj = singltonResult::get_instance($database);
            if($obj) {
                $keys = array_keys($obj[0]);
            }
            return [$obj,$keys];
        }
        else
            return false;
    }

}
class singltonResult  {
    public $array;
    private static $instance;
    public $con;
    public static function get_instance($database){
        if(!isset(self::$instance->array)){
            self::$instance = new self($_POST['qwery'],$database);
        }
        return self::$instance->array;
    }
    private function __wakeup(){

    }
    private function __clone(){

    }
    private function __construct($post,$database){
        $this->con = Connection::get_instance($database)->dbh;
        $query = $this->con->query("$post");
        $this->array = $query->fetchAll(PDO::FETCH_ASSOC);
        return $this->array;
    }

}
