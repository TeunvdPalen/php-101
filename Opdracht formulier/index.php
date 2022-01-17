<?php

// gegevens pizza
$grootte = [
	'klein' => [
		'naam' => 'Klein',
		'foto' => 'images/blank.jpg',
		'prijs' => '4'
	],
	'medium' => [
		'naam' => 'Medium',
		'foto' => 'images/blank.jpg',
		'prijs' => '6'
	],
	'groot' => [
		'naam' => 'Groot',
		'foto' => 'images/blank.jpg',
		'prijs' => '8'
	],
	'extragroot' => [
		'naam' => 'Extra groot',
		'foto' => 'images/blank.jpg',
		'prijs' => '10'
	]
];

$saus = [
	'tomaat' => [
		'naam' =>	'Tomatensaus',
		'prijs' => '1'
	],
	'bbq' => [
		'naam' => 'BBQ-saus',
		'prijs' => '2'
	],
	'creme' => [
		'naam' => 'Creme fraiche',
		'prijs' => '2'
	],
];

$kaas = [
	'mozzarella' => [
		'naam' => 'Mozzarella',
		'prijs' => '1',
		'foto' => 'images/mozzarella.jpg'
	],
	'emmentaler' => [
		'naam' => 'Emmentaler',
		'prijs' => '1',
		'foto' => 'images/emmentaler.jpg'
	],
	'gouda' => [
		'naam' => 'Gouda',
		'prijs' => '2',
		'foto' => 'images/gouda.jpg'
	],
	'gorgonzola' => [
		'naam' => 'Gorgonzola',
		'prijs' => '3',
		'foto' => 'images/gorgonzola.jpg'
	]
];

$vlees = [
	'pepperoni' => [
		'naam' => 'Pepperoni',
		'prijs' => '2',
		'foto' => 'images/pepperonitopping.jpg'
	],
	'ham' => [
		'naam' => 'Ham',
		'prijs' => '1',
		'foto' => 'images/ham.jpg'
	],
	'garnalen' => [
		'naam' => 'Garnalen',
		'prijs' => '3',
		'foto' => 'images/garnalen.jpg'
	],
	'kip' => [
		'naam' => 'Kip',
		'prijs' => '2',
		'foto' => 'images/kip.jpg'
	]
];

$groenten = [
	'ui' => [
		'naam' => 'Ui',
		'prijs' => '1',
		'foto' => 'images/ui.jpg'
	],
	'tomaat' => [
		'naam' => 'Verse tomaat',
		'prijs' => '1',
		'foto' => 'images/tomaat.jpg'
	],
	'olijf' => [
		'naam' => 'Olijven',
		'prijs' => '2',
		'foto' => 'images/olijf.jpg'
	],
	'paprika' => [
		'naam' => 'Paprika',
		'prijs' => '1',
		'foto' => 'images/paprika.jpg'
	],
	'jalapeno' => [
		'naam' => 'Jalapeno',
		'prijs' => '2',
		'foto' => 'images/jalapeno.jpg'
	],
	'lente_ui' => [
		'naam' => 'Lente ui',
		'prijs' => '1',
		'foto' => 'images/lente_ui.jpg'
	],
	'champignons' => [
		'naam' => 'Champignons',
		'prijs' => '1',
		'foto' => 'images/champignon.jpg'
	],
	'spinazie' => [
		'naam' => 'Spinazie',
		'prijs' => '2',
		'foto' => 'images/spinazie.jpg'
	],
];

// einde pizza gegevens

$foutmeldingen = [];

