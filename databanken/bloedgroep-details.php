<?php

$conn = new pdo('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->prepare('SELECT * FROM bloedgroepen WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$bloedgroep = $query->fetch();

$query = $conn->prepare('SELECT * FROM patienten WHERE bloedgroep_id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$patienten = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bloedgroep details</title>
</head>

<body>

	<a href="bloedgroepen-overzicht.php">Bloedgroep overzicht</a>

	<h1>Bloedgroep details</h1>

	<ul>
		<li><b>Bloedgroep:</b> <?php echo $bloedgroep['omschrijving'] ?> </li>
	</ul>


	<table border="1">
		<tr>
			<th>Voornaam</th>
			<th>Naam</th>
			<th>Geboortedatum</th>
			<th>Gemeente</th>
			<th>Handelingen</th>
		</tr>
		<?php foreach($patienten as $patient): ?>

		<?php
				$query = $conn->query("SELECT * FROM gemeenten WHERE id=$patient[gemeente_id]");
				$gemeente = $query->fetch();
				?>
		<tr>
			<td><?php echo $patient['voornaam'] ?></td>
			<td><?php echo $patient['naam'] ?></td>
			<td><?php echo $patient['geboortedatum'] ?></td>
			<td><?php echo $gemeente['gemeente'] ?></td>
			<td><a href="patient-details.php?id=<?php echo $patient['id'] ?>">Toon details</a> - <a
					href="patient-verwijderen.php?id=<?php echo $patient['id'] ?>">Verwijderen</a></td>
		</tr>
		<?php endforeach ?>

	</table>
</body>

</html>