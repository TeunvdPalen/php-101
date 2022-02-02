<div>
	<label>
		Omschrijving <input type="text" name="omschrijving" id="omschrijving">
	</label>
	<?php if (isset($foutmeldingen['omschrijving'])): ?>
	<span><?php echo $foutmeldingen['omschrijving'] ?></span>
	<?php endif; ?>
</div>
<div>
	<label for="priotieit">Prioriteit</label>
	<select name="prioriteit" id="prioriteit">
		<?php for($i=0; $i<5; $i++): ?>
		<option <?php if (isset($_POST['prioriteit']) && $_POST['prioriteit'] == $i) {echo 'selected'; } ?>
			value="<?php echo $i ?>"><?php echo $i ?>
		</option>
		<?php endfor; ?>
	</select>
</div>
<div>
	<?php foreach ($categories as $categorie) : ?>
	<label>
		<?php echo $categorie['naam'] ?><input
			<?php if (isset($_POST['categorie']) && $_POST['categorie'] == $categorie['id']) { echo "checked"; } ?>
			type="radio" id="<?php echo $categorie['naam'] ?>" name="categorie" value="<?php echo $categorie['id'] ?>">
	</label>
	<?php endforeach ?>
</div>