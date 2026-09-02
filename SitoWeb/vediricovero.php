<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Storico ricoveri</title>
    <style>
        table, th, td {            
            border: 1px solid black; 
            border-collapse: collapse;
            text-align: left; 
            padding: 4px; 
        }
    </style>
</head>

<body>
    <?php
        session_start();
        if (isset($_POST['tessanit'])) {
            $ts = $_POST['tessanit'];

            $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=f password=f"); //cambiati user e password per sicurezza
            if (!$conn) {
                echo "Errore di connessione al database.";
                echo "<p> Clicca <a href='ricovero.php'>qui</a> per tornare indietro</p>";
                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                exit;
            } else {
                echo "Connessione riuscita.<br/>";
                $query = "SELECT * FROM ricovero WHERE tessanit='$ts'";
                $result = pg_query($conn, $query);
                
                if (!$result) { 
                    echo "Si è verificato un errore.<br/>";
                    echo pg_last_error($conn);
                    echo "<p> Clicca <a href='ricovero.php'>qui</a> per tornare indietro</p>";
                    echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                    exit();
                } else {
                    echo '<br><table>
                        <tr>
                            <th>Codice ospedale</th>
                            <th>Reparto</th>
                            <th>Stanza</th>
                            <th>Letto</th>
                            <th>Tessera sanitaria</th>
                            <th>Id</th>
                            <th>Data inizio</th>
                            <th>Data fine</th>
                        </tr>';
                    while ($row = pg_fetch_array($result)) {
                        echo '<tr>
                            <td>' . $row['codiceosp'] . '</td>
                            <td>' . $row['nomereparto'] . '</td>
                            <td>' . $row['numstanza'] . '</td>
                            <td>' . $row['numletto'] . '</td>
                            <td>' . $row['tessanit'] . '</td>
                            <td>' . $row['id'] . '</td>
                            <td>' . $row['datainizio'] . '</td>
                            <td>' . $row['datafine'] . '</td>
                        </tr>';
                    };
                    echo '</table><br>';
                    echo "<p> Clicca <a href='ricovero.php'>qui</a> per tornare indietro</p>";
                    echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";        
                };
            };
            exit();
            pg_close($conn); 
        } else { 
            echo "ccc". $ts;
            echo "Non risultano dati passati<br>";
            echo "<p> Clicca <a href='ricovero.php'>qui</a> per tornare indietro</p>";
            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
        };
    ?>
</body>


