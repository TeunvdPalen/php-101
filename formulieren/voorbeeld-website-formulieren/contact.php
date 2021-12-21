<!DOCTYPE html>
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
  <h1>Contacteer ons</h1>

  <form method="post">
    <!-- <div class="errorlist">
      <ul>
        <li>Naam is verplicht</li>
        <li>E-mailadres is verplicht</li>
        <li>Bericht is verplicht</li>
        <li>Naam is verplicht</li>
        <li>Kies een onderwerp</li>
        <li>Bericht is verplicht</li>
        <li>Accepteer het privacybeleid</li>
      </ul>
    </div> -->
    <div>
      <label for="naam">Naam: *</label>
      <input id="naam" name="naam" value="" type="text" placeholder="Naam">
      <!-- <span class="error">Naam is verplicht</span> -->
    </div>
    <div>
      <label for="email">E-mailadres: *</label>
      <input id="email" name="email" value="" type="email" placeholder="E-mailadres">
      <!-- <span class="error">E-mailadres is verplicht</span> -->
    </div>
    <div>
      <label for="onderwerp">Onderwerp: *</label>
      <select name="onderwerp" id="onderwerp">
        <option disabled>-- Kies een onderwerp</option>
        <option value="algemeen">Algemeen</option>
        <option value="klacht">Klacht</option>
        <option value="suggestie">Suggestie of idee</option>
      </select>
      <!-- <span class="error">Kies een onderwerp</span> -->
    </div>
    <div>
      <label for="bericht">Bericht: *</label>
      <textarea name="bericht" id="bericht"></textarea>
      <!-- <span class="error">Bericht is verplicht</span> -->
    </div>
    <div>
      <label for="privacy">
        <input name="privacybeleid" type="checkbox" id="privacy">
        Ik ga akkoord met het privacybeleid
      </label>
      <!-- <span class="error">Accepteer het privacybeleid</span> -->
    </div>
    <div>
      <button type="submit">
        Verzenden
      </button>
    </div>

  </form>
</div>
  
</body>
</html>