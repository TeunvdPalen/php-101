<?php

$voornaam = "Teun";
$voornaam = 'Teun';

$naam_dubbel = "$voornaam van der Palen";
$naam_enkel1 = '$voornaam van der Palen';
// . is aan om aan elkaar te plakken
$naam_enkel2 = $voornaam . ' van der Palen';

$gewicht = 20;
$zin1 = 'De cementzak weegt ' . $gewicht . 'kg.';
$zin2 = "De cementzak weegt {$gewicht}kg.";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax strings</title>
</head>

<body>

    <p><?php echo $naam_dubbel ?></p>
    <p><?php echo $naam_enkel1 ?></p>
    <p><?php echo $naam_enkel2 ?></p>
    <p><?php echo $zin1 ?></p>
    <p><?php echo $zin2 ?></p>

</body>

</html>