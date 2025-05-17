<?php
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
    	$tarifBase = floatval($_POST["tarif_base"] ?? 0);
    	$nbPersonnes = intval($_POST["nb_personnes"] ?? 1);
    	$options = json_decode($_POST["options"] ?? "[]", true);

    	$totalOptions = 0;
    	foreach ($options as $opt) {
        	$totalOptions += floatval($opt);
    	}

    	$total = ($tarifBase + $totalOptions) * $nbPersonnes;
    	$total = number_format($total, 2, '.', '');

    	echo json_encode(["prix" => $total]);
}
?>