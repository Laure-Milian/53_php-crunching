<?php

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);


// Combien de mots contient ce dictionnaire ?
$words_num = count($dico);
echo "<div>Le dictionnaire compte " . $words_num . " mots.</div>"; 


// Combien de mots font exactement 15 caractères ?
for ($i = 0; $i < $words_num ; $i++) {

	$word = $dico[$i];
	$pattern = '(.)su';
	$length = preg_match_all($pattern, $word, $matches);

	if ($length === 15) {
		$words_15car[$i] = $matches;	
	}
}
echo "<div>Parmi ceux-ci, " . count($words_15car) . " mots font exactement 15 caractères.</div>";


// Combien de mots contiennent la lettre « w » ?
// Combien de mots finissent par la lettre « q » ?