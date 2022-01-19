<?php 

$conn = new PDO('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');

$query = $conn->query('SELECT * FROM bloedgroepen ORDER BY omschrijving ASC');
$bloedgroepen = $query->fetchAll();

$query = $conn->query('SELECT * FROM gemeenten ORDER BY postcode ASC');
$gemeenten = $query->fetchAll();

$foutmeldingen=[];
$succes = false;

if ($_POST) {

	// if ($_POST['naam']) {}

	if (empty($foutmeldingen)) {
		// toevoegen aan databank
		$query = $conn->prepare("INSERT INTO patienten (naam, voornaam, straat, huisnummer, gemeente_id, bloedgroep_id, geboortedatum, geslacht, telefoonnummer) VALUES (:naam, :voornaam, :straat, :huisnummer, :gemeente_id, :bloedgroep_id, :geboortedatum, :geslacht, :telefoonnummer)"
	);
	}
	$query->execute([
		'naam' => $_POST['naam'],
		'voornaam' => $_POST['voornaam'],
		'straat' => $_POST['straat'],
		'huisnummer' => $_POST['huisnummer'],
		'gemeente_id' => $_POST['gemeente_id'],
		'bloedgroep_id' => $_POST['bloedgroep_id'],
		'geboortedatum' => $_POST['geboortedatum'],
		'geslacht' => $_POST['geslacht'],
		'telefoonnummer' => $_POST['telefoonnummer']
	]);
	$_POST = [];
	$succes = true;

}

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

	<a href="patienten-overzicht.php">overzicht</a>

	<h1>Patien toevoegen</h1>

	<?php if ($succes): ?>
	<h2>Patient is toegevoegd</h2>
	<?php endif ?>

	<form method="post">
		<div>
			<p>Voornaam + naam</p>
			<input type="text" name="voornaam">
			<input type="text" name="naam">
		</div>
		<div>
			<p>Straat + huisnummer</p>
			<input type="text" name="straat">
			<input type="text" name="huisnummer">
		</div>
		<div>
			<p>Gemeente</p>
			<select name="gemeente_id">
				<?php foreach($gemeenten as $gemeente): ?>
				<option value="<?php echo $gemeente['id'] ?>"><?php echo $gemeente['postcode'] ?> -
					<?php echo $gemeente['gemeente'] ?></option>
				<?php endforeach ?>
			</select>
			<a href="gemeente-toevoegen.php">Gemeente toevoegen</a>
		</div>
		<div>
			<p>Bloedgroep</p>
			<select name="bloedgroep_id">
				<?php foreach($bloedgroepen as $bloedgroep): ?>
				<option value="<?php echo $bloedgroep['id'] ?>"> <?php echo $bloedgroep['omschrijving'] ?> </option>
				<?php endforeach ?>
			</select>
		</div>
		<div>
			<p>Geboortedatum</p>
			<input type="date" name="geboortedatum">
		</div>
		<div>
			<p>Geslacht</p>
			<select name="geslacht">
				<option value="m">Man</option>
				<option value="v">Vrouw</option>
			</select>
		</div>
		<div>
			<p>Telefoonnummerr</p>
			<input type="text" name="telefoonnummer">
		</div>
		<div>
			<input type="submit" value="verzenden">
		</div>
	</form>

</body>

</html>