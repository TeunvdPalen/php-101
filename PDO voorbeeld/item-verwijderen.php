<?php

include './includes/initialize.php';

if (!isset($_GET['id'])) {
	header('location: index.php');
	exit;
}

$query = $pdo->prepare('DELETE FROM todo_items WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);

header('location: index.php');
exit;

?>