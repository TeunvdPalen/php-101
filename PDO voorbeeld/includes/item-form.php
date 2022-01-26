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
	<label for="categorie">Categorie</label>
	<input type="radio" name="categorie" id="categorie" value="id">
</div>