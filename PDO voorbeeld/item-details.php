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
$item = $query->fetch();

$datum = new DateTime($item['datum']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Item details</title>
</head>

<body>

	<header>
		<h1>Todo items</h1>
		<p>
			<a href="item-toevoegen.php">Nieuw item toevoegen</a>
		</p>
	</header>

	<section>
		<h2>Todo: <?php echo $item['omschrijving'] ?></h2>

		<div>
			<p>
				<a href="item-aanpassen.php?id=<?php echo $item['id'] ?>">Aanpassen</a>
				<a href="item-verwijderen.php?id=<?php echo $item['id'] ?>">verwijderen</a>
			</p>
		</div>

		<p>Aangemaakt op <?php echo $datum->format('d M Y') ?></p>
		<p><b>Prioriteit:</b> <?php echo $item['prioriteit'] ?></p>
		<p><b>Status:</b> <?php echo $item['afgewerkt'] ? 'afgewerkt' : 'Nog af te werken' ?></p>
	</section>

</body>

</html>