<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registreren</title>
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
  <h1>Registreren</h1>

  <form>
    <!-- <div class="errorlist">
      <ul>
        <li>Naam is verplicht</li>
        ....
      </ul>
    </div> -->
    <div>
      <label for="naam">Naam: *</label>
      <input id="naam" type="text" placeholder="Naam">
      <!-- <span class="error">Naam is verplicht</span> -->
    </div>
    <div>
      <label for="email">E-mailadres: *</label>
      <input id="email" type="email" placeholder="E-mailadres">
    </div>
    <div>
      Geslacht: *
      <label for="geslacht_man">
        <input id="geslacht_man" type="radio">
        Man
      </label>
      <label for="geslacht_vrouw">
        <input id="geslacht_vrouw" type="radio">
        Vrouw
      </label>
    </div>
    <div>
      Kennis:
      <div>
        <label for="kennis_html">
          <input id="kennis_html" type="checkbox">
          HTML
        </label>
      </div>
      <div>
        <label for="kennis_css">
          <input id="kennis_css" type="checkbox">
          CSS
        </label>
      </div>
      <div>
        <label for="kennis_php">
          <input id="kennis_php" type="checkbox">
          PHP
        </label>
      </div>
      <div>
        <label for="kennis_javascript">
          <input id="kennis_javascript" type="checkbox">
          Javascript
        </label>
      </div>
    </div>
    <div>
      <label for="wachtwoord">Wachtwoord: *</label>
      <input id="wachtwoord" type="password" placeholder="Wachtwoord">
      <!-- <span class="error">We kunnen je niet aanmelden met deze gegevens</span> -->
    </div>
    <div>
      <label for="wachtwoord_confirmatie">Geef je wachtwoord nogmaals in: *</label>
      <input id="wachtwoord_confirmatie" type="password" placeholder="Wachtwoord confirmatie">
      <!-- <span class="error">We kunnen je niet aanmelden met deze gegevens</span> -->
    </div>
    <div>
      <label for="privacy">
        <input type="checkbox" id="privacy">
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