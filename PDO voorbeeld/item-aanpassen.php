<?php 

include './includes/initialize.php';

if (!isset($_GET['id'])) {
	header('location: index.php');
	exit;
}

$foutmeldingen = [];

if ($_POST) {
	include './includes/item-validation.php';

	if (empty($foutmeldingen)) {
		$query = $pdo->prepare('UPDATE todo_items SET omschrijving=:omschrijving, prioriteit=:prioriteit, afgewerkt=:afgewerkt WHERE id=:id');
		$query->execute([
			'id' => $_get['id'],
			'omschrijving' => $_POST['omschrijving'],
			'prioriteit' => $_POST['prioriteit'],
			'afgewerkt' => $_POST['afgewerkt'] ?? 0
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
</head>

<body>
	<header>
		<h1>Todo items</h1>

		<p>
			<a href="index.php">Todo items</a>
		</p>
	</header>

	<section>
		<h2>Item aanpassen</h2>

		<form method="post">
			<?php include './includes/item-form.php' ?>
			<div>
				<label>
					<input <?php if(isset($_POST['afgewerkt']) && $_POST['afgewerkt'] == 1) {echo 'checked';} ?> value="1"
						type="checkbox" name="afgewerkt" id="afgewerkt"> Item is afgewerkt
				</label>
			</div>
			<div>
				<input type="submit" value="Toevoegen">
			</div>
		</form>
	</section>
</body>

</html>