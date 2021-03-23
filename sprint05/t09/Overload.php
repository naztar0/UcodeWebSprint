<?php
    class Overload {
        private $data = array();
        public function __set($key, $value) {
            $this->data[$key] = $value;
        }
        public function __get($key) {
            return array_key_exists($key, $this->data) ? $this->data[$key] : "NO DATA";
        }
        public function __isset($key) {
            if (!array_key_exists($key, $this->data))
                $this->data[$key] = "NOT SET";
            return true;
        }
        public function __unset($key) {
            $this->data[$key] = NULL;
        }
    }
?>