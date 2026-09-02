<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form operazioni</title>
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
    if (isset($_POST['tabella']) && isset($_POST['operazione'])) {  
        $tbl = $_POST['tabella']; //assegna la tabella selezionata a una variabile
        $op = $_POST['operazione'];
        
        $conn = pg_connect("host=localhost port=5432 dbname=Progetto user=pgadmin password=unimi");
    
        //verifica se la connessione è avvenuta con successo
        if (!$conn) {
            echo "Errore di connessione al database.";
            exit;
        } 

        switch ($op) {
            case 'insert':
            switch ($tbl) {
                case 'ospedale': //codosp, nomeosp, indirizzosp, tel
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Codice</td>
                            <td><input type='text' id='codosp' name='codosp'></td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td><input type='text' id='nomeosp' name='nomeosp'></td>
                        </tr>
                        <tr>
                            <td>Indirizzo</td>
                            <td><input type='text' id='indirizzosp' name='indirizzosp'></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type='tel' id='tel' name='tel'></td>
                        </tr>

                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";
                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
                case 'reparto'://codiceosp, nomerep, telrep, orariovisite
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Codice dell'ospedale</td>
                            <td><input type='text' id='codiceosp' name='codiceosp'></td>
                        </tr>
                        <tr>
                            <td>Reparto</td>
                            <td><input type='text' id='nomerep' name='nomerep'></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type='tel' id='telrep' name='telrep'></td>
                        </tr>
                        <tr>
                            <td>Orario Visite</td>
                            <td>
                                <select name='orariovisite'>
                                    <option value='10-12'>10-12</option> 
                                    <option value='14-16'>14-16</option>
                                    <option value='16-18'>16-18</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";

                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
                case 'medico': //codiceosp, rep, codfisc, nome, cognome, tel, anzianità
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Codice ospedale</td>
                            <td><input type='text' id='codiceosp' name='codiceosp'></td>
                        </tr>
                        <tr>
                            <td>Nome reparto</td>
                            <td><input type='text' id='rep' name='rep'></td>
                        </tr>
                        <tr>
                            <td>Codice fiscale</td>
                            <td><input type='text' id='codfisc' name='codfisc'></td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td><input type='text' id='nome' name='nome'></td>
                        </tr>
                        <tr>
                            <td>Cognome</td>
                            <td><input type='text' id='cognome' name='cognome'></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type='tel' id='tel' name='tel'></td>
                        </tr>
                        <tr>
                            <td>Anzianità</td>
                            <td><input type='number' id='anzianità' name='anzianità'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";

                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
                case 'infermiere': //codiceosp, rep, codfisc, nome, cognome, tel, tipo
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Codice ospedale</td>
                            <td><input type='text' id='codiceosp' name='codiceosp'></td>
                        </tr>
                        <tr>
                            <td>Nome reparto</td>
                            <td><input type='text' id='rep' name='rep'></td>
                        </tr>
                        <tr>
                            <td>Codice fiscale</td>
                            <td><input type='text' id='codfisc' name='codfisc'></td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td><input type='text' id='nome' name='nome'></td>
                        </tr>
                        <tr>
                            <td>Cognome</td>
                            <td><input type='text' id='cognome' name='cognome'></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type='tel' id='tel' name='tel'></td>
                        </tr>
                        <tr>
                            <td>Tipologia</td>
                            <td>
                                <select name='tipologia'>
                                    <option value='sanità pubblica'>Sanità pubblica</option> 
                                    <option value='pediatria'>Pediatria</option>
                                    <option value='psichiatria'>Psichiatria</option>
                                    <option value='area critica'>Area critica</option>
                                    <option value='geriatria'>Geriatria</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";

                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
                case 'esame': //codesame, descriz
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Codice esame</td>
                            <td><input type='text' id='codesame' name='codesame'></td>
                        </tr>
                        <tr>
                            <td>Descrizione</td>
                            <td><input type='text' id='descriz' name='descriz'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";

                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
                case 'paziente': //tesserasanitaria, nomepaz, cognomepaz, etàpaz, datanascita, indirizzopaz, telpaz, città, datadimiss
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Tessera sanitaria</td>
                            <td><input type='text' id='ts' name='ts'></td>
                        </tr>
                        <tr>
                            <td>Nome</td>
                            <td><input type='text' id='nome' name='nome'></td>
                        </tr>
                        <tr>
                            <td>Cognome</td>
                            <td><input type='text' id='cognome' name='cognome'></td>
                        </tr>
                        <tr>
                            <td>Età</td>
                            <td><input type='number' id='età' name='età'></td>
                        </tr>
                        <tr>
                            <td>Data di nascita</td>
                            <td><input type='date' id='nascita' name='nascita'></td>                        
                        </tr>
                        <tr>
                            <td>Indirizzo</td>
                            <td><input type='text' id='via' name='via'></td>
                        </tr>
                        <tr>
                            <td>Telefono</td>
                            <td><input type='tel' id='tel' name='tel'></td>
                        </tr>
                        <tr>
                            <td>Città</td>
                            <td><input type='text' id='città' name='città'></td>
                        </tr>
                        <tr>
                            <td>Data dimissione</td>
                            <td><input type='date' id='dimiss' name='dimiss'></td>
                        </tr>
                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";

                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
                case 'prenotazione': //tessanit, nomeamb, id, datapren, dataesame, oraesame, urgenza, regimecosto
                    echo "<form action='insert.php' method='POST'>
                        <table>
                        <tr>
                            <td>Tessera sanitaria</td>
                            <td><input type='text' id='tessanit' name='tessanit'></td>
                        </tr>
                        <tr>
                            <td>Nome dell'ambulatorio</td>
                            <td><input type='text' id='nomeamb' name='nomeamb'></td>
                        </tr>
                        <tr>
                            <td>Id</td>
                            <td><input type='text' id='id' name='id'></td>
                        </tr>
                        <tr>
                            <td>Data di prenotazione</td>
                            <td><input type='date' id='datapren' name='datapren'></td>
                        </tr>
                        <tr>
                            <td>Data dell'esame</td>
                            <td><input type='date' id='dataesame' name='dataesame'></td>
                        </tr>
                        <tr>
                            <td>Orario dell'esame</td>
                            <td><input type='time' id='oraesame' name='oraesame'></td>
                        </tr>
                        <tr>
                            <td>Urgenza
                                <td>
                                    <select name='urgenza'>
                                        <option value='verde'>Verde</option> 
                                        <option value='giallo'>Giallo</option>
                                        <option value='rosso'>Rosso</option>
                                    </select>
                                </td>
                            </td>
                        </tr>
                        <tr>
                            <td>Regime di costo
                                <td>
                                    <select name='regimecosto'>
                                        <option value='ssn'>ssn</option>
                                        <option value='privato'>privato</option>
                                    </select>
                                </td>
                            </td>
                        </tr>
                        <tr>
                            <td><input type='submit' value=Invio name='toinsert'><input type='reset' value='Reset'></td>
                        </tr>
                        </table>
                            <input type='hidden' name='tabella' value='$tbl'> 
                        </form>";

                        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                break;
            }
            break;

            case 'update':
                switch ($tbl) {
                    case 'ospedale':
                        $query = "SELECT * FROM ospedale";             
                        $result = pg_query($conn, $query);
                        
                        if (!$result) {
                            echo "Si è verificato un errore.<br/>";
                            echo pg_last_error($conn);
                            exit();
                        } else {
                            echo "<form action=\"update.php\" method=\"POST\">";
                                echo "<input type='hidden' name='tabella' value='$tbl'>";
                                echo "<input type='hidden' name='operazione' value='update'>";
                            echo "<table>";
                            echo "<tr>
                                <th>Codice</th>
                                <th>Nome</th>
                                <th>Indirizzo</th>
                                <th>Telefono</th>
                                <th></th>
                                </tr>";
                                while ($row = pg_fetch_assoc($result)) {
                                echo '<tr>
                                        <td>' . $row['codosp'] . '</td>
                                        <td>' . $row['nomeosp'] . '</td>
                                        <td>' . $row['indirizzosp'] . '</td>
                                        <td>' . $row['tel'] . '</td>
                                        <td><input type="radio" name="toupdate" value="' . $row['codosp'] . '" required></td>
                                    </tr>';
                                }                                
                            echo "</table>";
                                echo "<input type='submit' name='submit_update' value='Invio'>";
                            echo "</form>";
                            
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
                        };
                    pg_close($conn);
                    break;
                };
            break;

            case 'delete':
                switch ($tbl) {
                    case 'ospedale':
                        $query = "SELECT * FROM ospedale";
                        $result = pg_query($conn, $query);
                        if (!$result) {
                            echo "Si è verificato un errore.<br/>";
                            echo pg_last_error($conn);
                            exit();
                        } else {
                            echo "<form action='delete.php' method='POST'>";
                            echo "<table>";
                            echo "<tr>
                                <th>Codice</th>
                                <th>Nome</th>
                                <th>Indirizzo</th>
                                <th>Telefono</th>
                                <th></th>
                                </tr>";
                                while ($row = pg_fetch_assoc($result)) {
                                echo '<tr>
                                        <td>' . $row['codosp'] . '</td>
                                        <td>' . $row['nomeosp'] . '</td>
                                        <td>' . $row['indirizzosp'] . '</td>
                                        <td>' . $row['tel'] . '</td>
                                        <td><input type="radio" name="todelete" value="' . $row['codosp'] . '" required></td>
                                    </tr>';
                                }           
                                echo "<input type='hidden' name='tabella' value='$tbl'>";                     
                            echo "</table>";
                                echo "<input type='submit' name='submit_delete' value='Invio'>";
                            echo "</form>";
                        
                            echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";    
                            echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla home</p>";
                        };
                    break;
                }
            break;
        }; 
        pg_close($conn);
    } else { 
        echo "Non risultano dati passati<br>";
        echo "<p> Clicca <a href='operazioni.php'>qui</a> per tornare indietro</p>";
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare alla Home</p>";
    }  
    ?> 
</body>
</html>
