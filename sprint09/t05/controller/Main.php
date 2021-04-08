<?php
    class Main implements ControllerInterface {
        public function __construct() {
            $this->view = new View();
        }
    }
?>