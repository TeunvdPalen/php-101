<?php

$foutmeldingen = [];

if ($_POST) {

	// Naam validatie
	if (!$_POST['naam']) {
		$foutmeldingen['naam'] = "Je moet je naam invullen";
	}

	// E-mail validatie
	if (!$_POST['email']) {
		$foutmeldingen['email'] = "Je moet je E-mail invullen";
	} elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$foutmeldingen['email'] = "Vul een geldig E-mail in";
	}

	// Geslacht validatie
	if (!isset($_POST['geslacht'])) {
		$foutmeldingen['geslacht'] = "Je moet je geslacht selecteren";
	}

	// Kennis validatie
	if (empty($_POST['kennis'])) {
		$foutmeldingen['kennis'] = "Je moet je kennis selecteren";
	}

	// Wachtwoord validatie
	if (!$_POST['wachtwoord']) {
		$foutmeldingen['wachtwoord'] = "Je moet je wachtwoord invullen";
	} elseif (!$_POST['wachtwoord_confirmatie']) {
		$foutmeldingen['wachtwoord_confirmatie'] = "Je moet je wachtwoord invullen";
	} elseif ($_POST['wachtwoord'] != $_POST['wachtwoord_confirmatie']) {
		$foutmeldingen['wachtwoord_confirmatie'] = "Je opgegeven wachtwoorden komen niet overeen";
		$foutmeldingen['wachtwoord'] = "Je opgegeven wachtwoorden komen niet overeen";
	}

	// Privacy check
	if (!isset($_POST['privacybeleid'])) {
		$foutmeldingen['privacybeleid'] = "Accepteer het privacybeleid";
	}
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <nav class="main-nav">
        <div class="container">
            <a href="#">Home</a>
            <a href="contact.php">Contacteer ons</a>
            <a href="aanmelden.php">Aanmelden</a>
            <a href="registreren.php">Registreren</a>
        </div>
    </nav>

    <div class="container">

        <pre><?php print_r($_POST) ?></pre>

        <h1>Registreren</h1>

        <?php if ($_POST && !$foutmeldingen) : ?>
        <p>Je registratie is gelukt</p>
        <?php else : ?>
        <form novalidate method="post">

            <div>
                <label for="naam">Naam: *</label>
                <input name="naam" value="<?php echo $_POST['naam'] ?? '' ?>" id="naam" type="text" placeholder="Naam">
                <?php if (isset($foutmeldingen['naam'])) : ?>
                <span class="error"><?php echo $foutmeldingen['naam'] ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="email">E-mailadres: *</label>
                <input name="email" value="<?php echo $_POST['email'] ?? '' ?>" id="email" type="email"
                    placeholder="E-mailadres">
                <?php if (isset($foutmeldingen['email'])) : ?>
                <span class="error"><?php echo $foutmeldingen['email'] ?></span>
                <?php endif ?>
            </div>

            <div>
                Geslacht: *
                <label for="geslacht_man">
                    <input <?php if (isset($_POST['geslacht']) && $_POST['geslacht'] == "m") {
											echo "checked";
										} ?> name="geslacht" value="m" id="geslacht_man" type="radio">
                    Man
                </label>
                <label for="geslacht_vrouw">
                    <input <?php if (isset($_POST['geslacht']) && $_POST['geslacht'] == "v") {
											echo "checked";
										} ?> name="geslacht" value="v" id="geslacht_vrouw" type="radio">
                    Vrouw
                </label>
                <?php if (isset($foutmeldingen['geslacht'])) : ?>
                <span class="error"><?php echo $foutmeldingen['geslacht'] ?></span>
                <?php endif ?>
            </div>

            <div>
                Kennis:
                <div>
                    <label for="kennis_html">
                        <input <?php if (isset($_POST['kennis']) && in_array('html', $_POST['kennis'])) {
												echo "checked";
											} ?> name="kennis[]" value="html" id="kennis_html" type="checkbox">
                        HTML
                    </label>
                </div>
                <div>
                    <label for="kennis_css">
                        <input <?php if (isset($_POST['kennis']) && in_array('css', $_POST['kennis'])) {
												echo "checked";
											} ?> name="kennis[]" value="css" id="kennis_css" type="checkbox">
                        CSS
                    </label>
                </div>
                <div>
                    <label for="kennis_php">
                        <input <?php if (isset($_POST['kennis']) && in_array('php', $_POST['kennis'])) {
												echo "checked";
											} ?> name="kennis[]" value="php" id="kennis_php" type="checkbox">
                        PHP
                    </label>
                </div>
                <div>
                    <label for="kennis_javascript">
                        <input <?php if (isset($_POST['kennis']) && in_array('js', $_POST['kennis'])) {
												echo "checked";
											} ?> name="kennis[]" value="js" id="kennis_javascript" type="checkbox">
                        Javascript
                    </label>
                </div>
                <?php if (isset($foutmeldingen['kennis'])) : ?>
                <span class="error"><?php echo $foutmeldingen['kennis'] ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="wachtwoord">Wachtwoord: *</label>
                <input name="wachtwoord" value="<?php echo $_POST['wachtwoord'] ?? '' ?>" id="wachtwoord"
                    type="password" placeholder="Wachtwoord">
                <?php if (isset($foutmeldingen['wachtwoord'])) : ?>
                <span class="error"><?php echo $foutmeldingen['wachtwoord'] ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="wachtwoord_confirmatie">Geef je wachtwoord nogmaals in: *</label>
                <input name="wachtwoord_confirmatie" value="<?php echo $_POST['wachtwoord_confirmatie'] ?? '' ?>"
                    id="wachtwoord_confirmatie" type="password" placeholder="Wachtwoord confirmatie">
                <?php if (isset($foutmeldingen['wachtwoord_confirmatie'])) : ?>
                <span class="error"><?php echo $foutmeldingen['wachtwoord_confirmatie'] ?></span>
                <?php endif ?>
            </div>

            <div>
                <label for="privacy">
                    <input <?php if (isset($_POST['privacybeleid'])) {
											echo "checked";
										} ?> name="privacybeleid" type="checkbox" id="privacy">
                    Ik ga akkoord met het privacybeleid
                </label>
                <?php if (isset($foutmeldingen['privacybeleid'])) : ?>
                <span class="error"><?php echo $foutmeldingen['privacybeleid'] ?></span>
                <?php endif ?>
            </div>

            <div>
                <button type="submit">
                    Verzenden
                </button>
            </div>

        </form>
        <?php endif ?>
    </div>

</body>

</html>