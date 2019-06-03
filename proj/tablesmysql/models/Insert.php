<?php
class insert
{
    private static $instance;
    public $array;
    public static function get_instance($database){
        if(!isset(self::$instance->array)){
            self::$instance = new self($_POST, $database);
        }
        return self::$instance->array;
    }
    private  function __construct($post,$database)
    {
        $table = array_shift($post);//cuts the first item of the array with the table name
        $insertArray = array_diff($post, array(''));//removes empty values
        $_fields = array_keys($insertArray);//returns field names
        $sql = "INSERT INTO " . $table . " (" .
            implode(", ", $_fields) . ") VALUES (" .
            implode(", ", array_map(function ($x) {
                return ":" . $x;
            }, $_fields)) . ")";
        $query = Connection::get_instance($database)->dbh->prepare($sql);
        $query->execute($insertArray);
    }
}
class selectLastInsert  {

    private static $instance;
    public $array;
    public static function get_instance($database){
        if(!isset(self::$instance->array)){
            self::$instance = new self($_POST, $database);
        }
        return self::$instance->array;
    }
    public function __construct($post, $database)
    {
        $table = array_shift($post);//cuts the first item of the array with the table name
        $insertArray = array_diff($post, array(''));//removes empty values
        $_fields = array_keys($insertArray);//returns field names
        $sql = "SELECT * FROM " . $table . " WHERE (" . implode(", ", $_fields) . ") = (" . implode(", ", array_map(function($x) {return "'" . $x . "'";}, $insertArray)) . ")";
        $query = Connection::get_instance($database)->dbh->query($sql);
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if ($result) {
            $keys = array_keys($result[0]);
        }
        $this->array = [$result, $keys];

    }
}
