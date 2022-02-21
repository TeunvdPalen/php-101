<?php

include './includes/initialize.php';

if (!isset($_GET['brouwerij_id'])) {
  $query = $pdo->prepare('SELECT * FROM bieren WHERE id=:id');
  $query->execute([
    'id' => $_GET['id']
  ]);
  $bier = $query->fetch();

  if (!$bier) {
    header('location: index.php?error=Brouwerij bestaat niet!');
  }

  $query = $pdo->prepare('SELECT * FROM brouwerijen WHERE id=:id');
  $query->execute([
    'id' => $bier['brouwerij_id']
  ]);
  $brouwerij = $query->fetch();

  $query = $pdo->prepare('SELECT * FROM bieren WHERE brouwerij_id=:id');
  $query->execute([
    'id' => $bier['brouwerij_id']
  ]);
  $bieren = $query->fetchAll();
} else {
  $query = $pdo->prepare('SELECT * FROM brouwerijen WHERE id=:id');
  $query->execute([
    'id' => $_GET['brouwerij_id']
  ]);
  $brouwerij = $query->fetch();

  $query = $pdo->prepare('SELECT * FROM bieren WHERE brouwerij_id=:id');
  $query->execute([
    'id' => $brouwerij['id']
  ]);
  $bieren = $query->fetchAll();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title><?php echo $brouwerij['naam'] ?> Overzicht</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main>
    <div class="container">
      <h1><?php echo $brouwerij['naam'] ?></h1>
      <?php include './includes/table.php' ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>