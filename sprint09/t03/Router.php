<?php
    class Router {
        public $params = null;
        public function toArray() {
            $result = array();
            list($key, $val) = explode('=', substr($url, strstr($url, '?') + 1, strstr($url, '&')));
            $result[$key] = $val;
            foreach (explode('&', $url) as $couple) {
                list($key, $val) = explode('=', $couple);
                $result[$key] = $val;
            }
            if ($result)
                $this->params = $result;
        }
    }
?>