<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserimento</title>
</head>

<body>
   <?php     
        session_start();
        if (isset($_POST['tabella']) && isset($_POST['toinsert'])) {
        $tbl = $_POST['tabella']; 
        $op = $_POST['toinsert']; 
        $_SESSION['tbl'] = $tbl; //memorizza la tabella selezionata nella sessione

           $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=pgadmin password=unimi");            
            if (!$conn) {
                echo 'Connessione al database fallita.';
                exit();
            } else {
                echo "Connessione riuscita.<br/>"; 
            };
    
            if ($op = 'insert') {
                switch ($tbl) { 
                    case 'ospedale':
                        $pattern = '/^[0-9]+$/';
                        $codice = isset($_POST['codosp']) ? $_POST['codosp'] : NULL;
                        $nome = isset($_POST['nomeosp']) ? $_POST['nomeosp'] : NULL;
                        $indirizzo = isset($_POST['indirizzosp']) ? $_POST['indirizzosp'] : NULL;
                        $telefono = isset($_POST['tel']) ? $_POST['tel'] : NULL;
                        $telefono = preg_match($pattern, $telefono) ? $telefono : 'not valid';
                        
                        $query = "INSERT INTO ospedale (codosp, nomeosp, indirizzosp, tel) VALUES ('$codice', '$nome', '$indirizzo', '$telefono')";
                        $result = pg_query($conn, $query);
    
                        if ($telefono != 'not valid') {
                            if (!$result) {                                
                                echo "Si è verificato un errore.<br/>";
                                echo pg_last_error($conn);
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                                exit();
                            } else {
                                echo "Inserimento avvenuto con successo";
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                            };                                 
                        } else {
                            echo "I dati passati non sono conformi alle richieste.<br>";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        };
                    break;
                    case 'reparto':
                        $pattern = '/^[0-9]+$/';
                        $codice = isset($_POST['codiceosp']) ? $_POST['codiceosp'] : NULL;
                        $nome = isset($_POST['nomerep']) ? $_POST['nomerep'] : NULL;
                        $telefono = isset($_POST['telrep']) ? $_POST['telrep'] : NULL;
                        $telefono = preg_match($pattern, $telefono) ? $telefono : 'not valid';
                        $orario = isset($_POST['orariovisite']) ? $_POST['orariovisite'] : NULL;
                        
                        $query = "INSERT INTO reparto (codiceosp, nomerep, telrep, orariovisite) VALUES ('$codice', '$nome', '$telefono', '$orario')";
                        $result = pg_query($conn, $query);
    
                        if ($telefono != 'not valid') {
                            if (!$result) {                                
                                echo "Si è verificato un errore.<br/>";
                                echo pg_last_error($conn);
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                                exit();
                            } else {
                                echo "Inserimento avvenuto con successo";
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                            };                                 
                        } else {
                            echo "I dati passati non sono conformi alle richieste.<br>";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        };
                    break;
                    case 'medico':
                        $pattern = '/^[0-9]+$/';
                        $codice = isset($_POST['codiceosp']) ? $_POST['codiceosp'] : NULL;
                        $reparto = isset($_POST['rep']) ? $_POST['rep'] : NULL;
                        $cf = isset($_POST['codfisc']) ? $_POST['codfisc'] : NULL;
                        $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
                        $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : NULL;
                        $telefono = isset($_POST['tel']) ? $_POST['tel'] : NULL;
                        $telefono = preg_match($pattern, $telefono) ? $telefono : 'not valid';
                        $anzianità = isset($_POST['anzianità']) ? $_POST['anzianità'] : NULL;

                        $query = "INSERT INTO medico (codiceosp, rep, codfisc, nome, cognome, tel, anzianità)
                         VALUES ('$codice', '$reparto', '$cf', '$nome', '$cognome','$telefono', '$anzianità')";
                        $result = pg_query($conn, $query);
    
                        if ($telefono != 'not valid') {
                            if (!$result) {                                
                                echo "Si è verificato un errore.<br/>";
                                echo pg_last_error($conn);
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                                exit();
                            } else {
                                echo "Inserimento avvenuto con successo";
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                            };                                 
                        } else {
                            echo "I dati passati non sono conformi alle richieste.<br>";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        };
                    break;
                    case 'infermiere':
                        $pattern = '/^[0-9]+$/';
                        $codice = isset($_POST['codiceosp']) ? $_POST['codiceosp'] : NULL;
                        $reparto = isset($_POST['rep']) ? $_POST['rep'] : NULL;
                        $cf = isset($_POST['codfisc']) ? $_POST['codfisc'] : NULL;
                        $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
                        $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : NULL;
                        $telefono = isset($_POST['tel']) ? $_POST['tel'] : NULL;
                        $telefono = preg_match($pattern, $telefono) ? $telefono : 'not valid';
                        $tipo = isset($_POST['tipologia']) ? $_POST['tipologia'] : NULL;

                        $query = "INSERT INTO infermiere (codiceosp, rep, codfisc, nome, cognome, tel, tipo)
                         VALUES ('$codice', '$reparto', '$cf', '$nome', '$cognome','$telefono', '$tipo')";
                        $result = pg_query($conn, $query);
    
                        if ($telefono != 'not valid') {
                            if (!$result) {                                
                                echo "Si è verificato un errore.<br/>";
                                echo pg_last_error($conn);
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                                exit();
                            } else {
                                echo "Inserimento avvenuto con successo";
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                            };                                 
                        } else {
                            echo "I dati passati non sono conformi alle richieste.<br>";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        };
                    break;
                    case 'esame':
                        $codice = isset($_POST['codesame']) ? $_POST['codesame'] : NULL;
                        $descrizione = isset($_POST['descriz']) ? $_POST['descriz'] : NULL;
                        
                        $query = "INSERT INTO esame (codesame, descriz) VALUES ('$codice', '$descrizione')";
                        $result = pg_query($conn, $query);
    
                        if (!$result) {                                
                            echo "Si è verificato un errore.<br/>";
                            echo pg_last_error($conn);
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                            exit();
                        } else {
                            echo "Inserimento avvenuto con successo";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                        };                                 
                    break;
                    case 'paziente':
                        $pattern = '/^[0-9]+$/';
                        $ts = isset($_POST['ts']) ? $_POST['ts'] : NULL;
                        $nome = isset($_POST['nome']) ? $_POST['nome'] : NULL;
                        $cognome = isset($_POST['cognome']) ? $_POST['cognome'] : NULL;
                        $età = isset($_POST['età']) ? $_POST['età'] : NULL;
                        $nascita = isset($_POST['nascita']) ? $_POST['nascita'] : NULL;
                        $indirizzo = isset($_POST['via']) ? $_POST['via'] : NULL;
                        $telefono = isset($_POST['tel']) ? $_POST['tel'] : NULL;
                        $telefono = preg_match($pattern, $telefono) ? $telefono : 'not valid';
                        $città = isset($_POST['città']) ? $_POST['città'] : NULL;
                        $dimissione = isset($_POST['dimiss']) ? $_POST['dimiss'] : NULL;
        
                        $query = "INSERT INTO paziente (tesserasanitaria, nomepaz, cognomepaz, etàpaz, datanascita, indirizzopaz, telpaz, città, datadimiss)
                         VALUES ('$ts', '$nome', '$cognome', '$età', '$nascita', '$indirizzo', '$telefono', '$città', '$dimiss')";
                        $result = pg_query($conn, $query);
        
                        if ($telefono != 'not valid') {
                            if (!$result) {                                
                                echo "Si è verificato un errore.<br/>";
                                echo pg_last_error($conn);
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                                exit();
                            } else {
                                echo "Inserimento avvenuto con successo";
                                echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                                echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                            };                                 
                        } else {
                            echo "I dati passati non sono conformi alle richieste.<br>";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        };
                    break;
                    case 'prenotazione':
                        $ts = isset($_POST['tessanit']) ? $_POST['tessanit'] : NULL;
                        $nomeamb = isset($_POST['nomeamb']) ? $_POST['nomeamb'] : NULL;
                        $id = isset($_POST['id']) ? $_POST['id'] : NULL; 
                        $datapren = isset($_POST['datapren']) ? $_POST['datapren'] : NULL; 
                        $dataesame = isset($_POST['dataesame']) ? $_POST['dataesame'] : NULL; 
                        $oraesame = isset($_POST['oraesame']) ? $_POST['oraesame'] : NULL; 
                        $urgenza = isset($_POST['urgenza']) ? $_POST['urgenza'] : NULL;
                        $costo = isset($_POST['regimecosto']) ? $_POST['regimecosto'] : NULL;
        
                        $query = "INSERT INTO prenotazione (tessanit, nomeamb, id, datapren, dataesame, oraesame, 
                        urgenza, regimecosto) VALUES ('$ts', '$nomeamb', '$id', '$datapren', '$dataesame', '$oraesame', '$urgenza', '$costo')";
                        $result = pg_query($conn, $query);
        
                        if (!$result) {                                
                            echo "Si è verificato un errore.<br/>";
                            echo pg_last_error($conn);
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                            exit();
                        } else {
                            echo "Inserimento avvenuto con successo";
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";  
                        };                                                         
                    break;
                };     
                exit();
                pg_close($conn); 
            }           
        } else { //non sono stati passati correttamente i dati
            echo "Non risultano dati passati<br>";
            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
        }  
    ?> 
</body>
</html>
