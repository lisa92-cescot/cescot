<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
     <h1>Prenotazioni</h1>
    <div>
    <?php
//inizializza la connessione al database
$databaseHost = 'localhost';
$databaseName = 'prenotazioni';
$databaseUsername = 'root';
$databasePassword = '';

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

//verifica la connessione
if (!$mysqli) {
	die("Connection failed: " . mysqli_connect_error());
}
$query = 'SELECT * FROM clienti, prenotazioni.prenotazioni';

$result = mysqli_query($mysqli, $query);

//stampa il numero di righe restituite
echo $result->num_rows . '<br>';

//ciclo sulle righe restituite e stampo nome e cognome di ogni cliente
while ($row = mysqli_fetch_assoc($result)) {
    echo "<div>";
    echo "<h2>". $row['data di arrivo'] . "</h2>";
    echo "<p>" . $row['id'] . "</p>";
    echo "<p>" . $row['nome'] . "</p>";
    echo "<p>" . $row['cognome'] . "</p>";
    echo "<p>" . $row['citta di residenza'] . "</p>";
    echo "<p>" . $row['importo della prenotazione'] . "</p>";
    echo "<p>" . $row['caparra'] . "</p>";
    echo "<p class='saldo'>" . $row['saldo'] . "</p>";
    echo "</div>";
    
}
?>
    
</body>
</html>
</body>
</html>