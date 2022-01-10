<?php 
// gegevens pizza

$grootte = ['klein' => 'Klein', 'medium' => 'Medium', 'groot' => 'Groot', 'extragroot' => 'Extra groot'];
$saus = ['tomaat' => 'Tomatensaus', 'bbq' => 'BBQ-saus', 'creme' => 'Creme fraiche'];
$kaas = [
    'mozzarella' => [
        'naam' => 'Mozzarella',
        'foto' => 'images/mozzarella.jpg'
    ],
    'emmentaler' => [
        'naam' => 'Emmentaler',
        'foto' => 'images/emmentaler.jpg'
    ],
    'gouda' => [
        'naam' => 'Gouda',
        'foto' => 'images/gouda.jpg'
    ],
    'gorgonzola' => [
        'naam' => 'Gorgonzola',
        'foto' => 'images/gorgonzola.jpg'
    ]
];
$vlees = [
    'pepperoni' => [
        'naam' => 'Pepperoni',
        'foto' => 'images/pepperonitopping.jpg'
    ],
    'ham' => [
        'naam' => 'Ham',
        'foto' => 'images/ham.jpg'
    ],
    'garnalen' => [
        'naam' => 'Garnalen',
        'foto' => 'images/garnalen.jpg'
    ],
    'kip' => [
        'naam' => 'Kip',
        'foto' => 'images/kip.jpg'
    ]
];
$groenten = [
    'ui' => [
        'naam' => 'Ui',
        'foto' => 'images/ui.jpg'
    ],
    'tomaat' => [
        'naam' => 'Verse tomaat',
        'foto' => 'images/tomaat.jpg'
    ],
    'olijf' => [
        'naam' => 'Zwarte olijven',
        'foto' => 'images/olijf.jpg'
    ],
    'paprika' => [
        'naam' => 'Paprika',
        'foto' => 'images/paprika.jpg'
    ],
    'jalapeno' => [
        'naam' => 'Jalapeno',
        'foto' => 'images/jalapeno.jpg'
    ],
    'lente_ui' => [
        'naam' => 'Lente ui',
        'foto' => 'images/lente_ui.jpg'
    ],
    'champignons' => [
        'naam' => 'Champignons',
        'foto' => 'images/champignon.jpg'
    ],
    'spinazie' => [
        'naam' => 'Spinazie',
        'foto' => 'images/spinazie.jpg'
    ],
    
];

// einde pizza gegevens

$foutmeldingen = [];

if ($_POST) {
    // Pizza validatie
    if (!$_POST['keuze_formaat']) {
        $foutmeldingen['keuze_formaat'] = 'Kies welk formaat van pizza je wilt';
    }

    // Formulier validatie
    // if (!$_POST['naam']) {
    //     $foutmeldingen['naam'] = 'Naam is ver^plicht';
    // } elseif (strlen($_POST['naam']) < 2) {
    //     $foutmeldingen['naam'] = 'Je naam moet minstens 2 karakters bevatten';
    // }
}

?><!DOCTYPE html>
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
                <img id="pizzalogo" src="image/pizzalogo.svg" alt="logo">
            </div>
            <div class="title">
                <h1 id="hoofd">Pizza House</h1>
            </div>
        </div>
    </header>

    <form method="post">
        <div class="container">
            <pre><?php print_r($_POST) ?></pre>
            <fieldset>
                <legend>
                    <h1>Kies een pizza formaat</h1>
                </legend>
                <div class="inner">
                    <?php foreach ($grootte as $key => $value): ?>
                    <div class="colum4">
                        <img src="image/blank.jpg" alt="<?php echo $value ?> pizza">
                        <label>
                            <?php echo $value ?> <input type="radio" id="keuze_formaat" name="keuze_formaat">
                        </label>
                    </div>
                    <?php if ($foutmeldingen['keuze_fromaat']  ?? false): ?>
                        <span><?php echo $foutmeldingen['keuze_formaat'] ?></span>
                    <?php endif ?>
                    <?php endforeach ?>

                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h2>Be the chef</h2>
                </legend>
                <div class="inner">
                    <h3>Saus</h3>
                    <?php foreach ($saus as $key => $value): ?>
                    <label>
                        <?php echo $value ?> <input type="radio" id="keuze_saus" name="<?php echo $key ?>">
                    </label>
                    <?php endforeach ?>

                    <h3>Kaas</h3>
                    <?php foreach ($kaas as $key => $value): ?>
                        <div class="colum4">
                            <img src="<?php echo $value['foto']?>" alt="">
                            <label>
                                <?php echo $value['naam'] ?> <input type="checkbox" id="keuze_<?php echo $key?>" name="<?php echo $key ?>">
                            </label>
                        </div>
                    <?php endforeach ?>

                    <h3>Vlees</h3>
                    <?php foreach ($vlees as $key => $value): ?>
                        <div class="colum4">
                            <img src="<?php echo $value['foto']?>" alt="">
                            <label>
                                <?php echo $value['naam'] ?> <input type="checkbox" id="keuze_<?php echo $key?>" name="<?php echo $key ?>">
                            </label>
                        </div>
                    <?php endforeach ?>

                    <h3>Groenten</h3>
                    <?php foreach ($groenten as $key => $value): ?>
                        <div class="colum4">
                            <img src="<?php echo $value['foto']?>" alt="">
                            <label>
                                <?php echo $value['naam'] ?> <input type="checkbox" id="keuze_<?php echo $key?>" name="<?php echo $key ?>">
                            </label>
                        </div>
                    <?php endforeach ?>

                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h2>Gegevens</h2>
                </legend>
                <div class="inner">
                    <h3>Adres</h3>
                    <label>
                        Voornaam: <input type="text" class="gegevens">
                    </label>
                    <label>
                        Familienaam: <input type="text" class="gegevens">
                    </label><br>
                    <label>
                        Straat: <input type="text" class="gegevens">
                    </label>
                    <label>
                        Gemeente: <input type="text" class="gegevens">
                    </label>
                    <label>
                        Postcode: <input type="text" class="gegevens">
                    </label>

                    <h3>Bezorg tijd</h3>
                    <label>
                        Tijd: <input type="time" class="gegevens">
                    </label><br>

                    <label>
                        <input type="checkbox" name="nieuwsbrief" class="gegevens"> Ik wil graag de nieuwsbrief
                        ontvangen.
                    </label><br>

                    <button type="submit">
                        Bevestigen
                    </button>
                </div>
            </fieldset>
        </div>

    </form>

</body>

</html>