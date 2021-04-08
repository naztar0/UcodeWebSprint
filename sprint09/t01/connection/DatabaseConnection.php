<?php
    class DatabaseConnection {
        public function __construct($host, $port, $username, $password, $database) {
            $this->conn = new mysqli($host, $username, $password, $database, $port);
        }
        public function __destruct(){
            $this->conn->close();
        }
        public function getConnectionStatus() {
            $stats = $this->conn->get_connection_stats();
            return $stats['connect_success'] === 1 ? true : false;
        }
    }
?>