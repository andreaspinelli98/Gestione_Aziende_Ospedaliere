<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cancellazione</title>
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
    if (isset($_POST['submit_delete']) && isset($_POST['todelete']) && isset($_POST['tabella'])) {
        $codosp = $_POST['todelete'];
        $tabella = $_POST['tabella'];
        $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=f password=f"); //cambiati user e password per sicurezza
        if (!$conn) {
            echo 'Connessione al database fallita.';
            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
            exit();
        } else { 
            //echo "Connessione riuscita."."<br/>";
//preparo la query di eliminazione sfruttando il valore di pk passato relativo alla tupla da eliminare
            $query = "DELETE FROM " . $tabella . " WHERE codosp='" . $codosp . "';";
            $result = pg_query($conn, $query);
            if (!$result) {
                echo "Si è verificato un errore.<br/>";
                echo pg_last_error($conn);
                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
                exit();
            } else { //dato che la cancellazione non produce output, avviso l'utente
                echo "Cancellazione avvenuta con successo<br>";
                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
            };
        };
        exit();
        pg_close($conn);
    } else { //non sono stati passati correttamente i dati
        echo "Non risultano dati passati<br>";
        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
        pg_close($conn);
    }
    ?>
</body>
</html>
