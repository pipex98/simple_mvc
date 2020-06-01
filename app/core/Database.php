<?php 

    class Database {

        private $host = DB_HOST;
        private $user = DB_USER;
        private $password = DB_PASSWORD;
        private $db = DB_NAME;
        
        private $con;

        public function __sleep() { }

        public function __wakeup() { }

        public function __construct() {
            
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db);

            if ($this->conn->connect_error) {
                exit('Error al conectarse a la base de datos');
            }

            mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
            
            $this->conn->set_charset('utf8mb4');
        }
    }
    