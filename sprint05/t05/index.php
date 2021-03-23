<?php
    class StrFrequency {
        public function __construct($str) {
            $this->str = preg_replace("/[\W\d]/", ' ', $str);
        }
        public function letterFrequencies() {
            $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $arr = array();
            for($i = 0; $i < strlen($letters); $i++) {
                $count = 0;
                for ($j = 0; $j < strlen($this->str); $j++)
                    if (strtoupper($this->str[$j]) === $letters[$i])
                        $count++;
                if ($count > 0)
                    $arr[$letters[$i]] = $count;
            }
            return $arr;
        }
        public function wordFrequencies() {
            $str = strtoupper($this->str);
            $arrWords = str_word_count($str, 1);
            $arr = array();
            foreach ($arrWords as $word1) {
                $count = 0;
                foreach ($arrWords as $word2) {
                    if ($word1 === $word2)
                        $count++;
                }
                $arr[$word1] = $count;
            }
            return $arr;
        }
        public function reverseString() {
            return strrev($this->str);
        }
    }
    function test($string)
{
  $obj = new StrFrequency($string);
  $symbol = $obj->letterFrequencies();
  echo "Letters in " . $string . "\n";
  foreach ($symbol as $k => $v) {
      echo "Letter ". $k . " is repeated " . $v . " times\n";
  }
  $symbol = $obj->wordFrequencies();
   echo "Words in " . $string . "\n";
  foreach ($symbol as $k => $v) {
      echo "Word ". $k . " is repeated " . $v . " times\n";
  }
  echo "Reverse the string: " . $string . "\n";
  echo $obj->reverseString() . "\n";
}
test("Face it, Harley-- you and your Puddin' are kaput!");
echo "*************\n";
test("  Test test 123 45 !0 f   HeLlO wOrLd  ");
echo "*************\n";
test("");
?>