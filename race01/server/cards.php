<?php
    $allCardsArray = array(
        ['mana' => 1, 'attack' => 1, 'health' => 1, 'text' => "aquaman"],
        ['mana' => 1, 'attack' => 2, 'health' => 1, 'text' => "blackwidow"],
        ['mana' => 1, 'attack' => 2, 'health' => 1, 'text' => "daredevil"],
        ['mana' => 1, 'attack' => 0, 'health' => 3, 'text' => "maphisto"],

        ['mana' => 2, 'attack' => 1, 'health' => 3, 'text' => "capitanamerica"],
        ['mana' => 2, 'attack' => 2, 'health' => 2, 'text' => "hawkeye"],
        ['mana' => 2, 'attack' => 2, 'health' => 2, 'text' => "carnage"],
        ['mana' => 2, 'attack' => 3, 'health' => 2, 'text' => "venom"],

        ['mana' => 3, 'attack' => 5, 'health' => 3, 'text' => "blackpanthera"],
        ['mana' => 3, 'attack' => 4, 'health' => 4, 'text' => "doctordoom"],
        ['mana' => 3, 'attack' => 3, 'health' => 3, 'text' => "magneto"],
        ['mana' => 3, 'attack' => 3, 'health' => 6, 'text' => "spiderman"],

        ['mana' => 4, 'attack' => 5, 'health' => 7, 'text' => "deadpool"],
        ['mana' => 4, 'attack' => 3, 'health' => 4, 'text' => "thor"],
        ['mana' => 4, 'attack' => 7, 'health' => 5, 'text' => "apocalypse"],
        ['mana' => 4, 'attack' => 6, 'health' => 6, 'text' => "galactus"],

        ['mana' => 5, 'attack' => 5, 'health' => 12, 'text' => "ironman"],
        ['mana' => 5, 'attack' => 7, 'health' => 10, 'text' => "thanos"],

        ['mana' => 6, 'attack' => 12, 'health' => 12, 'text' => "hulk"],
        ['mana' => 6, 'attack' => 14, 'health' => 10, 'text' => "dormammu"],
    );
    function createStartDeck($arrayIds) {
        global $allCardsArray;
        $cardArray = array();
        foreach($arrayIds as $id) {
            $cardArray[$id] = $allCardsArray[$id];
        }
        return $cardArray;
    }
?>