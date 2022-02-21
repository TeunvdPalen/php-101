<?php

include './includes/initialize.php';

include './includes/admin-validatie.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title>Toevoegen</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main>
    <div class="container">
      <h1>Toevoegen</h1>
      <h4>Kies waar je iets aan wilt toevoegen</h4>
      <ul>
        <li><a href="toevoegen-bier.php">Bier</a></li>
        <li><a href="toevoegen-brouwerij.php">Brouwerij</a></li>
        <li><a href="toevoegen-soort.php">Soort</a></li>
      </ul>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>