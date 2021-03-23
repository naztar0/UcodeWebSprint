<?php
    class Tower extends Building {
        protected $elevator;
        protected $arc_capacity;
        protected $height;

        public function hasElevator() {
            return $this->elevator;
        }
        public function setElevator($val) {
            $this->elevator = $val;
        }
        public function getArcCapacity() {
            return $this->arc_capacity;
        }
        public function setArcCapacity($val) {
            $this->arc_capacity = $val;
        }
        public function getHeight() {
            return $this->height;
        }
        public function setHeight($val) {
            $this->height = $val;
        }
        public function getFloorHeight() : float {
            return $this->height / $this->floors;
        }
        public function toString() : string {
            $props = ["Elevator : " . ($this->elevator ? '+' : '-'),
            "Arc reactor capacity : " . $this->arc_capacity,
            "Height : " . $this->height,
            "Floor height : " . $this->getFloorHeight(),
            ];

            $str = "";

            foreach ($props as $p)
                $str = $str . $p . "\n";
            return parent::toString() . $str;
        }
    }
    $StarkTower = new Tower(93, "Different", "Manhattan, NY");
    $StarkTower->setElevator(true);
    $StarkTower->setArcCapacity(70);
    $StarkTower->setHeight(1130);
    echo $StarkTower->toString();
?>