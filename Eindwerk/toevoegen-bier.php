<?php

include './includes/initialize.php';

include './includes/admin-validatie.php';

$query = $pdo->query('SELECT * FROM brouwerijen');
$brouwerijen = $query->fetchAll();

$query = $pdo->query('SELECT * FROM kleuren');
$kleuren = $query->fetchAll();

$query = $pdo->query('SELECT * FROM soorten');
$soorten = $query->fetchAll();

$foutmeldingen = [];
$decimaal = '/^(0|[1-9]\d*)(\.\d+)?$/';

if ($_POST) {

  if (empty($_POST['naam'])) {
    $foutmeldingen['naam'] = 'naam is verplicht';
  } elseif (strlen($_POST['naam']) > 255) {
    $foutmeldingen = 'Naam mag niet langer als 255 tekens zijn';
  }

  if (empty($_POST['alchohol'])) {
    $foutmeldingen['alchohol'] = 'alchohol is verplicht';
  } elseif (strlen($_POST['alchohol']) > 4) {
    $foutmeldingen = 'alchohol mag niet langer als 4 tekens zijn';
  } elseif (!preg_match($decimaal, $_POST['alchohol'])) {
    $foutmeldingen = 'alchohol mag alleen getallen bevatten';
  }

  if (empty($_POST['inhoud'])) {
    $foutmeldingen['inhoud'] = 'inhoud is verplicht';
  } elseif (strlen($_POST['inhoud']) > 6) {
    $foutmeldingen = 'inhoud mag niet langer als 6 tekens zijn';
  } elseif (!preg_match($decimaal, $_POST['inhoud'])) {
    $foutmeldingen = 'inhoud mag alleen getallen bevatten';
  }

  if (empty($_POST['prijs'])) {
    $foutmeldingen['prijs'] = 'prijs is verplicht';
  } elseif (strlen($_POST['prijs']) > 6) {
    $foutmeldingen = 'prijs mag niet langer als 6 tekens zijn';
  } elseif (!preg_match($decimaal, $_POST['prijs'])) {
    $foutmeldingen = 'prijs mag alleen getallen bevatten';
  }

  if (strlen($_POST['statiegeld']) > 4) {
    $foutmeldingen = 'statiegeld mag niet langer als 4 tekens zijn';
  } elseif (is_numeric($_POST['statiegeld'])) {
    $foutmeldingen = 'statiegeld mag alleen getallen bevatten';
  }

  if (!isset($_POST['brouwerij_id'])) {
    $foutmeldingen['brouwerij_id'] = "Maak een keuze.";
  }

  if (!isset($_POST['soort_id'])) {
    $foutmeldingen['soort_id'] = "Maak een keuze.";
  }

  if (!isset($_POST['kleur_id'])) {
    $foutmeldingen['kleur_id'] = "Maak een keuze.";
  }

  if (empty($foutmeldingen)) {
    $query = $pdo->prepare("INSERT INTO `bieren` (`naam`, `alchoholpercentage`, `inhoud`, `prijs`, `statiegeld`, `brouwerij_id`, `soort_id`, `kleur_id`) VALUES (:naam, :alcohol, :inhoud, :prijs, :statiegeld, :brouwerij_id, :soort_id, :kleur_id)");
    $query->execute([
      'naam' => $_POST['naam'],
      'alchohol' => $_POST['alchohol'],
      'inhoud' => $_POST['inhoud'],
      'prijs' => $_POST['prijs'],
      'statiegeld' => $_POST['statiegeld'],
      'brouwerij_id' => $_POST['brouwerij_id'],
      'soort_id' => $_POST['soort_id'],
      'kleur_id' => $_POST['kleur_id']
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
  <title>Bier toevoegen</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main>
    <section class="text-center">
      <pre><?php print_r($_POST) ?></pre>
      <h2>Bier toevoegen</h2>

      <form class="form-signin" method="POST" novalidate>
        <label for="naam" class="sr-only"></label>
        <input type="text" id="naam" name="naam" class="form-control" placeholder="naam"
          value="<?php echo $_POST['naam'] ?? '' ?>" autofocus>
        <?php if (isset($foutmeldingen['naam'])) : ?>
        <span class="error"><?php echo $foutmeldingen['naam'] ?></span>
        <?php endif ?>

        <label for="alchohol" class="sr-only"></label>
        <input type="text" id="alchohol" name="alchohol" class="form-control" placeholder="alchoholpercentage"
          value="<?php echo $_POST['alchohol'] ?? '' ?>">
        <?php if (isset($foutmeldingen['alchohol'])) : ?>
        <span class="error"><?php echo $foutmeldingen['alchohol'] ?></span>
        <?php endif ?>

        <label for="inhoud" class="sr-only"></label>
        <input type="text" id="inhoud" name="inhoud" class="form-control" placeholder="inhoud"
          value="<?php echo $_POST['inhoud'] ?? '' ?>">
        <?php if (isset($foutmeldingen['inhoud'])) : ?>
        <span class="error"><?php echo $foutmeldingen['inhoud'] ?></span>
        <?php endif ?>

        <label for="prijs" class="sr-only"></label>
        <input type="text" id="prijs" name="prijs" class="form-control" placeholder="prijs"
          value="<?php echo $_POST['prijs'] ?? '' ?>">
        <?php if (isset($foutmeldingen['prijs'])) : ?>
        <span class="error"><?php echo $foutmeldingen['prijs'] ?></span>
        <?php endif ?>

        <label for="statiegeld" class="sr-only"></label>
        <input type="text" id="statiegeld" name="statiegeld" class="form-control" placeholder="statiegeld"
          value="<?php echo $_POST['statiegeld'] ?? '' ?>">
        <?php if (isset($foutmeldingen['statiegeld'])) : ?>
        <span class="error"><?php echo $foutmeldingen['statiegeld'] ?></span>
        <?php endif ?>

        <label for="brouwerij"></label>
        <select class="form-control" name="brouwerij_id" id="brouwerij">
          <option <?php if (!isset($_POST['brouwerij_id'])) {
                    echo 'selected';
                  } ?> disabled>-- Kies een brouwerij</option>
          <?php foreach ($brouwerijen as $brouwerij) : ?>
          <option <?php if (isset($_POST['brouwerij_id']) && $_POST['brouwerij_id'] == $brouwerij['id']) {
                      echo 'selected';
                    } ?> value="<?php echo $brouwerij['id'] ?>"><?php echo $brouwerij['naam'] ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (isset($foutmeldingen['brouwerij_id'])) : ?>
        <span class="error"><?php echo $foutmeldingen['brouwerij_id'] ?></span>
        <?php endif ?>

        <label for="soort"></label>
        <select class="form-control" name="soort_id" id="soort">
          <option <?php if (!isset($_POST['soort_id'])) {
                    echo 'selected';
                  } ?> disabled>-- Kies een soort</option>
          <?php foreach ($soorten as $soort) : ?>
          <option <?php if (isset($_POST['soort_id']) && $_POST['soort_id'] == $soort['id']) {
                      echo 'selected';
                    } ?> value="<?php echo $soort['id'] ?>"><?php echo $soort['naam'] ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (isset($foutmeldingen['soort_id'])) : ?>
        <span class="error"><?php echo $foutmeldingen['soort_id'] ?></span>
        <?php endif ?>

        <label for="kleur"></label>
        <select class="form-control" name="kleur_id" id="kleur">
          <option <?php if (!isset($_POST['kleur_id'])) {
                    echo 'selected';
                  } ?> disabled>-- Kies een kleur</option>
          <?php foreach ($kleuren as $kleur) : ?>
          <option <?php if (isset($_POST['kleur_id']) && $_POST['kleur_id'] == $kleur['id']) {
                      echo 'selected';
                    } ?> value="<?php echo $kleur['id'] ?>"><?php echo $kleur['kleur'] ?></option>
          <?php endforeach; ?>
        </select>
        <?php if (isset($foutmeldingen['kleur_id'])) : ?>
        <span class="error"><?php echo $foutmeldingen['kleur_id'] ?></span>
        <?php endif ?>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Toevoegen</button>
        <p class="mt-5 mb-3 text-muted">&copy; 2021-2022</p>
      </form>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>