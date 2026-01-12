<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="../../styles.css">
</head>
<body>
    <h1>Clienti</h1>
    <h2>id </h2>
    <p>Nome </p>
    <p>Cognome </p>
    
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
	echo $row['clienti'].'<br>';
}
?>
</body>
</html>