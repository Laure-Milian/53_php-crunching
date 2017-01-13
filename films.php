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


	// Quel est le film le plus récent ? Le plus vieux ?
	foreach ($top as $key => $movie) {
		$label = $movie["title"]["label"];
		$labels = explode(" - ", $label);
		$title = $labels[0];
		$date = $movie["im:releaseDate"]["label"];
		$dates_arr[$date] = $title;
	}

	ksort($dates_arr);
	$oldest_movie = reset($dates_arr);
	$newest_movie = end($dates_arr);
	echo "<div> Film le plus vieux : " . $oldest_movie . "</div>";
	echo "<div> Film le plus récent : " . $newest_movie . "</div>";


	// Quelle est la catégorie de films la plus représentée ?
	$category_arr = [];

	foreach ($top as $key => $movie) {
		$category = $movie["category"]["attributes"]["term"];
		array_push($category_arr, $category);
	}
	$count_catego = array_count_values($category_arr);

	$len = count($count_catego);
	foreach ($count_catego as $key => $value) {
		if ($value === max($count_catego)) {
			echo "<div> Catégorie la plus représentée : " . $key . "</div>";
		}
	}

	// Quel est le réalisateur le plus présent dans le top100 ?
	foreach ($top as $key => $movie) {
		$label = $movie["title"]["label"];
		$labels = explode(" - ", $label);
		$director = $labels[1];
		$directors_arr[] = $director;
	}

	$directors_count = array_count_values($directors_arr);
	$len = count($directors_count);
	foreach ($directors_count as $key => $value) {
		if ($value === max($directors_count)) {
			echo "<div> Réalisateur le plus cité : " . $key . "</div>";
		}
	}


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