// Validatie
if ($_POST) {
	// Pizza validatie
	// Formaat
	if (!isset($_POST['keuze_formaat'])) {
		$foutmeldingen['keuze_formaat'] = 'Kies wat voor formaat van pizza je wilt';
	}
	// Saus
	if (!isset($_POST['keuze_saus'])) {
		$foutmeldingen['keuze_saus'] = 'Kies wat voor saus je op pizza je wilt';
	}
	// Kaas
	if (!isset($_POST['keuze_kaas'])) {
		$foutmeldingen['keuze_kaas'] = 'Kies wat voor kaas je op pizza je wilt';
	}
	// Vlees
	if (!isset($_POST['keuze_vlees'])) {
		$foutmeldingen['keuze_vlees'] = 'Kies wat voor vlees je op pizza je wilt';
	}
	// Groenten
	if (!isset($_POST['keuze_groenten'])) {
		$foutmeldingen['keuze_groenten'] = 'Kies wat voor groenten je op pizza je wilt';
	}

	// Formulier validatie
	// Naam validatie
	if (!$_POST['voornaam']) {
		$foutmeldingen['voornaam'] = "Je moet je voornaam invullen";
	} elseif (strlen($_POST['voornaam']) < 2) {
		$foutmeldingen['voornaam'] = 'Je voornaam moet minstens 2 karakters bevatten';
	}

	if (!$_POST['familienaam']) {
		$foutmeldingen['familienaam'] = "Je moet je familienaam invullen";
	} elseif (strlen($_POST['familienaam']) < 2) {
		$foutmeldingen['familienaam'] = 'Je familienaam moet minstens 2 karakters bevatten';
	}

	// Adres validatie
	if (!$_POST['straat']) {
		$foutmeldingen['straat'] = 'Je moet een straatnaam invullen';
	}

	if (!$_POST['gemeente']) {
		$foutmeldingen['gemeente'] = 'Je moet een gemeente invullen';
	}

	if (!$_POST['postcode']) {
		$foutmeldingen['postcode'] = 'Je moet een postcode invullen';
	} elseif (!is_numeric($_POST['postcode'])) {
		$foutmeldingen['postcode'] = 'De postcode mag alleen nummers bevatten';
	} elseif (strlen($_POST['postcode']) != 4) {
		$foutmeldingen['postcode'] = 'De postcode moet 4 cijfers bevatten';
	}

	// E-mail validatie
	if (!$_POST['email']) {
		$foutmeldingen['email'] = "Je moet je E-mail invullen";
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$foutmeldingen['email'] = "Vul een geldig E-mail in";
	}

	// telefoon validatie
	if (!$_POST['telefoon']) {
		$foutmeldingen['telefoon'] = 'Je moet je telefoon nummer invullen';
	} elseif (!is_numeric($_POST['telefoon'])) {
		$foutmeldingen['telefoon'] = 'Je telefoon nummer mag alleen nummers bevatten';
	} elseif (strlen($_POST['telefoon']) > 13) {
		$foutmeldingen['telefoon'] = 'De telefoon nummer is te lang';
	}

	// Bezorgng validatie
	if (!$_POST['bezorgtijd']) {
		$foutmeldingen['bezorgtijd'] = 'Je moet een bezorgtijd invullen';
	} 

	// Privacy validatie
	if (!$_POST['privacy']) {
		$foutmeldingen['privacy'] = 'Je moet akkoord gaan met het privacybeleid';
	} 
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/style.css">
	<title>Pizza</title>
</head>

<body>
	<header class="cf">
		<div class="container">
			<div class="logo">
				<img id="pizzalogo" src="images/pizzalogo.svg" alt="logo">
			</div>
			<div class="title">
				<h1 id="hoofd">Pizza House</h1>
			</div>
		</div>
	</header>

	<?php if ($foutmeldingen == false && $_POST) : ?>
	<div class="container">
		<h1>Betalen</h1>
		<ul>
			<?php if($_POST['keuze_formaat']): ?>
			<li><?php echo $_POST['keuze_formaat'] ?></li>
			<?php endif ?>
		</ul>
	</div>
	<?php else : ?>
	<form novalidate method="post">
		<div class="container">
			<pre><?php print_r($_POST) ?></pre>
			<fieldset>
				<legend>
					<h1>Kies een pizza formaat</h1>
				</legend>
				<div class="inner">
					<?php foreach ($grootte as $key => $value) : ?>
					<div class="colum4">
						<img src="<?php echo $value['foto'] ?>" alt="<?php echo $value['naam'] ?> pizza">
						<label>
							<?php echo $value['naam'] ?> <?php echo $value['prijs'] ?>€ <input
								<?php if (isset($_POST['keuze_formaat']) && $_POST['keuze_formaat'] == $value['naam']) { echo "checked"; } ?>
								type="radio" id="keuze_<?php echo $key ?>" name="keuze_formaat" value="<?php echo $value['naam'] ?>">
						</label>
					</div>
					<?php endforeach ?>
					<?php if (isset($foutmeldingen['keuze_formaat'])) : ?>
					<span class="error"><?php echo $foutmeldingen['keuze_formaat'] ?></span>
					<?php endif ?>

				</div>
			</fieldset>

			<fieldset>
				<legend>
					<h2>Be the chef</h2>
				</legend>
				<div class="inner">
					<h3>Saus</h3>
					<?php foreach ($saus as $key => $value) : ?>
					<label>
						<?php echo $value['naam'] ?> <?php echo $value['prijs'] ?>€ <input
							<?php if (isset($_POST['keuze_saus']) && $_POST['keuze_saus'] == $value['naam']) { echo "checked"; } ?>
							type="radio" id="keuze_<?php echo $key ?>" value="<?php echo $value['naam'] ?>" name="keuze_saus">
					</label>
					<?php endforeach ?>
					<?php if (isset($foutmeldingen['keuze_saus'])) : ?>
					<span class="error"><?php echo $foutmeldingen['keuze_saus'] ?></span>
					<?php endif ?>

					<h3>Kaas</h3>
					<?php foreach ($kaas as $key => $value) : ?>
					<div class="colum4">
						<img src="<?php echo $value['foto'] ?>" alt="<?php echo $value['naam'] ?>">
						<label>
							<?php echo $value['naam'] ?> <?php echo $value['prijs'] ?>€ <input
								<?php if (isset($_POST['keuze_kaas']) && in_array($value['naam'], $_POST['keuze_kaas']) == $value['naam']) { echo "checked"; } ?>
								type="checkbox" id="keuze_<?php echo $key ?>" value="<?php echo $value['naam'] ?>" name="keuze_kaas[]">
						</label>
					</div>
					<?php endforeach ?>
					<?php if (isset($foutmeldingen['keuze_kaas'])) : ?>
					<span class="error"><?php echo $foutmeldingen['keuze_kaas'] ?></span>
					<?php endif ?>

					<h3>Vlees</h3>
					<?php foreach ($vlees as $key => $value) : ?>
					<div class="colum4">
						<img src="<?php echo $value['foto'] ?>" alt="<?php echo $value['naam'] ?>">
						<label>
							<?php echo $value['naam'] ?> <?php echo $value['prijs'] ?>€ <input
								<?php if (isset($_POST['keuze_vlees']) && in_array($value['naam'], $_POST['keuze_vlees']) == $value['naam']) { echo "checked"; } ?>
								type="checkbox" id="keuze_<?php echo $key ?>" value="<?php echo $value['naam'] ?>" name="keuze_vlees[]">
						</label>
					</div>
					<?php endforeach ?>
					<?php if (isset($foutmeldingen['keuze_vlees'])) : ?>
					<span class="error"><?php echo $foutmeldingen['keuze_vlees'] ?></span>
					<?php endif ?>

					<h3>Groenten</h3>
					<?php foreach ($groenten as $key => $value) : ?>
					<div class="colum4">
						<img src="<?php echo $value['foto'] ?>" alt="">
						<label>
							<?php echo $value['naam'] ?> <?php echo $value['prijs'] ?>€ <input
								<?php if (isset($_POST['keuze_groenten']) && in_array($value['naam'], $_POST['keuze_groenten']) == $value['naam']) { echo "checked"; } ?>
								type="checkbox" id="keuze_<?php echo $key ?>" value="<?php echo $value['naam'] ?>"
								name="keuze_groenten[]">
						</label>
					</div>
					<?php endforeach ?>
					<?php if (isset($foutmeldingen['keuze_groenten'])) : ?>
					<span class="error"><?php echo $foutmeldingen['keuze_groenten'] ?></span>
					<?php endif ?>

				</div>
			</fieldset>

			<fieldset>
				<legend>
					<h2>Gegevens</h2>
				</legend>
				<div class="inner">
					<div class="flex">
						<h3>Adres</h3>

						<!-- Naam en voornaam -->
						<label for="voornaam">Vooraam: *</label>
						<input name="voornaam" value="<?php echo $_POST['voornaam'] ?? '' ?>" id="voornaam" type="text"
							class="invulveld" placeholder="Voornaam">
						<?php if (isset($foutmeldingen['voornaam'])) : ?>
						<span class="error"><?php echo $foutmeldingen['voornaam'] ?></span>
						<?php endif ?>

						<label for="familienaam">Familenaam: *</label>
						<input name="familienaam" value="<?php echo $_POST['familienaam'] ?? '' ?>" id="familienaam" type="text"
							class="invulveld" placeholder="Familienaam">
						<?php if (isset($foutmeldingen['familienaam'])) : ?>
						<span class="error"><?php echo $foutmeldingen['familienaam'] ?></span>
						<?php endif ?><br>

						<!-- Adres -->
						<label for="straat">Straat: *</label>
						<input name="straat" value="<?php echo $_POST['straat'] ?? '' ?>" id="straat" type="text" class="invulveld"
							placeholder="Straat">
						<?php if (isset($foutmeldingen['straat'])) : ?>
						<span class="error"><?php echo $foutmeldingen['straat'] ?></span>
						<?php endif ?>

						<label for="gemeente">Gemeente: *</label>
						<input name="gemeente" value="<?php echo $_POST['gemeente'] ?? '' ?>" id="gemeente" type="text"
							class="invulveld" placeholder="Gemeente">
						<?php if (isset($foutmeldingen['gemeente'])) : ?>
						<span class="error"><?php echo $foutmeldingen['gemeente'] ?></span>
						<?php endif ?>

						<label for="postcode">Postcode: *</label>
						<input name="postcode" value="<?php echo $_POST['postcode'] ?? '' ?>" id="postcode" type="text"
							class="invulveld" placeholder="Postcode">
						<?php if (isset($foutmeldingen['postcode'])) : ?>
						<span class="error"><?php echo $foutmeldingen['postcode'] ?></span>
						<?php endif ?>


						<!-- Tel/Email -->
						<label for="email">E-mailadres: *</label>
						<input name="email" value="<?php echo $_POST['email'] ?? '' ?>" id="email" type="email" class="invulveld"
							placeholder="E-mailadres">
						<?php if (isset($foutmeldingen['email'])) : ?>
						<span class="error"><?php echo $foutmeldingen['email'] ?></span>
						<?php endif ?>

						<label for="telefoon">Telefoon: *</label>
						<input name="telefoon" value="<?php echo $_POST['telefoon'] ?? '' ?>" id="telefoon" type="text"
							class="invulveld" placeholder="Telefoon">
						<?php if (isset($foutmeldingen['telefoon'])) : ?>
						<span class="error"><?php echo $foutmeldingen['telefoon'] ?></span>
						<?php endif ?>

						<h3>Bezorgtijd</h3>
						<label>
							Tijd: <select id="bezorgtijd" name="bezorgtijd">
								<option <?php if(!isset($_POST['bezorgtijd'])) { echo 'selected';} ?> disabled>-- Keuze tijdstip --
								</option>
								<option <?php if(isset($_POST['bezorgtijd']) && $_POST['bezorgtijd'] == '15:00') { echo 'selected';} ?>
									value="15:00">15:00 </option>
								<option <?php if(isset($_POST['bezorgtijd']) && $_POST['bezorgtijd'] == '16:00') { echo 'selected';} ?>
									value="16:00">16:00 </option>
								<option <?php if(isset($_POST['bezorgtijd']) && $_POST['bezorgtijd'] == '17:00') { echo 'selected';} ?>
									value="17:00">17:00 </option>
								<option <?php if(isset($_POST['bezorgtijd']) && $_POST['bezorgtijd'] == '18:00') { echo 'selected';} ?>
									value="18:00">18:00 </option>
								<option <?php if(isset($_POST['bezorgtijd']) && $_POST['bezorgtijd'] == '19:00') { echo 'selected';} ?>
									value="19:00">19:00 </option>
								<option <?php if(isset($_POST['bezorgtijd']) && $_POST['bezorgtijd'] == '20:00') { echo 'selected';} ?>
									value="20:00">20:00 </option>
							</select>
						</label>
						<?php if (isset($foutmeldingen['bezorgtijd'])) : ?>
						<span class="error"><?php echo $foutmeldingen['bezorgtijd'] ?></span>
						<?php endif ?>
						<br>

						<label>
							<input type="checkbox" name="nieuwsbrief"> Ik wil graag de nieuwsbrief ontvangen.
						</label><br>

						<label>
							<input <?php if (isset($_POST['privacy'])) { echo "checked"; } ?> type="checkbox" id="privacy"
								name="privacy"> Ik ga akkoord met het privacybeleid
						</label>
						<?php if (isset($foutmeldingen['privacy'])) : ?>
						<span class="error"><?php echo $foutmeldingen['privacy'] ?></span>
						<?php endif ?>
						<br>

						<button type="submit">
							Bevestigen
						</button>
					</div>
				</div>
			</fieldset>
		</div>

	</form>
	<?php endif; ?>

</body>

</html>