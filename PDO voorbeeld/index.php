<?php 

include './includes/initialize.php';

$query = $pdo->query('SELECT * FROM todo_items WHERE afgewerkt=0');
$todoitems = $query->fetchAll();

$query = $pdo->query('SELECT * FROM todo_items WHERE afgewerkt=1');
$completed_items = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Todo items</title>
</head>

<body>
	<header>
		<h1>Todo items</h1>
		<p>
			<a href="item-toevoegen.php">Nieuw item toevoegen</a> <a href="categorie.php">Categorie</a>
		</p>
	</header>

	<section>
		<?php if (count($todoitems)): ?>
		<ul>
			<?php foreach ($todoitems as $item): ?>
			<?php include './includes/todo-listitem.php' ?>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
		<p>Er wijn geen todo items te doen!</p>
		<?php endif; ?>
	</section>

	<section>
		<h2>Afgewerkte items</h2>
		<?php if (count($completed_items)): ?>
		<ul>
			<?php foreach ($completed_items as $item): ?>
			<?php include './includes/todo-listitem.php' ?>
			<?php endforeach; ?>
		</ul>
		<?php else: ?>
		<p>Er zijn geen afegwerkte items</p>
		<?php endif; ?>
	</section>
</body>

</html>