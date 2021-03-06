<?php

include './includes/initialize.php';

$query = $pdo->query('SELECT * FROM bieren;');
$bieren = $query->fetchAll();

if ($_GET) {
	$error = $_GET['error'];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include './includes/meta.php' ?>
  <title>Bierhandelaar</title>
</head>

<body>
  <?php include './includes/header.php' ?>

  <main>
    <div class="container">
      <h1>Bieren</h1>

      <?php if (isset($error)) : ?>
      <h1 class="error"><?php echo $error ?></h1>
      <?php endif ?>

      <div class="bier">
        <?php include './includes/table.php' ?>
      </div>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
  </script>
</body>

</html>