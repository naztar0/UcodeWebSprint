<?php
    class Ingestion {
        public $id;
        public $meal_type;
        public $day_of_diet;
        public $products;
        public function __construct($meal_type, $day) {
            $this->meal_type = $meal_type;
            $this->day_of_diet = $day;
            $this->products = array();
        }
        public function setProduct($product) {
            $this->products[$product->getName()] = $product;
        }
        public function getProducts() {
            return $this->products;
        }
        public function get_from_fridge($product) {
            if ($this->products[$product]->getKcal() > 200)
                throw new EatException("No more junk food, dumpling", 1);
        }
    }
?>