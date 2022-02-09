<li>
	<span class="priotiteit-<?php echo $item['prioriteit'] ?>"></span>
	<span><?php echo $item['omschrijving'] ?></span>
	-
	<a href="item-details.php?id=<?php echo $item['id'] ?>">Details</a>
	<a href="item-aanpassen.php?id=<?php echo $item['id'] ?>">Aanpassen</a>
	<a href="item-verwijderen.php?id=<?php echo $item['id'] ?>">verwijderen</a>
</li>