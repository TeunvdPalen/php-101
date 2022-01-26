<?php 

include './includes/initialize.php';

$foutmeldingen = [];

if ($_POST) {
	include './includes/item-validation.php';

	if (empty($foutmeldingen)) {
		$query = $pdo->prepare('INSERT INTO todo_applicatie.todo_items (omschrijving, prioriteit) VALUES (:omschrijving, :prioriteit)');
		$query->execute([
			'omschrijving' => $_POST['omschrijving'],
			'prioriteit' => $_POST['prioriteit']
		]);
		header('location: index.php');
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
	<title>Item toevoegen</title>
</head>

<body>
	<header>
		<h1>Todo items</h1>

		<p>
			<a href="index.php">Todo items</a>
		</p>
	</header>

	<section>
		<h2>Item toevoegen</h2>

		<form method="post">
			<?php include './includes/item-form.php' ?>
			<div>
				<input type="submit" value="Toevoegen">
			</div>
		</form>
	</section>
</body>

</html>