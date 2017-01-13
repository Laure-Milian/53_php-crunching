<?php

$string = file_get_contents("films.json", FILE_USE_INCLUDE_PATH);
$brut = json_decode($string, true);
$top = $brut["feed"]["entry"];

?>

<?php
	//Quel est le classement du film « Gravity » ?
	//Quel est le réalisateur du film « The LEGO Movie » ?
	foreach ($top as $key => $movie) {
		$label = $movie["title"]["label"];
		$labels = explode(" - ", $label);
		$position = $key + 1;
		if ($labels[0] === "Gravity") {
			echo "<div> Classement de Gravity : " . $position . "</div>";
		} else if ($labels[0] === "The LEGO Movie") {
			echo "<div> Résalisateurs de The LEGO Movie : " . $labels[1] . "</div>";
		};
	}
?>




<ul>
	<?php
	//Afficher top100 selon la forme demandée
	foreach ($top as $key => $movie) {
		$label = $movie["title"]["label"];
		$labels = explode(" - ", $label);
		$position = $key + 1;
		echo "<li>" . $position . " " . $labels[0] . "</li>";
	}
	?>
</ul>
