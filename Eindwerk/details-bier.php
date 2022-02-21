<?php

include './includes/initialize.php';

$query = $pdo->prepare('SELECT * FROM bieren WHERE id=:id');
$query->execute([
  'id' => $_GET['id']
]);
$bier = $query->fetch();

if (!$bier) {
  header('location: index.php?error=Bier bestaat niet!');
}

$query = $pdo->prepare('SELECT * FROM brouwerijen WHERE id=:id');
$query->execute([
  'id' => $bier['brouwerij_id']
]);
$brouwerij = $query->fetch();

$query = $pdo->prepare('SELECT * FROM kleuren WHERE id=:id');
$query->execute([
  'id' => $bier['kleur_id']
]);
$kleur = $query->fetch();

$query = $pdo->prepare('SELECT * FROM soorten WHERE id=:id');
$query->execute([
  'id' => $bier['soort_id']
]);
$soort = $query->fetch();

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title><?php echo $bier['naam'] ?> details</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main>
    <div class="container">
      <h1><?php echo $bier['naam'] ?></h1>
      <p>Dit is een bier van <a
          href="details-brouwerij.php?id=<?php echo $bier['id'] ?>"><?php echo $brouwerij['naam'] ?></a>, deze
        <a href="details-soort.php?id=<?php echo $bier['id'] ?>"><?php echo $soort['naam'] ?></a> is
        <?php echo $soort['omschrijving'] ?> hierdoor is het alchoholpercentage
        <?php echo $bier['alchoholpercentage'] ?>%.
      </p>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>