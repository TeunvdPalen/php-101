<?php 

include './includes/initialize.php';

$query = $pdo->query('SELECT * FROM categorie');
$categories = $query->fetchAll();

if (!isset($_GET['id'])) {
	header('location: index.php');
	exit;
} elseif (empty($_SESSION)) {
	header('location: index.php');
	exit;
}

$query = $pdo->prepare('SELECT * FROM todo_items WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$omschrijving = $query->fetch();

$query = $pdo->prepare('SELECT * FROM gebruikers WHERE id=:id');
$query->execute([
	'id' => $_SESSION['user']['id']
]);
$gebruiker = $query->fetch();

$foutmeldingen = [];

if ($_POST) {
	include './includes/item-validation.php';

	if ($gebruiker['id'] != $omschrijving['gebruiker_id']) {
		$foutmeldingen['login'] = "Je bent niet gemachtiged om dit aan te passen.";
	}

	if (empty($foutmeldingen)) {
		$query = $pdo->prepare('UPDATE todo_items SET omschrijving=:omschrijving, prioriteit=:prioriteit, afgewerkt=:afgewerkt, categorie_id=:categorie WHERE id=:id');
		$query->execute([
			'id' => $_GET['id'],
			'omschrijving' => $_POST['omschrijving'],
			'prioriteit' => $_POST['prioriteit'],
			'afgewerkt' => $_POST['afgewerkt'] ?? 0,
			'categorie' => $_POST['categorie']
		]);
		header('location: item-details.php?id='.$_GET['id']);
		exit;
	}
} else {
	$query = $pdo->prepare('SELECT * FROM todo_items WHERE id=:id');
	$query->execute([
		'id' => $_GET['id']
	]);
	$_POST = $query->fetch();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Item aanpassen</title>
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
			<a href="index.php">Todo items</a> <a href="item-toevoegen.php">Nieuw item toevoegen</a> <a
				href="categorie.php">Categorie</a> <a href="categorie-toevoegen.php">Categorie toevoegen</a>
		</p>
	</header>

	<section>
		<h2>Item aanpassen</h2>
		<?php if (isset($foutmeldingen['login'])): ?>
		<span><?php echo $foutmeldingen['login'] ?></span>
		<?php endif; ?>

		<form method="post">
			<?php include './includes/item-form.php' ?>
			<div>
				<label>
					<input <?php if(isset($_POST['afgewerkt']) && $_POST['afgewerkt'] == 1) {echo 'checked';} ?> value="1"
						type="checkbox" name="afgewerkt" id="afgewerkt"> Item is afgewerkt
				</label>
			</div>
			<div>
				<input type="submit" value="Aanpassen">
			</div>
		</form>
	</section>
</body>

</html>