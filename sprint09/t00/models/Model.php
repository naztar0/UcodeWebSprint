<?php
    class User {
        protected $login;
        protected $password;
        protected $full_name;
        protected $email;
    }
    class Model extends User {
        public function setConnection() {
            $this->db_conn = new DatabaseConnection('127.0.0.1', null, "ntaran", "securepass", "ucode_web");
            $this->conn = $this->db_conn->conn;
        }
        public function __construct() {
            $this->setConnection();
            $sqlMainQuery = file_get_contents("db.sql");
            $this->conn->query($sqlMainQuery);
            $this->conn->commit();
        }
        public function createUser($login, $password, $full_name, $email) {
            $this->login = $login;
            $this->password = $password;
            $this->full_name = $full_name;
            $this->email = $email;
        }
        public function find($id) {
            $result = $this->conn->query("SELECT * FROM `users` WHERE `id`=$id");
            $result = $result->fetch_all();
        }
        public function findLogin($login, $passwordHash=null) {
            $query1 = "SELECT * FROM `users` WHERE `login`='".$this->conn->escape_string($login)."' AND `password`='$passwordHash'";
            $query2 = "SELECT `id` FROM `users` WHERE `login`='".$this->conn->escape_string($login)."'";
            $result = $this->conn->query($passwordHash ? $query1 : $query2);
            $result = $result->fetch_all()[0];
            if ($passwordHash === null)
                return $result[0] == 1 ? true : false;
            if (!$result)
                return null;
            $result = $result[0];
            $this->id = $result[0];
            $this->login = $result[1];
            $this->password = $result[2];
            $this->full_name = $result[3];
            $this->email = $result[4];
        }
        public function findEmail($email) {
            $result = $this->conn->query("SELECT EXISTS (SELECT `id` FROM `users` WHERE `email`='$email')");
            return $result->fetch_all()[0][0] == 1 ? true : false;
        }
        public function delete() {
            $this->conn->query("DELETE FROM `users` WHERE `id`=$this->id");
            $this->conn->commit();
        }
        public function save() {
            $query = "INSERT INTO `users` (login, password, full_name, email)
            VALUES ('".$this->conn->escape_string($this->login)."',
            '".$this->conn->escape_string($this->password)."', 
            '".$this->conn->escape_string($this->full_name)."',
            '".$this->conn->escape_string($this->email)."')";
            $this->conn->query($query);
            $this->conn->commit();
        }
    }
?>