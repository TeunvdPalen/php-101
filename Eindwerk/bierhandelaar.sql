-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 14 feb 2022 om 09:58
-- Serverversie: 10.4.21-MariaDB
-- PHP-versie: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bierhandelaar`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `bieren`
--

CREATE TABLE `bieren` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL,
  `alchoholpercentage` float NOT NULL,
  `inhoud` float NOT NULL,
  `prijs` float NOT NULL,
  `statiegeld` float NOT NULL,
  `brouwerij_id` int(11) DEFAULT NULL,
  `soort_id` int(11) DEFAULT NULL,
  `kleur_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `brouwerijen`
--

CREATE TABLE `brouwerijen` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kleuren`
--

CREATE TABLE `kleuren` (
  `id` int(10) UNSIGNED NOT NULL,
  `kleur` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `kleuren`
--

INSERT INTO `kleuren` (`id`, `kleur`) VALUES
(1, 'blond'),
(2, 'goud'),
(3, 'amber'),
(4, 'bruin'),
(5, 'zwart'),
(6, 'rood');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `soorten`
--

CREATE TABLE `soorten` (
  `id` int(10) UNSIGNED NOT NULL,
  `naam` varchar(255) NOT NULL,
  `omschrijving` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Gegevens worden geëxporteerd voor tabel `soorten`
--

INSERT INTO `soorten` (`id`, `naam`, `omschrijving`) VALUES
(1, 'pils', 'Pils is een licht bier en kenmerkt zich vooral door een heldere goudgele kleur, witte schuimkraag en bittere smaak. Het is niet al te vol en levendig van smaak, maar een lekkere doordrinker. Pils wordt gemaakt van gerstemout (ontkiemd en daarna gedroogde gerst), hop, water en gist en soms suiker. Pils is officieel vernoemd naar de stad Pilsen (Plzeň) in Tsjechië waar dit type bier oorspronkelijk vandaan komt.'),
(2, 'lager', 'Lager is een term die vooral in Engelstalige landen wordt gebruikt om ondergistende bieren aan te duiden. In Nederland wordt de term Lager bijna niet meer gebruikt maar in Duitsland komt Lager steeds meer terug. De Lager die in Nederland te koop is is een pilsachtig bier. Doordat het bier minder alcohol bevat is het een goede doordrinker en goedkoop.'),
(3, 'witbier', 'Witbier heeft als basis behalve tarwemout ook gerstemout en diverse kruiden. Meestal citrusschillen, koriander en hop. Het smaakt fris en fruitig en bevat een karakteristieke lichtgele kleur. Het is een goede dorstlesser tijdens de zomer. Witbier is een bier van hoge gisting dat het hele jaar door gebrouwen en verkocht wordt. Het wordt niet gefilterd, waardoor het bier enigszins troebel blijft. Het depot bevat gist en dat kan worden gedronken. '),
(4, 'fruitbier', 'Fruitbieren hebben een zoete, frisse smaak, waarin het gebruikte vruchtenextract duidelijk herkenbaar is. De bittere hopsmaak of zure smaak is minder sterk dan bij andere bieren. Bij traditionele bieren wordt aan het einde van het brouwproces, vlak voor het gisten, fruit toegevoegd, waarbij de suikers van de vruchten volledig worden vergist. Hier worden steenvruchten, zoals kersen en perziken voor gebruikt, maar ook appels, bananen en aardbeien kunnen worden toegevoegd. De vruchten leveren een subtiele, fruitige, niet zoete bijdrage aan de smaak. In moderne brouwerijen wordt vaak alleen sap toegevoegd aan het bier: vruchtensappen, vruchtencoulis of vruchtenextracten. Vaak worden deze bieren ook nog gezoet. '),
(5, 'blond', 'Blonde bieren zijn licht tot goudgeel van kleur, die minder hop bevatten dan andere bieren.  Vaak met een friswitte schuimkraag. Het zijn vaak Belgische bieren, meestal behoorlijk stevig en met een hoger alcoholpercentage dan pils. Ze zijn zacht en fris van smaak: perfect als dorstlesser of voor een aperitief.'),
(6, 'IPA | Indian Pale Ale', 'Indian Pale Ale is een hoppig bier met vaak sterke tropische aroma’s. Oorspronkelijk is het een Pale Ale speciaal gemaakt voor de Indische export in de 17e eeuw. De Indian Pale Ale, gebrouwen in London, was extra lang houdbaar door de toevoeging van extra hop.'),
(7, 'stout', 'Stout bier is oorspronkelijk afkomstig uit Londen waar het bier al gebrouwen wordt sinds 1730. Stout wordt gekenmerkt door de donkerbruine tot zwarte kleur en branderige bittere smaak. Stout bestaat zowel in boven als ondergistende varianten. Bij het brouwen van stout wordt gebruik gemaakt van gebrande of geroosterde mout.'),
(8, 'bruin', 'Nederlands bruin bier is een ondergistend bier met een laag alcoholgehalte (vaak oud bruin genoemd). Het bier heeft een zoete tot erg zoete smaak doordat het bier na het brouwproces kunstmatig is gezoet. \r\nDe Engelse brown ale is amberkleurig tot lichtbruin. De smaak is zoet en soms kun je smaken als chocola en koffie herkennen in het engelse bruine bier. De Amerikaanse bruine bieren zijn hoppiger, bitterder en droger dan de Engelse. De Amerikaanse variant kenmerkt zich door de smaken van geroosterde mout, karamel en chocolade.'),
(9, 'bock/bok', 'Bokbier, in het Duits bockbier, is een zwaarder seizoensbier. Bokbier komt oorspronkelijk uit Duitsland en het is ontstaan aan het begin van de 17e eeuw. Normaal gesproken worden er twee soorten bokbieren uitgegeven. De Lentebok komt op de markt vlak na het begin van de vastentijd tot eind mei. Deze variant heeft een moutige, karamelachtige smaak. In de eerste week van oktober komt de andere variant op de markt, de Herfstbok. Dit is een donkerrood bier wat vaak een hoger alcoholpercentage heeft dan de lentebok. Deze wordt gekenmerkt door een volle, romige, karamelachtige en kruidnagelachtige smaak. '),
(10, 'dubbel', 'Een dubbel bier is een echte Belgische klassieker. De termen ‘enkel’, ‘dubbel’ en ‘tripel’ verwijzen naar de hoeveelheid granen per liter water die bij het brouwen gebruikt wordt. Hierbij geldt: hoe meer graan, hoe meer suiker, hoe meer alcohol. Dubbel verwijst naar een oud gebruik waarbij de brouwer kruizen op zijn vaten bier zette. Één kruis was een lichtalcoholisch bier, gebrouwen met weinig mout. Gebruikte hij meer mout, dan verkreeg hij meer alcohol – twee kruizen, een dubbel dus. Van oorsprong werd het dubbelbier ook gezien als het dubbele alcoholpercentage van enkel bier (3,5%), het alcoholpercentage van dubbel bier was namelijk met 6-7% twee keer zo zwaar. Qua kleur kenmerkt dubbel bier zich door zijn mooie donkere kleur: van middelbruin tot donkerblond. Het dubbel bier is zoeter dan enkel bier en heeft over het algemeen een wat zachtere lichtzoete smaak met een lichte hopbitterheid.'),
(11, 'trippel', 'Een tripel bier is een zeer zwaar bovengistend bier met hergisting in de fles. De kleur varieert tussen amber en blond. Tripels bevatten een typische sterk moutige, maar ook licht zoete smaak. Bij een aantal tripels wordt een aanzienlijk percentage tarwevlokken, ook wel tarwemout genoemd, gebruikt. Dit hoge alcoholpercentage komt ook doordat er suiker oftewel glucose wordt toegevoegd. Sommige tripels hebben een kruidig aroma, doordat er kruiden als koriander en sinaasappelschil en/ of ook speciale aromahopsoorten worden toegevoegd. Tripel bevat meestal meer koolzuur dan pilsener.'),
(12, 'quadruppel', 'Zoals de naam zegt zit in Quadrupel bier nog meer graan dan in Tripel bier. Dit zorgt er voor dat Quadrupel bieren meer alcohol bevatten dan Tripel bieren. De Quadrupel is het zwaarste bier van de klassieke Belgische biersoorten Dubbel, Tripel en Quadrupel. Deze bieren bevatten nog meer ingrediënten dan Tripels. De smaak is complex, en vaak vrij bitter. Quadrupels zijn van hoge gisting en op de fles gerijpt. In de fles blijft daardoor regelmatig een depot achter, maar dit kan gedronken worden.'),
(13, 'saison', 'Saison bier dankt zijn naam aan het Franse woord voor seizoen. Dit bier was namelijk oorspronkelijk een seizoensbier. Fruitige tonen domineren het aroma van de saison. Het is een helder dorstlessend bier met een grote schuimkraag. De toevoeging van verschillende kruiden en specerijen zorgen voor een complexe fruitige of citrussmaak. De meeste bieren zijn goudblond tot amberkleurig en zijn ongefilterde bieren van hoge gisting.'),
(14, 'abdijbier', 'Abdijbier heeft niets te maken met de smaak, alcoholpercentage of de ingrediënten van het bier. Abdijbieren zijn bieren die gebrouwen worden in een kloostergemeenschap. Deze manier van brouwen is officieel erkend, waarbij het bier moet voldoen aan de regels. Pas dan wordt het een Erkend Belgisch Abdijbier. Dit keurmerk wordt sinds 1999 door de unie van de Belgische Brouwers aan bepaalde abdijbieren toegekend. Sommige abdijbieren worden gebrouwen in een brouwerij op het domein van de abdij, door de monniken zelf of door derden. Onder deze abdijbieren bevindt zich een speciale soort, de trappist, die aan strikte regels moet voldoen. Een aantal abdijen besteedt het brouwen van bier uit aan commerciële brouwerijen. Vaak wordt hierbij gebruikgemaakt van oude kloosterrecepten. Ook abdijen zonder eigen brouwtraditie verbinden tegenwoordig vaak hun naam aan een bier. Daarnaast zijn er ook brouwerijen die hun bieren noemen naar niet meer bestaande abdijen.'),
(15, 'amber', 'Ambier bier is een bier met een hoge gisting. De gisting vindt plaats bij een temperatuur van 15 tot 25 graden Celsius. De naam van het bier slaat op de kleur: het bier is helder en amberkleurig. De kleur komt door de \'special B\' mout die gebruikt wordt. De special B mout geeft het Amberbier een intensere smaak van kruiden of karamel. Het is fris, heeft een aroma van geroosterde mout, en een iets zurige, verfrissende afdronk. Amberbier wordt ook wel Belgische ale genoemd.');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `bieren`
--
ALTER TABLE `bieren`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `brouwerijen`
--
ALTER TABLE `brouwerijen`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `kleuren`
--
ALTER TABLE `kleuren`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `soorten`
--
ALTER TABLE `soorten`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `bieren`
--
ALTER TABLE `bieren`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `brouwerijen`
--
ALTER TABLE `brouwerijen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT voor een tabel `kleuren`
--
ALTER TABLE `kleuren`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT voor een tabel `soorten`
--
ALTER TABLE `soorten`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
