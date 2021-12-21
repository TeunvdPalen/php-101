<?php

$foutmeldingen = [];

// Als het formulier verzonden / als de array data bevat
if ($_POST) {

  // Als er geen inhoud in 'naam' zit
  if(!$_POST['naam']) {
    $foutmeldingen['naam'] = "Naam is verplciht.";
  } elseif (strlen($_POST['naam']) < 2) {
    $foutmeldingen['naam'] = "Je naam moet minstens 2 karakters lang zijn.";
  }

  if(!$_POST['email']) {
    $foutmeldingen['email'] = "E-mail is verplciht.";
  }

  // kan op beide manieren
  // if (!$_POST['onderwerpt'] ?? false) {
  if (!isset($_POST['onderwerp'])) {
    $foutmeldingen['onderwerp'] = "Maak een keuze.";
  }

  if(!$_POST['bericht']) {
    $foutmeldingen['bericht'] = "Bericht is verplciht.";
  }

  if(!isset($_POST['privacybeleid'])) {
    $foutmeldingen['privacybeleid'] = "privacybelied is verplciht.";
  }


}


?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contacteer ons</title>
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

  <h1>Contacteer ons</h1>

  <?php if ($_POST && empty($foutmeldingen)): ?>
    <p>We hebben je bericht goed ontvangen en contacteren je zo spoedig moeglijk.</p>
    <?php else: ?>
  <form novalidate method="post">

    <?php if($foutmeldingen): ?>
    <div class="errorlist">
      <ul>
        <?php foreach($foutmeldingen as $foutmelding): ?>
          <li><?php echo $foutmelding ?></li>
        <?php endforeach; ?>
      </ul>
    </div>
    <?php endif; ?>

    <div>
      <label for="naam">Naam: *</label>
      <input id="naam" name="naam" value="<?php echo $_POST['naam'] ?? '' ?>" type="text" placeholder="Naam">
      <?php if($foutmeldingen['naam'] ?? false ): ?>
        <span class="error"><?php echo $foutmeldingen['naam'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <label for="email">E-mailadres: *</label>
      <input id="email" name="email" value="<?php echo $_POST['email'] ?? '' ?>" type="email" placeholder="E-mailadres">
      <?php if($foutmeldingen['email'] ?? false ): ?>
        <span class="error"><?php echo $foutmeldingen['email'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <label for="onderwerp">Onderwerp: *</label>
      <select name="onderwerp" id="onderwerp">
        <option <?php if (!isset($_POST['onderwerp'])) { echo 'selected'; } ?> disabled>-- Kies een onderwerp</option>
        <option <?php if (isset($_POST['onderwerp']) && $_POST['onderwerp'] == 'algemeen') { echo 'selected'; } ?> value="algemeen">Algemeen</option>
        <option <?php if (isset($_POST['onderwerp']) && $_POST['onderwerp'] == 'klacht') { echo 'selected'; } ?> value="klacht">Klacht</option>
        <option <?php if (isset($_POST['onderwerp']) && $_POST['onderwerp'] == 'suggestie') { echo 'selected'; } ?> value="suggestie">Suggestie of idee</option>
      </select>
      <?php if (isset($foutmeldingen['onderwerp'])): ?>
        <span class="error"><?php echo $foutmeldingen['onderwerp'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <label for="bericht">Bericht: *</label>
      <textarea name="bericht" id="bericht"><?php echo $_POST['bericht'] ?? '' ?></textarea>
      <?php if ($foutmeldingen['bericht'] ?? false ): ?>
      <span class="error"><?php echo $foutmeldingen['bericht'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <label for="privacy">
        <input <?php if(isset($_POST['privacybeleid'])) { echo 'checked'; } ?> name="privacybeleid" type="checkbox" id="privacy">
        Ik ga akkoord met het privacybeleid
      </label>
      <?php if ($foutmeldingen['privacybeleid'] ?? false ): ?>
      <span class="error"><?php echo $foutmeldingen['privacybeleid'] ?></span>
      <?php endif; ?>
    </div>
    <div>
      <button type="submit">
        Verzenden
      </button>
    </div>

  </form>
  <?php endif; ?>
</div>
  
</body>
</html>