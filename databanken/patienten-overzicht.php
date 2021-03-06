<?php 

$conn = new PDO('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->query('SELECT * FROM patienten ORDER BY geboortedatum ASC');
$patienten = $query->fetchAll();

if ($_GET) {
	$error = $_GET['error'];
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
	.error {
		color: red;
	}
	</style>
</head>

<body>

	<a href="patient-toevoegen.php">Toevoegen</a>

	<?php if (isset($error)) : ?>
	<h1 class="error"><?php echo $error ?></h1>
	<?php endif ?>

	<h1>Patientenoverzicht</h1>

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