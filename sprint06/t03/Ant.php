<?php
    class Ant {
        public function __construct($name, $role, $date, $num_fi, $num_le) {
            $this->name = $name;
            $this->role_in_army = $role;
            $this->date_of_entry = $date;
            $this->number_of_fights = $num_fi;
            $this->number_of_legs = $num_le;
        }
        public function __wakeup() {
            error_reporting(0);
            $str = "name: $this->name\nrole_in_army: $this->role_in_army\ndate_of_entry: $this->date_of_entry\nnumber_of_fights: $this->number_of_fights\nnumber_of_legs: $this->number_of_legs\n";
            echo($str);
            return $str;
        }
        public function __unserialize() {
            echo('FUCK U PHP');
        }
    }
    $ant = new Ant("Anthony", "sergeant", "2015-07-16", 1, 4);
    $serialized = serialize($ant);
    echo $serialized . "\n\n";
    $unserialized = unserialize($serialized);
    echo $unserialized;
?>