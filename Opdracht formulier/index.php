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
                <img id="pizzalogo" src="image/pizzalogo.svg" alt="logo">
            </div>
            <div class="title">
                <h1 id="hoofd">Pizza House</h1>
            </div>
        </div>
    </header>

    <form method="post">
        <div class="container">
            <fieldset>
                <legend>
                    <h1>Kies een pizza</h1>
                </legend>
                <div class="inner">
                    <div class="colum4">
                        <img src="image/pepperoni.jpg" alt="pepperoni pizza">
                        <label>
                            Pepperoni <input type="radio" name="keuze_pizza" required>
                        </label>
                    </div>
                    <div class="colum4">
                        <img src="image/tonno.jpg" alt="tonijn pizza">
                        <label>
                            Tonno <input type="radio" name="keuze_pizza" required>
                        </label>
                    </div>
                    <div class="colum4">
                        <img src="image/vijfkaas.jpg" alt="5 soorten kaas pizza">
                        <label>
                            4 Cheese <input type="radio" name="keuze_pizza" required>
                        </label>
                    </div>
                    <div class="colum4">
                        <img src="image/blank.jpg" alt="">
                        <label>
                            Be the chef <input type="radio" name="keuze_pizza" required>
                        </label>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h2>Be the chef</h2>
                </legend>
                <div class="inner">
                    <h3>Saus</h3>

                    <label>
                        Tomatensaus <input type="radio" name="keuze_saus" required>
                    </label>

                    <label>
                        BBQ-saus <input type="radio" name="keuze_saus" required>
                    </label>

                    <label>
                        Creme Fraiche <input type="radio" name="keuze_saus" required>
                    </label>

                    <h3>Kaas</h3>

                    <div class="colum4">
                        <img src="image/mozzarella.jpg" alt="mozzarrela">
                        <label>
                            Mozzarella <input type="checkbox" name="keuze_kaas">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/emmentaler.jpg" alt="Emmentaler">
                        <label>
                            Emmentaler <input type="checkbox" name="keuze_kaas">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/gouda.jpg" alt="Gouda & Cheddar">
                        <label>
                            Gouda & Cheddar<input type="checkbox" name="keuze_kaas">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/gorgonzola.jpg" alt="Gorgonzola">
                        <label>
                            Gorgonzola <input type="checkbox" name="keuze_kaas">
                        </label>
                    </div>

                    <h3>Vlees</h3>

                    <div class="colum4">
                        <img src="image/pepperonitopping.jpg" alt="pepperoni">
                        <label>
                            Pepperoni <input type="checkbox" name="keuze_vlees">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/ham.jpg" alt="ham">
                        <label>
                            Ham <input type="checkbox" name="keuze_vlees">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/garnalen.jpg" alt="garnalen">
                        <label>
                            garnalen <input type="checkbox" name="keuze_vlees">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/kip.jpg" alt="kip">
                        <label>
                            Kip <input type="checkbox" name="keuze_vlees">
                        </label>
                    </div>

                    <h3>Groenten</h3>

                    <div class="colum4">
                        <img src="image/ui.jpg" alt="ui">
                        <label>
                            Ui <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/tomaat.jpg" alt="tomaat">
                        <label>
                            Verse tpmaat <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/olijf.jpg" alt="zwarte olijven">
                        <label>
                            Zwarte olijven <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/paprika.jpg" alt="paprika">
                        <label>
                            Paprika <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/jalapeno.jpg" alt="Jalapenos">
                        <label>
                            Jalapenos <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/lente_ui.jpg" alt="Lent ui">
                        <label>
                            Lente ui <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/champignon.jpg" alt="Champignon">
                        <label>
                            Champignons <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>

                    <div class="colum4">
                        <img src="image/spinazie.jpg" alt="spinazie">
                        <label>
                            Spinazie <input type="checkbox" name="keuze_groenten">
                        </label>
                    </div>
                </div>
            </fieldset>

            <fieldset>
                <legend>
                    <h2>Gegevens</h2>
                </legend>
                <div class="inner">
                    <h3>Adres</h3>
                    <label>
                        Voornaam: <input type="text" required class="gegevens">
                    </label>
                    <label>
                        Familienaam: <input type="text" required class="gegevens">
                    </label><br>
                    <label>
                        Straat: <input type="text" required class="gegevens">
                    </label>
                    <label>
                        Gemeente: <input type="text" required class="gegevens">
                    </label>
                    <label>
                        Postcode: <input type="text" required class="gegevens">
                    </label>

                    <h3>Bezorg tijd</h3>
                    <label>
                        Tijd: <input type="time" required class="gegevens">
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