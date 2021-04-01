<?php
    class ListAvengerQuotes {
        public function __construct($array) {
            $this->array = $array;
        }
        public function toXML($filename) {
            $root = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
            foreach ($this->array as $elem) {
                $child = $root->addChild("quoteObject");
                foreach ($elem as $key => $value) {
                    if ($key === "comments") {
                        $child2 = $child->addChild($key);
                        foreach ($value as $value2) {
                            $child3 = $child2->addChild("commentObject");
                            foreach ($value2 as $key3 => $value3)
                                $child3->addChild($key3, $value3);
                        }
                    }
                    else if ($key === "photo") {
                        $child2 = $child->addChild("photos");
                        foreach ($value as $value2)
                            $child2->addChild($key, $value2);
                    }
                    else {
                        $child->addChild($key, $value);
                    }
                }
            }
            $root->asXML($filename);
        }
        public function fromXML($filename) {
            $root = simplexml_load_file($filename);
            $array = array();
            foreach ($root as $elem) {
                $photo = array();
                $comments = array();
                foreach ($elem->comments as $value)
                    foreach ($value->commentObject as $value2)
                        array_push($comments, new Comment(strval($value2->date), strval($value2->comment)));
                foreach ($elem->photos as $value)
                    foreach ($value->photo as $value2)
                        array_push($photo, strval($value2));
                array_push($array, new AvengerQuote(strval($elem->id), strval($elem->author), strval($elem->quote),
                $photo, strval($elem->publishDate), $comments));
            }
            $res = new ListAvengerQuotes($array);
            return $res;
        }
    }
?>