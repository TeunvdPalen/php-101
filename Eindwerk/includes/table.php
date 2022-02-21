<table class="table table-striped table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Naam</th>
      <th scope="col">Soort</th>
      <th scope="col">Kleur</th>
      <th scope="col">Brouwerij</th>
      <th scope="col">alchohol</th>
      <th scope="col">Prijs/fles</th>
      <th scope="col">Statiegeld</th>
      <th scope="col">Inhoud</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($bieren as $bier) : ?>

    <?php
      $query = $pdo->query("SELECT * FROM brouwerijen WHERE id=$bier[brouwerij_id]");
      $brouwerij = $query->fetch();

      $query = $pdo->query("SELECT * FROM kleuren WHERE id=$bier[kleur_id]");
      $kleur = $query->fetch();

      $query = $pdo->query("SELECT * FROM soorten WHERE id=$bier[soort_id]");
      $soort = $query->fetch();
      ?>
    <tr>
      <td><a href="details-bier.php?id=<?php echo $bier['id'] ?>"><?php echo $bier['naam'] ?></a></td>
      <td><a href="overzicht-soorten.php?id=<?php echo $bier['id'] ?>"><?php echo $soort['naam'] ?></a></td>
      <td><?php echo $kleur['kleur'] ?></td>
      <td><a href="details-brouwerij.php?id=<?php echo $bier['id'] ?>"><?php echo $brouwerij['naam'] ?></a></td>
      <td><?php echo $bier['alchoholpercentage'] ?>%</td>
      <td><?php echo $bier['prijs'] ?>€</td>
      <td><?php echo $bier['statiegeld'] ?>€</td>
      <td><?php echo $bier['inhoud'] ?>cl</td>
    </tr>
    <?php endforeach ?>
  </tbody>