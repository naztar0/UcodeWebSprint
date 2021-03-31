<?php
    class FilesList {
        public function __construct($dir) {
            $this->dir = $dir;
        }
        public function toList() {
            if (!is_dir("tmp"))
                mkdir("tmp");
            $files = scandir($this->dir, SCANDIR_SORT_DESCENDING);
            $ul = "<ul>";
            foreach ($files as $key => $value) {
                if ($value === '.' || $value === '..')
                    continue;
                $ul .= "<li><a href=\"?filename=$value\">$value</a></li>";
            }
            $ul .= "</ul>";
            return count($files) === 2 ? null : $ul;
        }
    }
?>