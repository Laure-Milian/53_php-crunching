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

	//Combien de films sont sortis avant 2000 ?
	foreach ($top as $key => $movie) {
		$date = $movie["im:releaseDate"]["label"];
		$year = substr($date, 0, 4);
		if ($year < 2000) {
			$movies_bef2000++;
		}
	}
	echo "<div> Nombre de films sortis avant 2000 : " . $movies_bef2000 . "</div>";


	//Quel est le film le plus récent ? Le plus vieux ?
	foreach ($top as $key => $movie) {
		$label = $movie["title"]["label"];
		$labels = explode(" - ", $label);
		$title = $labels[0];
		$date = $movie["im:releaseDate"]["label"];
		$dates_arr[$date] = $title;
	}

	ksort($dates_arr);
	var_dump($dates_arr);
	$oldest_movie = reset($dates_arr);
	$newest_movie = end($dates_arr);
	echo "<div> Film le plus vieux : " . $oldest_movie . "</div>";
	echo "<div> Film le plus récent : " . $newest_movie . "</div>";
?>












<ul>
	<?php
	//Afficher top100 selon la forme demandée
	foreach ($top as $key => $movie) {
		$label = $movie["title"]["label"];
		$labels = explode(" - ", $label);
		$title = $labels[0];
		$position = $key + 1;
		echo "<li>" . $position . " " . $title . "</li>";
	}
	?>
</ul>
