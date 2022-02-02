<?php

include './includes/initialize.php';

$query = $pdo->query('SELECT * FROM categorie');
$categories = $query->fetchAll();

$foutmeldingen = [];

if ($_POST) {
	if (empty($_POST['categorie'])) {
		$foutmeldingen['categorie'] = "Categorie invullen";
	}

	if (empty($foutmeldingen)) {
		$query = $pdo->prepare('INSERT INTO todo_applicatie.categorie (naam) VALUES (:categorie)');
		$query->execute([
			'categorie' => $_POST['categorie']
		]);
		header('location: categorie.php');
		exit;
	}
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Categorieen</title>
	<style>
	span {
		color: red;
	}
	</style>
</head>

<body>
	<header>
		<h1>Todo items</h1>

		<p>
			<a href="index.php">Todo items</a>
		</p>
		<p>
			<a href="categorie.php">Categorieen</a>
		</p>
	</header>

	<section>
		<h2>Categorie toevoegen</h2>

		<form method="post">
			<label for="categorie">Naam categorie: </label>
			<input type="text" name="categorie" id="categorie" placeholder="Categorie invullen">
			<?php if (isset($foutmeldingen['categorie'])): ?>
			<span><?php echo $foutmeldingen['categorie'] ?></span>
			<?php endif; ?>
			<div>
				<input type="submit" value="Toevoegen">
			</div>
		</form>

	</section>

</body>

</html>