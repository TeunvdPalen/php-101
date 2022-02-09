<?php

if (empty($_POST['omschrijving'])) {
	$foutmeldingen['omschrijving'] = 'Omschrijving is verplicht';
} elseif (strlen($_POST['omschrijving']) > 255) {
	$foutmeldingen = 'Omschrijving mag niet langer als 255 tekens zijn';
}