<?php
    require('LLItem.php');
    class LList implements IteratorAggregate {
        public function __construct(Type $var = null) {
            $this->head = null;
            $this->length = 0;
        }
        public function getFirst() {
            return $this->head->data;
        }
        public function getLast() {
            $current = $this->head;
            while ($current->next)
                $current = $current->next;
            return $current->data;
        }
        public function add($value=null) {
            $node = new LLItem($value);
            if ($this->length > 0) {
                $current = $this->head;
                while($current->next)
                    $current = $current->next;
                $current->next = $node;
            }
            else
                $this->head = $node;
            $this->length++;
        }
        public function addArr($array=null) {
            foreach ($array as $var) {
                $this->add($var);
            }
        }
        public function remove($value=null, $all=false) {
            $current = $this->head;
            if ($current->data === $value) {
                $this->head = $current->next;
                $this->length--;
                if (!$all)
                    return;
            }
            while($current->next) {
                if ($current->next->data === $value) {
                    $current->next = $current->next->next;
                    $this->length--;
                    if (!$all)
                        return;
                }
                else
                    $current = $current->next;
            }
        }
        public function removeAll($value=null) {
            $this->remove($value, true);
        }
        public function contains($value=null) {
            $current = $this->head;
            while($current) {
                if ($current->data === $value)
                    return true;
                $current = $current->next;
            }
            return false;
        }
        public function clear() {
            $this->head = null;
            $this->length = 0;
        }
        public function count() {
            return $this->length;
        }
        public function toString() {
            $current = $this->head;
            $arr = [];
            while($current) {
                array_push($arr, $current->data);
                $current = $current->next;
            }
            echo(implode(', ', $arr));
        }
        public function getIterator() {
            $current = $this->head;
            $arr = [];
            while($current) {
                array_push($arr, $current->data);
                $current = $current->next;
            }
            return new ArrayIterator($arr);
        }
    }
?>