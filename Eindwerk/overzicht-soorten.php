<?php

include './includes/initialize.php';

$query = $pdo->prepare('SELECT * FROM bieren WHERE id=:id');
$query->execute([
  'id' => $_GET['id']
]);
$bier = $query->fetch();

if (!$bier) {
  header('location: index.php?error=Soort bier bestaat niet!');
}

$query = $pdo->prepare('SELECT * FROM soorten WHERE id=:id');
$query->execute([
  'id' => $bier['soort_id']
]);
$soort = $query->fetch();

$query = $pdo->prepare('SELECT * FROM bieren WHERE soort_id=:id');
$query->execute([
  'id' => $bier['soort_id']
]);
$bieren = $query->fetchAll();


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title><?php echo $soort['naam'] ?> overzicht</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main>
    <div class="container">
      <h1><?php echo $soort['naam'] ?><a class="details" href="details-soort.php?id=<?php echo $bier['id'] ?>">
          details</a></h1>
      <?php include './includes/table.php' ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>