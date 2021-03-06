<?php
    class User {
        public $room;
        public $username;
        public $avatar;
        public $health;
        public $mana;
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
            $sqlMainQuery = file_get_contents(__DIR__."/db.sql");
            $this->conn->query($sqlMainQuery);
            $this->conn->commit();
        }
        public function createUserAndRoom($username, $avatar) {
            // $this->creator = true;
            $this->username = $username;
            $this->avatar = $avatar;
            $this->health = 20;
            $this->mana = 4;
            $cardsIds = [];
            for ($i = 1; $i <= 6;) {
                $rand = random_int(0, 19);
                if (in_array($rand, $cardsIds))
                    continue;
                array_push($cardsIds, $rand);
                $i++;
            }
            $this->cards = createStartDeck($cardsIds);
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
            $this->mana = 4;
            $cardsIds = [];
            for ($i = 1; $i <= 6;) {
                $rand = random_int(0, 19);
                if (in_array($rand, $cardsIds))
                    continue;
                array_push($cardsIds, $rand);
                $i++;
            }
            $this->cards = createStartDeck($cardsIds);
        }
        public function getUser($room, $username) {
            $result = $this->conn->query("SELECT * FROM `users` WHERE room=$room AND username='".$this->conn->escape_string($this->username)."'");
            $result = $result->fetch_all()[0];
            $this->room = $result[1];
            $this->username = $result[2];
            $this->avatar = $result[3];
            $this->health = $result[4];
            $this->mana = $result[5];
            $this->cards = json_decode($result[6], true);
        }
        public function getRival() {
            $result = $this->conn->query("SELECT * FROM `users` WHERE room=$this->room AND username<>'".$this->conn->escape_string($this->username)."'");
            $result = $result->fetch_all()[0];
            if (!$result)
                return null;
            $rival = new Model();
            $rival->room = $result[1];
            $rival->username = $result[2];
            $rival->avatar = $result[3];
            $rival->health = $result[4];
            $rival->mana = $result[5];
            $rival->cards = json_decode($result[6], true);
            return $rival;
        }
        public function delete() {
            $this->conn->query("DELETE FROM `users` WHERE username='".$this->conn->escape_string($this->username)."'");
            $this->conn->commit();
        }
        public function save() {
            $query = "INSERT INTO `users` (room, username, avatar, health, mana, cards)
            VALUES ($this->room, '".$this->conn->escape_string($this->username)."',
            '".$this->conn->escape_string($this->avatar)."', $this->health, $this->mana,
            '".$this->conn->escape_string(json_encode($this->cards))."')";
            $this->conn->query($query);
            $this->conn->commit();
        }
        public function update() {
            $query = "UPDATE `users` SET health=$this->health, mana=$this->mana, 
            cards='".$this->conn->escape_string(json_encode($this->cards))."'
            WHERE username='".$this->conn->escape_string($this->username)."' AND room=$this->room";
            $this->conn->query($query);
            $this->conn->commit();
        }
        public function updateUserMove($userMove, $card_id) {
            if ($card_id == null)
                $card_id = "NULL";
            $query = "UPDATE `rooms` SET user_move=$userMove, card_id=$card_id WHERE room=$this->room";
            $this->conn->query($query);
            $this->conn->commit();
        }
        public function getUserMove() {
            $query = "SELECT user_move, card_id FROM `rooms` WHERE room=$this->room";
            $result = $this->conn->query($query);
            $result = $result->fetch_all()[0];
            return $result;
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