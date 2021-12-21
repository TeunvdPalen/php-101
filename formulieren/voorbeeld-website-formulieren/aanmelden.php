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

  <form>
    <!-- <div class="errorlist">
      <ul>
        <li>E-mailadres is verplicht</li>
        <li>Paswoord is verplicht</li>
        <li>We kunnen je niet aanmelden met deze gegevens</li>
      </ul>
    </div> -->
    <div>
      <label for="email">E-mailadres: *</label>
      <input id="email" type="email" placeholder="E-mailadres">
      <!-- <span class="error">E-mailadres is verplicht</span> -->
    </div>
    <div>
      <label for="wachtwoord">Wachtwoord: *</label>
      <input id="wachtwoord" type="password" placeholder="Wachtwoord">
      <!-- <span class="error">We kunnen je niet aanmelden met deze gegevens</span> -->
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