<?php 

$conn = new pdo('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->prepare('SELECT * FROM gemeenten WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$gemeente = $query->fetch();

$query = $conn->prepare('SELECT * FROM patienten WHERE gemeente_id=:id');
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
	<title>Gemeente details</title>
</head>

<body>

	<h1>Gemeente details</h1>

	<a href="gemeente-overzicht.php">Gemeente overzicht</a>

	<ul>
		<li><b>Postcode:</b> <?php echo $gemeente['postcode'] ?></li>
		<li><b>Geleente:</b> <?php echo $gemeente['gemeente'] ?></li>
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