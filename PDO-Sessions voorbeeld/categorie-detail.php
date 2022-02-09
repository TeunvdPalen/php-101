<?php 

include './includes/initialize.php';

$query = $pdo->prepare('SELECT * FROM todo_items WHERE categorie_id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$categories = $query->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Categorie details</title>
</head>

<body>
	<header>
		<h1>Categorie details</h1>
		<p>
			<a href="index.php">Todo items</a>
		</p>
		<p>
			<a href="categorie-toevoegen.php">Categorie toevoegen</a>
		</p>
	</header>

	<section>
		<h2>php categorie</h2>
		<?php foreach ($categories as $categorie)  :?>
		<p><?php echo $categorie['omschrijving'] ?></p>
		<?php endforeach; ?>
	</section>
</body>

</html>