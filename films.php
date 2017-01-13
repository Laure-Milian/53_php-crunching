<?php

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"];

?>

<?php
	//Quel est le classement du film « Gravity » ?
	foreach ($top as $key => $movie) {
		$label = $movie["im:name"]["label"];
		$position = $key + 1;
		if ($label === "Gravity") {
			echo "Classement de Gravity : " . $position;
		};
	}
?>

<ul>
	<?php
		//Afficher top100 selon la forme demandée
	foreach ($top as $key => $movie) {
		$label = $movie["im:name"]["label"];
		$position = $key + 1;
		echo "<li>" . $position . " " . $label . "</li>";
	}
	?>
</ul>
