<?php 
define('HOST', '127.0.0.1');
define('PORT', '3306');
define('DBNAME', 'mvc_test');
define('USER', 'root');
define('PASSWORD', 'ahmed');

class Database {
   
        public $connection;
        private  $dsn;
    
    
        public function __construct()
        {
            $this->dsn = "mysql:host=" . HOST . ";port=" . PORT . ";dbname=" . DBNAME;
    
            try {
    
                $this->connection = new PDO($this->dsn, USER, PASSWORD);
    
                $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) { 
                    echo "Connection failed: " . $e->getMessage();
        
            }
        }
        public function query($query,$param = [])
    {
        try {
            $statement = $this->connection->prepare($query);
            $statement->execute($param);
            return $statement;
        } catch (PDOException $e) {

            echo "Query failed: " . $e->getMessage();

        }
    }
    
}