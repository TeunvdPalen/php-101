<?php

include './includes/initialize.php';

$foutmeldingen = [];

if ($_POST) {

  // veld leeg validatie
  if (empty($_POST['username']) || empty($_POST['password'])) {
    $foutmeldingen['username'] = "Je moet je username en wachtwoord invullen";
  }

  // database check
  if (empty($foutmeldingen)) {
    $query = $pdo->prepare('SELECT * FROM gebruikers WHERE username=:username LIMIT 1');
    $query->execute([
      'username' => $_POST['username']
    ]);
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
  <?php include './includes/meta.php' ?>
  <title>Inloggen</title>
</head>

<body class="text-center">
  <?php include './includes/header.php' ?>

  <h1 class="inloggen">Inloggen</h1>
  <form class="form-signin" method="post">
    <label for="username" class="sr-only"></label>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username"
      value="<?php echo $_POST['username'] ?? '' ?>" autofocus>
    <?php if (isset($foutmeldingen['username'])) : ?>
    <span class="error"><?php echo $foutmeldingen['username'] ?></span>
    <?php endif ?>

    <label for="password" class="sr-only"></label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Inloggen</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
  </form>

</body>

</html>