<?php

include './includes/initialize.php';

include './includes/admin-validatie.php';

$query = $pdo->query('SELECT * FROM brouwerijen');
$brouwerijen = $query->fetchAll();

$foutmeldingen = [];

if ($_POST) {

  if (empty($_POST['naam'])) {
    $foutmeldingen['naam'] = 'naam is verplicht';
  } elseif (strlen($_POST['naam']) > 255) {
    $foutmeldingen = 'Naam mag niet langer als 255 tekens zijn';
  }

  if (empty($foutmeldingen)) {
    $query = $pdo->prepare('INSERT INTO brouwerijen (naam) VALUES (:naam)');
    $query->execute([
      'naam' => $_POST['naam'],
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
  <title>Brouwerij toevoegen</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main class="container">
    <section class="text-center">
      <h2>Brouwerij toevoegen</h2>

      <form class="form-signin" method="post">
        <label for="naam" class="sr-only"></label>
        <input type="text" id="naam" name="naam" class="form-control" placeholder="naam"
          value="<?php echo $_POST['naam'] ?? '' ?>" autofocus>
        <?php if (isset($foutmeldingen['naam'])) : ?>
        <span class="error"><?php echo $foutmeldingen['naam'] ?></span>
        <?php endif ?>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Toevoegen</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </section>
    <section>
      <ul>
        <?php foreach ($brouwerijen as $brouwerij) : ?>
        <li><a
            href="details-brouwerij.php?brouwerij_id=<?php echo $brouwerij['id'] ?>"><?php echo $brouwerij['naam'] ?></a>
          - <a class="verwijderen" href="verwijderen-brouwerij.php">Verwijderen</a></li>
        <?php endforeach; ?>
      </ul>
    </section>
  </main>

</body>

</html>