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
    header('location: inloggen.php');
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title>Registreren</title>
</head>

<body class="text-center">
  <?php include './includes/header.php' ?>

  <h1 class="inloggen">Registreren</h1>

  <form class="form-signin" method="post">
    <label for="username" class="sr-only"></label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username"
      value="<?php echo $_POST['username'] ?? '' ?>" autofocus>
    <?php if (isset($foutmeldingen['username'])) : ?>
    <span class="error"><?php echo $foutmeldingen['username'] ?></span>
    <?php endif ?>

    <label for="email" class="sr-only"></label>
    <input type="email" id="email" name="email" class="form-control" placeholder="E-mail"
      value="<?php echo $_POST['email'] ?? '' ?>">
    <?php if (isset($foutmeldingen['email'])) : ?>
    <span class="error"><?php echo $foutmeldingen['email'] ?></span>
    <?php endif ?>

    <label for="password" class="sr-only"></label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password"
      value="<?php echo $_POST['password'] ?? '' ?>">
    <?php if (isset($foutmeldingen['password'])) : ?>
    <span class="error"><?php echo $foutmeldingen['password'] ?></span>
    <?php endif ?>

    <label for="password_confirmatie" class="sr-only"></label>
    <input type="password" id="password_confirmatie" name="password_confirmatie" class="form-control"
      placeholder="Password confirmatie" value="<?php echo $_POST['password_confirmatie'] ?? '' ?>">
    <?php if (isset($foutmeldingen['password_confirmatie'])) : ?>
    <span class="error"><?php echo $foutmeldingen['password_confirmatie'] ?></span>
    <?php endif ?>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Registreren</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
  </form>
</body>

</html>