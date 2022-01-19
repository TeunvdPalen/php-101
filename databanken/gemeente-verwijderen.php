<?php

$conn = new pdo('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->prepare("DELETE FROM gemeenten where id=:id");

$query->execute([
	'id' => $_GET['id']
]);

header('location: gemeente-overzicht.php');