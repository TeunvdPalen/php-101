<?php

$conn = new PDO('mysql:host=localhost;dbname=dokterspraktijk;port=3306', 'root', '');
$query = $conn->query('SELECT * FROM gemeenten');
$gemeenten = $query->fetchAll();

$foutmeldingen = [];
$succes = false;

if ($_POST) {
	
	// validatie
	if (!$_POST['gemeente']) {
		$foutmeldingen['gemeente'] = 'Je moet een gemeente opgeven';
	}

	if (!$_POST['postcode']) {
		$foutmeldingen['postcode'] = 'Je moet een postcode invullen';
	} elseif (!is_numeric($_POST['postcode'])) {
		$foutmeldingen['postcode'] = 'De postcode mag alleen nummers bevatten';
	} elseif (strlen($_POST['postcode']) != 4) {
		$foutmeldingen['postcode'] = 'De postcode moet 4 cijfers bevatten';
	}

	if (empty($foutmeldingen)) {
		// In database stoppen
		$query = $conn->prepare("INSERT INTO gemeenten (gemeente, postcode) VALUES (:gemeente, :postcode)");
	
		$query->execute([
			'gemeente' => $_POST['gemeente'],
			'postcode' => $_POST['postcode']
		]);
		$_POST = [];
		$succes = true;
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Gemeente toevoegen</title>
	<style>
	.error {
		color: red;
	}

	.succes {
		color: green;
	}
	</style>
</head>

<body>

	<a href="patient-toevoegen.php">Patient toevoegen</a>
	<a href="gemeente-overzicht.php">Gemeente overzicht</a>

	<h1>Gemeente toevoegen</h1>

	<?php if ($succes): ?>
	<h2 class="succes">Gemeente succesvol toegevoegd</h2>
	<?php endif ?>

	<form action="" method="post">

		<h2>Gemeente</h2>
		<input type="text" name="gemeente" value="<?php echo $_POST['gemeente'] ?? '' ?>" placeholder="Gemeente">
		<?php if (isset($foutmeldingen['gemeente'])) : ?>
		<span class="error"><?php echo $foutmeldingen['gemeente'] ?></span>
		<?php endif ?>

		<h2>Postcode</h2>
		<input name="postcode" type="text" value="<?php echo $_POST['postcode'] ?? '' ?>" placeholder="Postcode">
		<?php if (isset($foutmeldingen['postcode'])) : ?>
		<span class="error"><?php echo $foutmeldingen['postcode'] ?></span>
		<?php endif ?>
		<br>
		<input type="submit" value="verzenden">
	</form>

</body>

</html>