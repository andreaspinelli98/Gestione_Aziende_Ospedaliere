<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selezione</title>
    <style>
        table, th, td {            
            border: 1px solid black; 
            border-collapse: collapse;
            text-align: left; /*mette "nome" di fianco alla riga*/
            padding: 4px; /*aumenta dimensione testo*/
        }
    </style>
</head>

<body>
   <?php
   session_start();
   if (isset($_POST['tabella']) && isset($_POST['operazione'])) { // Verifica se i dati sono stati passati correttamente
    $tbl = $_POST['tabella']; // Assegna la tabella selezionata a una variabile
    $op = $_POST['operazione']; // Assegna l'operazione selezionata a una variabile
    $_SESSION['tbl'] = $tbl; // Memorizza la tabella selezionata nella sessione
   
        $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=pgadmin password=unimi");
        
        if (!$conn) {
            echo 'Connessione al database fallita.';
            exit();
        } else {
            echo "Connessione riuscita.<br/>"; 
        };

        if ($op = 'select') {
            switch ($tbl) { // Stabilisce cosa fare in base alla tabella selezionata
                case 'ospedale':
                    $query = "SELECT * FROM ospedale";
                    $result = pg_query($conn, $query);

                    if (!$result) { // La query ha generato errori
                        echo "Si è verificato un errore.<br/>";
                        echo pg_last_error($conn);
                        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        exit();
                    } else { // La query non ha generato errori
                        echo '<br><table>
                            <tr>
                                <th>Codice</th>
                                <th>Nome</th>
                                <th>Indirizzo</th>
                                <th>Telefono</th>
                            </tr>';
                        while ($row = pg_fetch_array($result)) {
                            echo '<tr>
                                <td>' . $row['codosp'] . '</td>
                                <td>' . $row['nomeosp'] . '</td>
                                <td>' . $row['indirizzosp'] . '</td>
                                <td>' . $row['tel'] . '</td>
                            </tr>';
                        };
                        echo '</table><br>';
                        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";        
                    };
                    break;

                case 'medico':
                    $query = "SELECT * FROM medico";
                    $result = pg_query($conn, $query);

                    if (!$result) { 
                        echo "Si è verificato un errore.<br/>";
                        echo pg_last_error($conn);
                        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        exit();
                    } else { 
                        echo '<br><table>
                            <tr>
                                <th>Codice</th>
                                <th>Reparto</th>
                                <th>Codice Fiscale</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Telefono</th>
                                <th>Anzianità</th>
                            </tr>';
                        while ($row = pg_fetch_array($result)) {
                            echo '<tr>
                                <td>' . $row['codiceosp'] . '</td>
                                <td>' . $row['rep'] . '</td>
                                <td>' . $row['codfisc'] . '</td>
                                <td>' . $row['nome'] . '</td>
                                <td>' . $row['cognome'] . '</td>
                                <td>' . $row['tel'] . '</td>
                                <td>' . $row['anzianità'] . '</td>
                            </tr>';
                        };
                        echo '</table><br>';
                        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";        
                    };
                    break;

                case 'infermiere':
                    $query = "SELECT * FROM infermiere";
                    $result = pg_query($conn, $query);

                    if (!$result) { 
                        echo "Si è verificato un errore.<br/>";
                        echo pg_last_error($conn);
                        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        exit();
                    } else { 
                        echo '<br><table>
                            <tr>
                                <th>Codice</th>
                                <th>Reparto</th>
                                <th>Codice Fiscale</th>
                                <th>Nome</th>
                                <th>Cognome</th>
                                <th>Telefono</th>
                                <th>Tipologia</th>
                            </tr>';
                        while ($row = pg_fetch_array($result)) {
                            echo '<tr>
                                <td>' . $row['codiceosp'] . '</td>
                                <td>' . $row['rep'] . '</td>
                                <td>' . $row['codfisc'] . '</td>
                                <td>' . $row['nome'] . '</td>
                                <td>' . $row['cognome'] . '</td>
                                <td>' . $row['tel'] . '</td>
                                <td>' . $row['tipo'] . '</td>
                            </tr>';
                        };
                        echo '</table><br>';
                        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";        
                    };
                    break;
            };

            exit();
            pg_close($conn); // Chiudi la connessione al database
        }
    } else { // Non sono stati passati correttamente i dati
        echo "Non risultano dati passati<br>";
        echo "<p> Clicca <a href='select.php'>qui</a> per tornare indietro</p>";
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
    }    
?> 
</body>
</html>
