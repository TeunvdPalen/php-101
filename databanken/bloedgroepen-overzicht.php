<?php 

$conn = new pdo('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');
$query = $conn->query("SELECT * FROM bloedgroepen");
$bloedgroepen = $query->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gemeente overzicht</title>
</head>

<body>

	<h1>Bloedgroep overzicht</h1>

	<div>
		<a href="gemeente-overzicht.php">Gemeente overzicht</a>
		<a href="patient-toevoegen.php">Patient toevoegen</a>
		<a href="patienten-overzicht.php">Patienten overzicht</a>
	</div>

	<br>

	<table border="1">
		<tr>
			<th>Bloedgroep</th>
			<th>Handelingen</th>
		</tr>
		<?php foreach($bloedgroepen as $bloedgroep): ?>
		<tr>
			<td><?php echo $bloedgroep['omschrijving']?></td>
			<td><a href="bloedgroep-details.php?id=<?php echo $bloedgroep['id'] ?>">Toon details</a>
				<?php endforeach ?>
		</tr>
	</table>

</body>

</html>