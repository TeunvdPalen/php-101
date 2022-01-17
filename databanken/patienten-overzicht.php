<?php 

$conn = new PDO('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->query('SELECT * FROM patienten ORDER BY geboortedatum ASC');
$patienten = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>

	<a href="patient-toevoegen.php">Toevoegen</a>

	<h1>Patientenoverzicht</h1>

	<table border="1">
		<tr>
			<th>Voornaam</th>
			<th>Naam</th>
			<th>Geboortedatum</th>
		</tr>
		<?php foreach($patienten as $patient): ?>
		<tr>
			<td><?php echo $patient['voornaam'] ?></td>
			<td><?php echo $patient['naam'] ?></td>
			<td><?php echo $patient['geboortedatum'] ?></td>
		</tr>
		<?php endforeach ?>

	</table>

</body>

</html>