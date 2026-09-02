<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifica</title>
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
        if (isset($_POST['submit_update']) && isset($_POST['toupdate']) && isset($_POST['tabella'])) {
            $codosp = $_POST['toupdate'];
            $tabella = $_POST['tabella'];            
            $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=pgadmin password=unimi");
            if (!$conn) {
                echo "Connessione al database fallita.";
                exit();
            } else {
                echo "Connessione riuscita<br/>";
                $query = "SELECT * FROM " . $tabella . " WHERE codosp='" . $codosp . "';";                
                $result = pg_query($conn, $query);               
                
                if (!$result) {
                    echo "Si è verificato un errore.<br/>";
                    echo pg_last_error($conn);
                    echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                    echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
                    exit();
                } else {
                    $array = pg_fetch_array($result);

                    print ("<form action='update2.php' method='POST'>");
                    print ("<table>");
//una volta raccolte le modifiche, passo i dati al file preposto all'applicazione delle stesse
                    print ("<tr><th>Codice</th><td><input type=\"text\" name=\"codosp\" value='" . $array['codosp'] . "' required readonly></td></tr>");
                    print ("<tr><th>Nome</th><td><input type=\"text\" name=\"nomeosp\" value='" .$array['nomeosp'] . "' required></td></tr>");
                    print ("<tr><th>Indirizzo</th><td><input type=\"text\" name=\"indirizzosp\" value='" . $array['indirizzosp'] . "' required></td></tr>");
                    print ("<tr><th>Telefono</th><td><input type=\"tel\" name=\"tel\" value='" . $array['tel'] . "' required></td></tr>");
                    print ("<tr><td><input type=\"submit\" value=\"Invio\"><input type='reset' value='Reset'></td></tr>");
                    print ("<input type='hidden' name='tabella' value='$tabella'>");
                    print ("</table>");
                    print ("</form>");

                    echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                    echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
                };    
            };
        } else {//non sono stati passati correttamente i dati
            echo "Non risultano dati passati<br>";
            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
        }
    ?>
</body>
</html>
