<?php
class config{
    public $view;
    public $twigdata;

    public  function __construct($view,$twigdata)
    {
    $this->view = Twig::connectTwig($view);
    echo $this->view->render($twigdata);
    }
}

class DbController extends config
{
    public function databaseAction($database,$id='')
    {
        return  new self('index.html',[
            'databases' => Select::getDatabases($database), 'username' => $id]);
    }
    public function tableAction($database)
    {
        return  new self('index.html',[
            'tables' => Select::getTables($database),
            'databases' => Select::getDatabases($database),
            'name_database' => $database]);
    }

    public function columnAction($table,$database)
    {
        return  new self('index.html', [
            'columns' => Select::getColumns($table,$database)[0],
            'name_table' => $table,
            'tables' => Select::getTables($database),
            'databases' => Select::getDatabases($database),
            'name_database' => $database,
            'desccolumns' => Select::getColumns($table,$database)[1]]);
    }

    public function itemAction($column,$table,$database)
    {
       return new self('index.html',[
           'itemColumn' => Select::getItems($column,$table,$database),
           'nameColumn' => $column,
           'columns' =>Select::getColumns($table,$database)[0],
           'name_table' => $table, 'tables' => Select::getTables($database),
           'name_database' => $database,
           'databases' => Select::getDatabases($database),
           'desccolumns' => Select::getColumns($table,$database)[1]]);
    }

    public function qweryAction($table,$database)
    {
        return new self('result.html',[
            'result' => Select::getResult($database)[0],
            'keys' => Select::getResult($database)[1],
            'tables' =>Select::getTables($database),
            'databases' => Select::getDatabases($database),
            'name_database' => $database,
            'columns' => Select::getColumns($table,$database)[0],
            'name_table' => $table,
            'desccolumns' => Select::getColumns($table,$database)[1]
            ]);
    }

    public function insertAction($table,$database)
    {
        insert::get_instance($database);
        return new self('index.html',[
            'columns' =>Select::getColumns($_POST['table'],$database)[0],
            'name_table' => $_POST['table'],
            'tables' =>Select::getTables($database),
            'resultFromInsert' => selectLastInsert::get_instance($database)[0],
            'keys1' => selectLastInsert::get_instance($database)[1],
            'databases' => Select::getDatabases($database),
            'name_database' => $database,
            'desccolumns' => Select::getColumns($table,$database)[1]]);
    }
}