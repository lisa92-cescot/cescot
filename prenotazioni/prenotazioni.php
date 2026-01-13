<html>
    <head>
        <meta charset="utf-8">
        <link ref="stylesheet" href="style.css">
    </head>
    <body>
        <h1>Prenotazioni</h1>
        <?php
            require_once("../../../php/esercizi/lib/libreria.php");
            //inizializza la connessione al database
            $databaseHost = '127.0.0.1';
            $databaseName = 'prenotazioni';
            $databaseUsername = 'root';
            $databasePassword = '';
            $mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);

            //verifica la connessione
            if (!$mysqli) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $query = 'SELECT citta.citta, clienti.nome, clienti.cognome, prenotazioni.arrivo, prenotazioni.importo, prenotazioni.caparra,  ROUND(prenotazioni.importo - prenotazioni.caparra, 2) AS saldo
                      FROM citta
                      INNER JOIN clienti ON citta.id_citta = clienti.citta
                      INNER JOIN prenotazioni ON clienti.id_cliente = prenotazioni.cliente';

            $result = mysqli_query($mysqli, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $prenotazioneDivContent = 
                        "<h2>$row[arrivo]</h2>
                        <p>Nome: $row[nome] Cognome: $row[cognome]</p>
                        <p>Città di residenza: $row[citta]</p>
                        <p>Importo: $row[importo]</p>
                        <p>Caparra: $row[caparra]</p>
                        <p>Saldo: $row[saldo]";
                        printDiv($prenotazioneDivContent, 'prenotazione');
            }
            ?>
    </body>
</html>