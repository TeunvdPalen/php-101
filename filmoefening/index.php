<?php

$movie = "Avengers: Endgame";
$directors = [
    "Anthony Russo",
    "Joe Russo"
];
$writers = [
    "Christopher Markus",
    "Stephen McFeely",
    "Stan Lee"
];
$actors = [
    [
        "naam" => "Robert Doweny Jr.",
        "image" => "robert.jpg"
    ],
    [
        "naam" => "Chris Evans",
        "image" => "chris.jpg"
    ],
    [
        "naam" => "Mark Ruffalo",
        "image" => "mark.jpg"
    ]
];
$reviews = [
    [
        "titel" => "Wat een film",
        "naam" => "Jef",
        "email" => "jef@mail.com",
        "score" => 9,
        "review" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias earum eos voluptatibus voluptate nobis voluptatem culpa dolorum ipsam nostrum, sit odio esse repellat, quis voluptas reprehenderit velit iure cum odit.",
        "datum" => "15/08/2020"
    ],
    [
        "titel" => "Prachtig",
        "naam" => "Rob",
        "email" => "rob@mail.com",
        "score" => 8,
        "review" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias earum eos voluptatibus voluptate nobis voluptatem culpa dolorum ipsam nostrum, sit odio esse repellat, quis voluptas reprehenderit velit iure cum odit.",
        "datum" => "13/08/2020"
    ],
    [
        "titel" => "Meer van verwacht",
        "naam" => "Anne",
        "email" => "anne@mail.com",
        "score" => 4,
        "review" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias earum eos voluptatibus voluptate nobis voluptatem culpa dolorum ipsam nostrum, sit odio esse repellat, quis voluptas reprehenderit velit iure cum odit.",
        "datum" => "10/08/2020"
    ]
];

$score = array_sum(array_column($reviews, "score")) / count($reviews);
$ster = '<i class="fas fa-star"></i>'

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://kit.fontawesome.com/f450e26279.js" crossorigin="anonymous"></script>
    <title>Avengers: Endgame</title>
</head>

<body>

    <div class="intro">
        <div class="container">
            <h1>Avengers: Endgame</h1>
            <iframe class="youtube" width="860" height="515" src="https://www.youtube.com/embed/TcMBFSGVi1c" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            <p>After the devastating events of Avengers: Infinity War (2018), the universe is in ruins. With the help of
                remaining allies, the Avengers assemble once more in order to reverse Thanos' actions and restore
                balance to the universe.</p>
        </div>
    </div>

    <div class="container">
        <h2>Directors</h2>
        <p class="naam"><?php echo implode(", ", $directors) ?></p>

        <h2>Writers</h2>
        <p class="naam"><?php echo implode(", ", $writers) ?></p>

        <h2>Actors</h2>
        <ul class="actors">
            <?php foreach ($actors as $actor) : ?>
                <li><img src="images/<?php echo $actor["image"] ?>" alt="<?php echo $actor["naam"] ?>">
                    <br><?php echo $actor["naam"] ?>
                </li>
            <?php endforeach; ?>
        </ul>

        <div class="score">
            <h2>Score
                <p>
                <div class="ster1 cf">
                    <?php for ($x = 0; $x < $score; $x++) {
                        echo $ster;
                    }
                    ?>
                </div>
                <div class="ster2 cf">
                    <?php for ($x = 0; $x < 10 - $score; $x++) {
                        echo $ster;
                    }
                    ?>
                </div>
                </p>
            </h2>
        </div>
    </div>

        <div class="reviews">
            <div class="container">
            <h2>User reviews</h2>
            <?php foreach ($reviews as $review) : ?>
                <div class="review">
                    <h3><?php echo $review["titel"] ?></h3>
                    <p><?php echo $review["naam"] ?></p>
                    <p><a href='mailto:<?php echo $review["email"] ?>?subject=HTML link'>Send an email</a>
                    <p>
                    <p>Score: <?php echo $review["score"] ?> / 10</p>
                    <p><?php echo $review["review"] ?></p>
                    <p><?php echo $review["datum"] ?></p>
                </div>
            <?php endforeach; ?>
            </div>
        </div>

</body>

</html>