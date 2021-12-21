<?php 

$foutmeldingen = [];

if ($_POST) {
  
  if (!$_POST['email']) {
    $foutmeldingen['email'] == "Je moet een email invullen.";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $foutmeldingen['email'] == "Vul een geldig email in";
  }

  if (!$_POST['wachtwoord']) {
    $foutmeldingen['wachtwoord'] == "Je mooet een wachtwoord invullen.";
  }
}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Aanmelden</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav class="main-nav">
  <div class="container">
    <a href="#">Home</a>
    <a href="contact.php">Contacteer ons</a>
    <a href="aanmelden.php">Aanmelden</a>
    <a href="registreren.php">Registreren</a>
  </div>
</nav>

<div class="container">

  <pre><?php print_r($_POST) ?></pre>
  <pre><?php print_r($foutmeldingen) ?></pre>

  <h1>Aanmelden</h1>

  <form novalidate method="post">
    <!-- <div class="errorlist">
      <ul>
        <li>E-mailadres is verplicht</li>
        <li>Paswoord is verplicht</li>
        <li>We kunnen je niet aanmelden met deze gegevens</li>
      </ul>
    </div> -->
    <div>
      <label for="email">E-mailadres: *</label>
      <input id="email" name="email" value="<?php echo $_POST['email'] ?? '' ?>" type="email" placeholder="E-mailadres">
      <?php if ($foutmeldingen['email'] ?? false): ?>
        <span class="error"><?php echo $foutmeldingen['email'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <label for="wachtwoord">Wachtwoord: *</label>
      <input id="wachtwoord" naam="wachtwoord" value="<?php echo $_POST['wachtwoord'] ?? '' ?>" type="password" placeholder="Wachtwoord">
      <?php if(isset($foutmeldingen['wachtwoord'])): ?>
        <span class="error"><?php echo $foutmeldingen['wachtwoord'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <button type="submit">
        Aanmelden
      </button>
    </div>

  </form>
</div>
  
</body>
</html>