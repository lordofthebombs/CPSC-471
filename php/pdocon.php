<?php
    class Pdocon {
        //connection properties
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $dbname = "adoptioncentre";
        
        //handling our connection
        private $dbh;
        
        //error handling
        private $errmsg;
        
        //Statement Handler
        private $stmt;
        //Method to open our connection
     
        public function __construct() {
            $dsn = "mysql:host=" . $this->host . "; dbname=" . $this->dbname;
            $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            );
            
            try {   //try to connect
                    $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
                echo "Database connection successful.";
                

                } catch (PDOException $error) {
                    $this->errmsg = $error->getMessage();
            }
        }
        
        //Query helper function using stmt
        public function query($query) {
           $this->stmt = $this->dbh->prepare($query);
        }
        
        //Create the bind
        public function bindvalue($param, $value, $type) {
            $this->stmt->bindValue($param, $value, $type);
        }
        
        //function to execute statement
        public function execute() {
           return $this->stmt->execute();
        }
        
        //function to check if the stmt was executed successfully
        public function confirm() {
            $this->stmt->lastInsertId;
        }
        
        //fetch data into associative array
        public function fetchMultiple() {
            //execute stmt and then lok through it
            $this->execute();
            return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
        public function fetchSingle() {
            $this->execute();
            return $this->stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    }
    //put this in another file
    //$db = new Pdocon();
?>