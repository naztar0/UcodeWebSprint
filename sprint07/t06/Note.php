<?php
    class Note {
        private $filename = "notes.json";
        public function __construct($name=null, $importance=null, $text=null) {
            if (!$name)
                return;
            $json = array();
            if (is_file($this->filename)) {
                $file = fopen($this->filename, "r");
                $json = fread($file, filesize($this->filename));
                fclose($file);
                $json = json_decode($json, true);
            }
            $date = new DateTime('now');
            $date = $date->format('Y-m-d H:i:s');
            $json[$name] = ["date" => $date, "importance" => $importance, "text" => $text];
            $file = fopen($this->filename, "w");
            fwrite($file, json_encode($json));
            fclose($file);
        }
        public function read($name) {
            $file = fopen($this->filename, "r");
            $content = fread($file, filesize($this->filename));
            fclose($file);
            return json_decode($content, true)[$name];
        }
        public function delete($name) {
            $file = fopen($this->filename, "r");
            $json = fread($file, filesize($this->filename));
            fclose($file);
            $json = json_decode($json, true);
            unset($json[$name]);
            $file = fopen($this->filename, "w");
            fwrite($file, json_encode($json));
            fclose($file);
        }
    }
?>