<?php

include './includes/initialize.php';

if (!isset($_GET['id'])) {
	header('location: categorie.php');
	exit;
}

$query = $pdo->prepare('DELETE FROM categorie WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);

$query = $pdo->prepare('UPDATE todo_items SET categorie_id=null WHERE categorie_id=:id');
$query->execute([
	'id' => $_GET['id']
]);

header('location: categorie.php');
exit;

?>