<?php 

include './includes/initialize.php';

$foutmeldingen = [];

if ($_POST) {

	// Naam validatie
	if (!$_POST['username']) {
		$foutmeldingen['username'] = "Je moet je username invullen";
	}

	// E-mail validatie
	if (!$_POST['email']) {
		$foutmeldingen['email'] = "Je moet je E-mail invullen";
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$foutmeldingen['email'] = "Vul een geldig E-mail in";
	}

	// Wachtwoord validatie
	if (!$_POST['password']) {
		$foutmeldingen['password'] = "Je moet je wachtwoord invullen";
	} elseif (!$_POST['password_confirmatie']) {
		$foutmeldingen['password_confirmatie'] = "Je moet je wachtwoord invullen";
	} elseif ($_POST['password'] != $_POST['password_confirmatie']) {
		$foutmeldingen['password_confirmatie'] = "Je opgegeven wachtwoorden komen niet overeen";
		$foutmeldingen['password'] = "Je opgegeven wachtwoorden komen niet overeen";
	}

	if (empty($foutmeldingen)) {
		$query = $pdo->prepare('INSERT INTO gebruikers (username, email, password) VALUES (:username, :email, :password) ');
		$query->execute([
			'username' => $_POST['username'],
			'email' => $_POST['email'],
			'password' => password_hash($_POST['password'], PASSWORD_BCRYPT)
		]);
		header('location: aanmelden.php');
		exit;
	}

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Registratie</title>
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
			<label for="email">E-mailadres:</label>
			<input name="email" value="<?php echo $_POST['email'] ?? '' ?>" id="email" type="email" placeholder="E-mailadres">
			<?php if (isset($foutmeldingen['email'])) : ?>
			<span class="error"><?php echo $foutmeldingen['email'] ?></span>
			<?php endif ?>
		</div>

		<div>
			<label for="password">Wachtwoord:</label>
			<input name="password" value="<?php echo $_POST['password'] ?? '' ?>" id="password" type="password"
				placeholder="wachtwoord">
			<?php if (isset($foutmeldingen['password'])) : ?>
			<span class="error"><?php echo $foutmeldingen['password'] ?></span>
			<?php endif ?>
		</div>

		<div>
			<label for="password_confirmatie">Wachtwoord confirmatie:</label>
			<input name="password_confirmatie" value="<?php echo $_POST['password_confirmatie'] ?? '' ?>"
				id="password_confirmatie" type="password" placeholder="wachtwoord confirmatie">
			<?php if (isset($foutmeldingen['password_confirmatie'])) : ?>
			<span class="error"><?php echo $foutmeldingen['password_confirmatie'] ?></span>
			<?php endif ?>
		</div>

		<div>
			<input type="submit" value="Registreren">
		</div>
	</form>
</body>

</html>