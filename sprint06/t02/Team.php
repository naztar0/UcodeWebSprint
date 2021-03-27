<?php
    class Avenger {
        public $name;
        public $alias;
        public $gender;
        public $age;
        public $power;
        public $hp;

        public function __construct($name, $alias, $gender, $age, $power, $hp) {
            $this->name = $name;
            $this->alias = $alias;
            $this->gender = $gender;
            $this->age = $age;
            $this->power = $power;
            $this->hp = $hp;
        }
        public function __invoke() {
            echo(strtoupper($this->alias) . "\n" . implode("\n", $this->power) . "\n\n");
        }
        public function __toString() {
            return "name: $this->name\ngender: $this->gender\nage: $this->age\n";
        }
    }
    class Team extends Avenger {
        public $id;
        public $avengers;
        private $loses;

        public function __construct($id, $array) {
            $this->id = $id;
            $this->avengers = $array;
        }
        public function battle($damage) {
            $this->loses = 0;
            $delIndexes = [];
            for ($i = 0; $i < count($this->avengers); $i++) {
                $avg = $this->avengers[$i];
                $avg->hp -= $damage;
                if ($avg->hp <= 0) {
                    array_push($delIndexes, $i);
                    $this->loses++;
                }
            }
            foreach (array_reverse($delIndexes) as $i)
                unset($this->avengers, $i);
        }
        public function calculate_losses($cloned_team) {
            if ($this->loses === 0)
                echo("We haven't lost anyone in this battle!\n");
            else
                echo("In this battle we lost $this->loses Avenger(s).\n");
        }
    }
?>