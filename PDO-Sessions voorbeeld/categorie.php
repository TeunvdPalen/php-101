<?php

include './includes/initialize.php';

$query = $pdo->query('SELECT * FROM categorie');
$categories = $query->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Categorieen</title>
</head>

<body>
	<header>
		<h1>Todo items</h1>

		<p>
			<a href="index.php">Todo items</a>
		</p>
		<p>
			<a href="categorie-toevoegen.php">Categorie toevoegen</a>
		</p>
	</header>

	<section>
		<h2>Categorieen</h2>

		<?php foreach ($categories as $categorie) : ?>
		<p>
			<?php echo $categorie['id'] ?> <?php echo $categorie['naam'] ?>
			<a href="categorie-verwijderen.php?id=<?php echo $categorie['id'] ?>"> Verwijderen </a>
			<a href="categorie-detail.php?id=<?php echo $categorie['id'] ?>"> Details </a>
		</p>
		<?php endforeach ?>

	</section>

</body>

</html>