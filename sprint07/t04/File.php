<?php
    class File {
        public function __construct($filename) {
            $this->filename = 'tmp/'.$filename;
        }
        public function write($content) {
            $file = fopen($this->filename, "a");
            fwrite($file, $content);
            fclose($file);
        }
        public function toList() {
            $file = fopen($this->filename, "r");
            $content = fread($file, filesize($this->filename));
            fclose($file);
            return $content;
        }
    }
?>