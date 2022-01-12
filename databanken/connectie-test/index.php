<?php

$conn = new PDO("mysql:host=localhost;dbname=dokterspraktijk;port=3306", "root", "");
$query = $conn->query("SELECT * FROM bloedgroepen;");
$results = $query->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<pre><?php print_r($results) ?></pre>
</body>

</html>