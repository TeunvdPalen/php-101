<?php

include './includes/initialize.php';

if (!isset($_GET['id'])) {
	header('location: index.php');
	exit;
}

$query = $pdo->prepare('SELECT * FROM todo_items WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$omschrijving = $query->fetch();

if (empty($_SESSION)) {
	header('location: index.php');
	exit;
}

$query = $pdo->prepare('SELECT * FROM gebruikers WHERE id=:id');
$query->execute([
	'id' => $_SESSION['user']['id']
]);
$gebruiker = $query->fetch();


if ($gebruiker['id'] == $omschrijving['gebruiker_id']) {
	$query = $pdo->prepare('DELETE FROM todo_items WHERE id=:id');
	$query->execute([
	'id' => $_GET['id']
]);
} else {
	header('location: index.php');
	exit;
}




// header('location: index.php');
// exit;

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<pre style="color:blue;"><?php print_r($gebruiker) ?></pre>
	<pre style="color:red;"><?php print_r($omschrijving)?></pre>
</body>

</html>