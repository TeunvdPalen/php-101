<header>
  <div class="container header">
    <h1><a class="logo" href="index.php">LOGO</a></h1>
    <nav>
      <a class="logo" href="index.php">Home</a>
      <?php if (empty($_SESSION)) : ?>
      <a class="logo" href="inloggen.php">Inloggen</a>
      <a class="logo" href="registreren.php">Registreren</a>
      <?php elseif ($_SESSION['user']['admin'] == true) : ?>
      <a class="logo" href="toevoegen.php">Toevoegen</a>
      <a class="logo" href="uitloggen.php">Uitloggen</a>
      <?php else : ?>
      <a class="logo" href="uitloggen.php">Uitloggen</a>
      <?php endif; ?>
    </nav>
  </div>
</header>