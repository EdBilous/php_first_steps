<?php 

class Connection {
	const DSN = 'mysql:host=localhost; dbname=';
	public $dbh;
	public $user;
	public $pass;
    public $database;

    private static $instance;

	public static function get_instance($database){
		if(!isset(self::$instance)){
			self::$instance = new self('root','', $database);
		}
		return self::$instance;
	}

	private function __wakeup(){

	}
	private function __clone(){

	}
	private function __construct($user, $pass,$database){
		$this->user = $user; 
		$this->pass = $pass; 
        $this->database = $database;
		try {
			$this->dbh = new PDO(
				self::DSN . "$this->database",
				$this->user, 
				$this->pass 
			);
		
			$this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		} 
		catch (PDOException $e) {
			exit ('Error connecting to database: ' . $e->getMessage());
		}

		return $this->dbh;
	}
	
}
