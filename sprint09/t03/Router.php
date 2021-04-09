<?php
    class Router {
        public $params = null;
        public function __construct() {
            $this->url = $_SERVER["REQUEST_URI"];
            echo(parse_url($this->url, PHP_URL_PATH) . "<br>");
            $this->getParams();
            echo(json_encode($this->params));
        }
        public function getParams() {
            if (true) {
                $result = array();
                if (strpos($this->url, '&'))
                    list($key, $val) = explode('=', substr($this->url, strpos($this->url, '?') + 1, strpos($this->url, '&') - strpos($this->url, '?') - 1));
                else
                    list($key, $val) = explode('=', substr($this->url, strpos($this->url, '?') + 1));
                $result[$key] = $val;
                $skip = false;
                foreach (explode('&', $this->url) as $couple) {
                    if (!$skip) { $skip = true; continue; }
                    list($key, $val) = explode('=', $couple);
                    $result[$key] = $val;
                }
                if ($result)
                    $this->params = $result;
            }
            if (false)
                $this->params = $_GET;
        }
    }
?>