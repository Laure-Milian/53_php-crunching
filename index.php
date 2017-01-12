<?php

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

// Combien de mots contient ce dictionnaire ?
$words_num = count($dico);
echo "Le dictionnaire compte " . $words_num . " mots."; 

// Combien de mots font exactement 15 caractères ?

// Combien de mots contiennent la lettre « w » ?
// Combien de mots finissent par la lettre « q » ?