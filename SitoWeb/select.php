<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scegli</title>
</head>

<body>
    <?php   
        echo "<form action='visualizza.php' method='POST'>";
        echo "<select name='tabella'>";
            echo "<option value='ospedale'>Ospedale</option>";
            echo "<option value='medico'>Medico</option>";
            echo "<option value='infermiere'>Infermiere</option>";
        echo "</select>";

        echo "<select name='operazione'>";
            echo "<option value='select'>Select</option>";
        echo "</select>";
        
        echo "<input type='submit' name='invio' value='Invio'>";
        echo "</form>";
        
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare indietro</p>";
    ?>
</body>
</html>