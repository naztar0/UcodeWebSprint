<?php
    class HardWorker {
        protected $name;
        protected $age;
        protected $salary;

        public function setName($str) {
            $this->name = $str;
        }
        public function getName() {
            return $this->name;
        }
        public function setAge($str) {
            if (!($str >= 1 && $str <= 100))
                return false;
            $this->age = $str;
            return true;
        }
        public function getAge() {
            return $this->age;
        }
        public function setSalary($str) {
            if (!($str >= 100 && $str <= 10000))
                return false;
            $this->salary = $str;
        }
        public function getSalary() {
            return $this->salary;
        }
        public function toArray() {
            return array('name' => $this->name, 'age' => $this->age, 'salary' => $this->salary);
        }
    }
?>