<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operazioni</title>
</head>

<body>
    <?php 
        echo "<form action='form.php' method='POST'>";
        echo "<select name='tabella'>";
            echo "<option value='ospedale'>Ospedale</option>";            
            echo "<option value='reparto'>Reparto</option>";
            echo "<option value='medico'>Medico</option>";
            echo "<option value='infermiere'>Infermiere</option>";
            echo "<option value='esame'>Esame</option>";
            echo "<option value='paziente'>Paziente</option>";
            echo "<option value='prenotazione'>Prenotazione</option>";
        echo "</select>";

        echo "<select name='operazione'>";
            echo "<option value='insert'>Insert</option>";
            echo "<option value='update'>Update</option>";
            echo "<option value='delete'>Delete</option>";
        echo "</select>";

        echo "<input type='submit'>";
        echo "</form>";
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare indietro</p>";
    ?>
</body>
</html>
