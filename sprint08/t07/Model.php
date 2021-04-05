<?php
    class Model extends Heroes {
        protected function setTable() {
            
        }
        public function setConnection() {
            $this->db_conn = new DatabaseConnection('127.0.0.1', null, "ntaran", "securepass", "ucode_web");
            $this->conn = $this->db_conn->conn;
        }
        public function __construct() {
            $this->setConnection();
            $this->setTable();
        }
        public function find($id) {
            // if (!$this->db_conn->getConnectionStatus())
            //     return;
            $result = $this->conn->query("SELECT * FROM `heroes` WHERE `id`=$id");
            $result = $result->fetch_all()[0];
            $this->id = $result[0];
            $this->name = $result[1];
            $this->description = $result[2];
            $this->race = $result[3];
            $this->class_role = $result[4];
        }
        public function delete() {
            // if (!$this->db_conn->getConnectionStatus())
            //     return;
            $this->conn->query("DELETE FROM `heroes` WHERE `id`=$this->id");
            $this->conn->commit();
        }
        public function save() {
            // if (!$this->db_conn->getConnectionStatus())
            //     return;
            $exist = $this->conn->query("SELECT EXISTS (SELECT `id` FROM `heroes` WHERE `id`=$this->id)");
            $exist = $exist->fetch_all()[0][0];
            if ($exist == 0) {
                $query = "INSERT INTO `heroes` (name, description, race, class_role)
                VALUES ('".$this->conn->escape_string($this->name)."',
                '".$this->conn->escape_string($this->description)."', 
                '".$this->conn->escape_string($this->race)."',
                '".$this->conn->escape_string($this->class_role)."')";
                echo $query;
                $this->conn->query($query);
                $this->conn->commit();
            }
            else {
                $query = "UPDATE `heroes` SET name='".$this->conn->escape_string($this->name)."',
                description='".$this->conn->escape_string($this->description)."', 
                race='".$this->conn->escape_string($this->race)."',
                class_role='".$this->conn->escape_string($this->class_role)."' WHERE id=$this->id";
                $res = $this->conn->query($query);
                $this->conn->commit();
            }
        }
    }
?>