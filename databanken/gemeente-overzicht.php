<?php 

$conn = new pdo('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');
$query = $conn->query("SELECT * FROM gemeenten");
$gemeenten = $query->fetchAll();

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

	<h1>Gemeente overzicht</h1>

	<div>
		<a href="gemeente-toevoegen.php">Gemeente toevoegen</a>
		<a href="patient-toevoegen.php">Patient toevoegen</a>
		<a href="patienten-overzicht.php">Patienten overzicht</a>
	</div>

	<br>

	<table border="1">
		<tr>
			<th>Postcode</th>
			<th>Gemeente</th>
			<th>Handelingen</th>
		</tr>
		<?php foreach($gemeenten as $gemeente): ?>
		<tr>
			<td><?php echo $gemeente['postcode']?></td>
			<td><?php echo $gemeente['gemeente']?></td>
			<td><a href="gemeente-details.php?id=<?php echo $gemeente['id'] ?>">Toon details</a> - <a
					href="gemeente-verwijderen.php?id=<?php echo $gemeente['id']?>">verwijderen</a></td>
			<?php endforeach ?>
		</tr>
	</table>

</body>

</html>