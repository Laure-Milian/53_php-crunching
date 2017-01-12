<?php

$string = file_get_contents("dictionnaire.txt", FILE_USE_INCLUDE_PATH);
$dico = explode("\n", $string);

// Combien de mots contient ce dictionnaire ?
$words_num = count($dico);
echo "<div>Le dictionnaire compte " . $words_num . " mots.</div>"; 


// Combien de mots font exactement 15 caractères ?
for ($i = 0 ; $i < $words_num ; $i++) {

	$word = $dico[$i];
	$pattern = '(.)su';
	$length = preg_match_all($pattern, $word, $matches);

	if ($length === 15) {
		$words_15car[$i] = $matches;	
	}
}
echo "<div>Parmi ceux-ci, " . count($words_15car) . " mots font exactement 15 caractères.</div>";


// Combien de mots contiennent la lettre « w » ?

foreach ($dico as $word) {

	$pos = strpos($word, "w");
	
	if (!$pos === false) {
		$num_words_w++;
	}

}

echo "<div>Parmi ceux-ci, " . $num_words_w . " mots contiennent un 'w'.</div>";


// Combien de mots finissent par la lettre « q » ?
/*	//var_dump($words_w);
	$len = count($words_w);
	
	for ($i = 0 ; $i < $len ; $i++) {
		var_dump($words_w[$i]);
	}