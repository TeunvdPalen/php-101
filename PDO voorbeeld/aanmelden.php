<?php 

include './includes/initialize.php';

$foutmeldingen = [];

if ($_POST) {

	// Naam validatie
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$foutmeldingen['username'] = "Je moet je username en wachtwoord invullen";
	}

	if (empty($foutmeldingen)) {
		$query = $pdo->prepare('SELECT * FROM gebruikers WHERE username=:username LIMIT 1');
		$query->execute(['username' => $_POST['username']]);
		$user = $query->fetch();

		if ($user && password_verify($_POST['password'], $user['password'])) {
			$_SESSION['user'] = $user;
			header('location: index.php');
		} else {
			$foutmeldingen['username'] = 'We kunnen je niet aanmelden met deze gegevens';
		}
	}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Aanmelden</title>
</head>

<body>
	<form method="post">

		<div>
			<label for="username">Username:</label>
			<input name="username" value="<?php echo $_POST['username'] ?? '' ?>" id="username" type="text"
				placeholder="Username">
			<?php if (isset($foutmeldingen['username'])) : ?>
			<span class="error"><?php echo $foutmeldingen['username'] ?></span>
			<?php endif ?>
		</div>

		<div>
			<label for="password">Wachtwoord:</label>
			<input type="password" name="password" id="password" placeholder="wachtwoord">
		</div>

		<div>
			<input type="submit" value="Aanmelden">
		</div>

	</form>
</body>

</html>