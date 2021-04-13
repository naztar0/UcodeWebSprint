<?php
    class User {
        public $room;
        public $username;
        public $avatar;
        public $health;
        public $cards;
        // public $creator;
    }
    class Model extends User {
        public function setConnection() {
            $this->db_conn = new DatabaseConnection('127.0.0.1', null, "ntaran", "securepass", "ucode_web");
            $this->conn = $this->db_conn->conn;
        }
        public function __construct() {
            $this->setConnection();
            $sqlMainQuery = file_get_contents("../db.sql");
            $this->conn->query($sqlMainQuery);
            $this->conn->commit();
        }
        public function createUserAndRoom($username, $avatar) {
            // $this->creator = true;
            $this->username = $username;
            $this->avatar = $avatar;
            $this->health = 20;
            $this->cards = [];
            for ($i = 1; $i <= 6; $i++)
                array_push($this->cards, random_int(1, 20));
            $query = "SELECT room FROM users ORDER BY room DESC LIMIT 1";
            $result = $this->conn->query($query);
            $this->room = $result->fetch_all()[0];
            $this->room = $this->room ? $this->room[0] : 0;
            $this->room++;
        }
        public function createUser($room, $username, $avatar) {
            // $this->creator = false;
            $this->room = $room;
            $this->username = $username;
            $this->avatar = $avatar;
            $this->health = 20;
            $this->cards = [];
            for ($i = 1; $i <= 6; $i++)
                array_push($this->cards, random_int(1, 20));
        }
        public function getUser($room, $username) {
            $result = $this->conn->query("SELECT * FROM `users` WHERE room=$room AND username='".$this->conn->escape_string($this->username)."'");
            $result = $result->fetch_all()[0];
            $this->room = $result[1];
            $this->username = $result[2];
            $this->avatar = $result[3];
            $this->health = $result[4];
            $this->cards = json_decode($result[5]);
        }
        public function getRival() {
            $result = $this->conn->query("SELECT * FROM `users` WHERE room=$room AND username<>'".$this->conn->escape_string($this->username)."'");
            $result = $result->fetch_all()[0];
            if (!$result)
                return null;
            $rival = new Model();
            $rival->room = $result[1];
            $rival->username = $result[2];
            $rival->avatar = $result[3];
            $rival->health = $result[4];
            $rival->cards = json_decode($result[5]);
            return $rival;
        }
        public function delete() {
            $this->conn->query("DELETE FROM `users` WHERE username='".$this->conn->escape_string($this->username)."'");
            $this->conn->commit();
        }
        public function save() {
            $query = "INSERT INTO `users` (room, username, avatar, health, cards)
            VALUES ($this->room, '".$this->conn->escape_string($this->username)."',
            $this->avatar, $this->health,
            '".$this->conn->escape_string(json_encode($this->cards))."')";
            $this->conn->query($query);
            $this->conn->commit();
        }
        public function update() {
            $query = "UPDATE `users` SET helth=$this->health,
            cards='".$this->conn->escape_string(json_encode($this->password))."',
            WHERE username='".$this->conn->escape_string($this->username)."'";
            $res = $this->conn->query($query);
            $this->conn->commit();
        }
        public function updateUserMove($userMove) {
            $query = "UPDATE `rooms` SET user_move=$userMove WHERE room=$this->room";
            $this->conn->query($query);
            $this->conn->commit();
        }
        public function getUserMove() {
            $query = "SELECT user_move FROM `rooms` WHERE room=$this->room";
            $result = $this->conn->query($query);
            $result = $result->fetch_all()[0];
            return $result ? $result[0] : null;
        }
        public function getFirstUserMove() {
            $firstMove = random_int(1, 2);
            $query = "INSERT INTO `rooms` (room, user_move) VALUES ($this->room, $firstMove)";
            $this->conn->query($query);
            $this->conn->commit();
            return $firstMove;
        }
    }
?>