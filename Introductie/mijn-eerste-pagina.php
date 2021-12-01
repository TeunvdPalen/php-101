<?php

// String
$titel = "mijn eerste pagina";
$content = "Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio nobis sed eos, dolor suscipit similique quae saepe recusandae repellendus velit non unde vero praesentium incidunt nisi fuga. Error, recusandae optio!";

// Bolean
$ingelogd = true;

// Array
$reviews = [3, 5, 7, 8, 4.5, 9, 7.5, 6, 10, 4, 5];

// Integer
$aantal_reviews = count($reviews);

// Float
$score = array_sum($reviews) / $aantal_reviews;

if ($ingelogd == true) {
    $naam = "Teun";
} else {
    $naam = "Gast";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mijn-eerste-pagina.css">
    <title>Mijn eerste pagina</title>
</head>

<body>

    <div class="begroeting">
        <div class="container">
            <p class="begroeting-tekst">Hallo, <?php echo $naam ?></p>


            <div class="user-menu">
                <?php if ($ingelogd == false) : ?>
                    <a href="#">Aanmelden</a>
                    <a href="#">Registreren</a>
                <?php else : ?>
                    <a href="#">Beheer</a>
                    <a href="#">Afmelden</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="container content">
        <?php if ($ingelogd == true) : ?>
            <div class="beheer">
                <a href="#" class="button">Aanpassen</a>
                <a href="#" class="button">Verwijderen</a>
            </div>
        <?php endif; ?>

        <header>
            <h1><?php echo ucfirst($titel) ?></h1>
            <p class="score"> Score: <span><?php echo round($score, 1, PHP_ROUND_HALF_EVEN) ?></span> (op basis van <?php echo $aantal_reviews ?> reviews)</p>
        </header>

        <p><?php echo $content ?></p>

        <div class="scores">
            <p>
                Scores:
                <?php foreach ($reviews as $reviewscore) : ?>
                    <span><?php echo $reviewscore ?></span>
                <?php endforeach ?>
            </p>
        </div>

        <footer>
            Copyright - <span class="copyright-date"><?php echo date("Y") ?></span>
        </footer>
    </div>

</body>

</html>