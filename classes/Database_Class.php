<?php 
define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASS", "");
define("DB_NAME", "lic_calculator");

class Database {
        private $stmt;
        private $host = DB_HOST;
        private $user = DB_USER;
        private $pass = DB_PASS;
        private $dbname = DB_NAME;
        private $dbh;
        private $error;
        public $current_dttm;

        public function __construct() {

                $timezone = "Asia/Calcutta";
                if(function_exists('date_default_timezone_set')) @date_default_timezone_set($timezone);                 
                $this->current_dttm = date('Y-m-d H:i:s');

                // Set DSN
                $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
                // Set options
                $options = array (PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'");
                // Create a new PDO instanace
                try {
                        $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
                } // Catch any errors
                catch (PDOException $e) {
                        $this->error = $e->getMessage();
                }
        }

        public function query($query) {
                $this->stmt = $this->dbh->prepare($query);
        }

        public function bind($param, $value, $type = null) {
                if (is_null($type)) {
                        switch (true) {
                                case is_int($value):
                                        $type = PDO::PARAM_INT;
                                        break;
                                case is_bool($value):
                                        $type = PDO::PARAM_BOOL;
                                        break;
                                case is_null($value):
                                        $type = PDO::PARAM_NULL;
                                        break;
                                default:
                                        $type = PDO::PARAM_STR;
                        }
                }
                $this->stmt->bindValue($param, $value, $type);
        }

        public function execute() {
                return $this->stmt->execute();
        }

        public function executeWithArray($array) {
                return $this->stmt->execute($array);
        }

        public function resultset() {
                $this->execute();
                return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function single() {
                $this->execute();
                return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function fetchClass($class) {
                $this->execute();
                return $this->stmt->fetchObject($class,[4]);
        }

        public function fetchAllClass($class) {
                $this->execute();
                return $this->stmt->fetchAll(PDO::FETCH_CLASS,$class);
        }

        public function lastInsert() {
                return $this->dbh->lastInsertId();
        }

        public function rowCount() {
                return $this->stmt->rowCount();
        }

        public function errorDetails() {
                return $this->stmt->errorInfo();
        }

        public function beginTransaction() {
                return $this->dbh->beginTransaction();
        }

        public function endTransaction() {
                return $this->dbh->commit();
        }

        public function cancelTransaction() {
                return $this->dbh->rollBack();
        }

        public function debugDumpParams() {
                return $this->stmt->debugDumpParams();
        }
		
	
            public function validate($value='')
            {
                   $value = htmlspecialchars($value);
                    $value = trim($value);
                    $value = str_replace("  ", " ", $value);
                    return $value;
            }

}

?>