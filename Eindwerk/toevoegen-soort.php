<?php

include './includes/initialize.php';

include './includes/admin-validatie.php';

$query = $pdo->query('SELECT * FROM soorten');
$soorten = $query->fetchAll();

$foutmeldingen = [];

if ($_POST) {

  if (empty($_POST['naam'])) {
    $foutmeldingen['naam'] = 'naam is verplicht';
  } elseif (strlen($_POST['naam']) > 255) {
    $foutmeldingen = 'Naam mag niet langer als 255 tekens zijn';
  }

  if (empty($_POST['omschrijving'])) {
    $foutmeldingen['omschrijving'] = 'Omschrijving is verplicht';
  }

  if (empty($foutmeldingen)) {
    $query = $pdo->prepare('INSERT INTO soorten (naam, omschrijving) VALUES (:naam, :omschrijving)');
    $query->execute([
      'naam' => $_POST['naam'],
      'omschrijving' => $_POST['omschrijving']
    ]);
    header('location: toevoegen.php');
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title>Soort toevoegen</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main class="container">
    <section class="text-center">
      <h2>Soort toevoegen</h2>

      <form class="form-signin" method="post">
        <label for="naam" class="sr-only"></label>
        <input type="text" id="naam" name="naam" class="form-control" placeholder="naam"
          value="<?php echo $_POST['naam'] ?? '' ?>" autofocus>
        <?php if (isset($foutmeldingen['naam'])) : ?>
        <span class="error"><?php echo $foutmeldingen['naam'] ?></span>
        <?php endif ?>

        <label for="omschrijving" class="sr-only"></label>
        <input type="text" id="omschrijving" name="omschrijving" class="form-control" placeholder="Omschrijving"
          value="<?php echo $_POST['omschrijving'] ?? '' ?>">
        <?php if (isset($foutmeldingen['omschrijving'])) : ?>
        <span class="error"><?php echo $foutmeldingen['omschrijving'] ?></span>
        <?php endif ?>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Toevoegen</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </section>
    <section>
      <ul>
        <?php foreach ($soorten as $soort) : ?>
        <li><a href="details-soort.php?soort_id=<?php echo $soort['id'] ?>"><?php echo $soort['naam'] ?></a> - <a
            class="verwijderen" href="verwijderen-soort.php">Verwijderen</a></li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>

</body>

</html>