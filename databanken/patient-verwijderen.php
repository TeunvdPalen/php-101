<?php

$conn = new PDO('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->prepare("DELETE FROM patienten where id=:id");
$query->execute([
	'id' => $_GET['id']
]);

header('location: patienten-overzicht.php');