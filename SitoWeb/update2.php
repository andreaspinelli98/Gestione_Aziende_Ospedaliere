<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aggiornamento</title>
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
    if (isset($_POST['codosp']) && isset($_POST['tabella'])) {
        $codosp = $_POST['codosp'];
        $tbl = $_POST['tabella'];
        $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=f password=f"); //cambiati user e password per sicurezza
        if (!$conn) {
            echo "Connessione al database fallita.";
            echo pg_last_error($conn);
            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
            exit();
        } else {
            $pattern = '/^[0-9]+$/';
            $nomeosp = isset($_POST['nomeosp']) ? $_POST['nomeosp'] : '';
            $via = isset($_POST['indirizzosp']) ? $_POST['indirizzosp'] : NULL;
            $telefono = isset($_POST['tel']) ? $_POST['tel'] : NULL;
            $telefono = preg_match($pattern, $telefono) ? $telefono : 'not valid';

            if($telefono!='not valid'){
                $query = "UPDATE " . $tbl . " SET nomeosp='$nomeosp', indirizzosp='$via', tel='$telefono' WHERE codosp='$codosp'";
                $result = pg_query($conn, $query);

                if (!$result) {
                    echo "Si è verificato un errore.<br/>";
                    echo pg_last_error($conn);
                    echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                    echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
                } else {
                    echo "Aggiornamento avvenuto con successo<br>";
                    echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                    echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
                };
            } else {
                echo "I dati passati non sono conformi alle richieste.<br>";
                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
            };
        };
        pg_close($conn);
        exit();         
    } else {
        echo "Non risultano dati passati<br>";
        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
    }
    ?>
</body>
</html>
