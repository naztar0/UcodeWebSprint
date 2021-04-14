<?php
    function createStartDeck($arrayIds) {
        $allCardsArray = array(
            ['mana' => 1, 'attack' => 0, 'health' => 2, 'text' => "Aquamen", 'cardtext' => "smtext", 'cardclass' => 'death knight', 'race' => "supehero"],
            ['mana' => 1, 'attack' => 0, 'health' => 3, 'text' => "Ant-Man", 'cardtext' => "smtext", 'cardclass' => 'druid','race' => "subhuman"],
            ['mana' => 1, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 1, 'attack' => 2, 'health' => 2, 'text' => "rabot9ga", 'cardtext' => "smtext",'cardclass' => 'death knight', 'race' => "subhuman"],
            ['mana' => 5, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 6, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 7, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 8, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 9, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 10, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 11, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 12, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 13, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 14, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 15, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 16, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 17, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 18, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 19, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
            ['mana' => 20, 'attack' => 1, 'health' => 1, 'text' => "rabot9ga", 'cardtext' => "smtext", 'cardclass' => 'death knight','race' => "subhuman"],
        );

        $cardArray = array();
        foreach($arrayIds as $id) {
            $cardArray[$id] = $allCardsArray[$id];
        }
        return $cardArray;
    }
?>