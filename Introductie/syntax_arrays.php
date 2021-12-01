<?php

$scores = [2, 4, 6, 7, 3, 4, 9, 10];
// echo $scores[2];
// print_r($scores);
// echo implode( ", ", $scores);

$gebruiker = [
    'username' => 'TvdP',
    'email' => 'teun@mail.com',
    'password' => 'test123',
    'eyecolor' => 'groen',
    'haircolor' => 'bruin',
    'telefoonnummers' => [
        'gsm' => '0469843',
        'telefoon' => '56468546'
    ]
];
// echo $gebruiker['email'];
// echo $gebruiker['telefoonnummers']['gsm'];

$reviews = [
    [
        'score' => 9,
        'naam' => 'Bert',
        'review' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis, consequuntur!'
    ],
    [
        'score' => 4,
        'naam' => 'Teun',
        'review' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis, consequuntur!'
    ],
    [
        'score' => 7,
        'naam' => 'Stef',
        'review' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis, consequuntur!'
    ]
];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax arrays</title>
</head>

<body>

    <h1>Reviews</h1>

    <section>
        <?php foreach ($reviews as $review) : ?>
            <article class="review">
                <h2><?php echo $review['naam'] ?></h2>
                <p><?php echo $review['score'] ?></p>
                <P><?php echo $review['review'] ?></P>
            </article>
        <?php endforeach; ?>
    </section>

</body>

</html>