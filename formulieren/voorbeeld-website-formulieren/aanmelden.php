<?php

$foutmeldingen = [];

$username = "admin@test.be";
$wachtwoord = "test123";

if ($_POST) {
  if (!$_POST['email']) {
    $foutmeldingen['email'] = "E-mailadres is verplicht";
  } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $foutmeldingen['email'] = "E-mailadres is niet geldig";
  }

  if (!$_POST['wachtwoord']) {
    $foutmeldingen['wachtwoord'] = "Wachtwoord is verplicht";
  }

  if ($_POST['email'] != $username && $_POST['wachtwoord'] != $wachtwoord) {
    $foutmeldingen['email'] = "We kunnen je niet aanmelden met deze gegevens";
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
        <h1>Aanmelden</h1>

        <?php if ($_POST && empty($foutmeldingen)) : ?>
        <p>Je bent succesvol aangemeld.</p>
        <?php else : ?>
        <form novalidate method="post">
            <?php if (count($foutmeldingen)) : ?>
            <div class="errorlist">
                <ul>
                    <?php foreach ($foutmeldingen as $foutmelding) : ?>
                    <li><?php echo $foutmelding ?></li>
                    <?php endforeach ?>
                </ul>
            </div>
            <?php endif ?>
            <div>
                <label for="email">E-mailadres: *</label>
                <input value="<?php echo $_POST['email'] ?? '' ?>" name="email" id="email" type="email"
                    placeholder="E-mailadres">
                <?php if (isset($foutmeldingen['email'])) : ?>
                <span class="error"><?php echo $foutmeldingen['email'] ?></span>
                <?php endif ?>
            </div>
            <div>
                <label for="wachtwoord">Wachtwoord: *</label>
                <input name="wachtwoord" id="wachtwoord" type="password" placeholder="Wachtwoord">
                <?php if (isset($foutmeldingen['wachtwoord'])) : ?>
                <span class="error"><?php echo $foutmeldingen['wachtwoord'] ?></span>
                <?php endif ?>
            </div>
            <div>
                <button type="submit">
                    Aanmelden
                </button>
            </div>

        </form>
        <?php endif ?>
    </div>

</body>

</html>