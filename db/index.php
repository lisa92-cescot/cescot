<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Il testo che segue arriva dal database</h1>
    <div>
    <?php
//inizializza la connessione al database
$databaseHost = 'localhost';
$databaseName = 'cescot';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//verifica la connessione
if (!$mysqli) {
	die("Connection failed: " . mysqli_connect_error());
}
$query = 'SELECT * FROM content';

$result = mysqli_query($mysqli, $query);

//stampa il numero di righe restituite
echo $result->num_rows . '<br>';

//ciclo sulle righe restituite e stampo nome e cognome di ogni cliente
while ($row = mysqli_fetch_assoc($result)) {
	echo $row['value'].'<br>';
}
?>
</div>
    
</body>
</html>