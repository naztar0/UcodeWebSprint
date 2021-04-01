<?php
    class NotePad {
        private $filename = "notes.json";
        public function toList() {
            if (!is_file($this->filename))
                return null;
            $file = fopen($this->filename, "r");
            $content = fread($file, filesize($this->filename) + 99999);
            fclose($file);
            $json = json_decode($content, true);
            if (!$json)
                return null;
            $ul = "<ul>";
            foreach ($json as $name => $note)
                $ul .= "<li><a href=\"?name=$name\">".$note["date"]." > $name</a>
                            <a href=\"?delete=$name\">DELETE</a></li>";
            $ul .= "</ul>";
            return $ul;
        }
    }
?>