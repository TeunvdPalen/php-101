<?php

$conn = new pdo('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');
$query = $conn->prepare('SELECT * FROM patienten WHERE id=:id');
$query->execute([
	'id' => $_GET['id']
]);
$patient = $query->fetch();

if (!$patient) {
	header('location: patienten-overzicht.php?error=Patient bestaat niet!');
}

$query = $conn->prepare('SELECT * FROM bloedgroepen WHERE id=:id');
$query->execute([
	'id' => $patient['bloedgroep_id']
]);
$bloedgroep = $query->fetch();

$query = $conn->prepare('SELECT * FROM gemeenten WHERE id=:id');
$query->execute([
	'id' => $patient['gemeente_id']
]);
$gemeente = $query->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Patient details</title>
</head>

<body>

	<a href="patienten-overzicht.php">Patienten overzicht</a>

	<h1>Patient: <?php echo $patient['voornaam'] ?> <?php echo $patient['naam'] ?></h1>

	<p>
		<b>Adres:</b> <br>
		<?php echo $patient['straat'] ?> <?php echo $patient['huisnummer'] ?> <br>
		<a href="gemeente-details.php?id=<?php echo $gemeente['id'] ?>"><?php echo $gemeente['postcode'] ?>
			<?php echo $gemeente['gemeente'] ?></a>
	</p>

	<ul>
		<li>Geslacht: <?php echo $patient['geslacht'] ?></li>
		<li>telefoonnummer: <?php echo $patient['telefoonnummer'] ?></li>
		<li>Bloedgroep: <a
				href="bloedgroep-details.php?id=<?php echo $bloedgroep['id'] ?>"><?php echo $bloedgroep['omschrijving'] ?></a>
		</li>
		<li>Geboortedatum: <?php echo $patient['geboortedatum'] ?></li>
	</ul>

</body>

</html>