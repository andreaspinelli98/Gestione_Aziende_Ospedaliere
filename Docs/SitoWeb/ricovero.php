<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ricovero</title>
</head>

<body>
    <?php
        echo "<form action='vediricovero.php' method='POST'>";
        echo "<p> Inserire tessera sanitaria del paziente: ";
        echo "<input type='text' name='tessanit'>"; //è questo name che è passato nell'altra pagina
        
        echo "<input type='submit' value='Invio'>";//non serve mettare name qui dentro
        echo "</form>";
        echo "<p> Clicca <a href='home.html'>qui</a> per tornare indietro</p>";
    ?>
</body>
</html>