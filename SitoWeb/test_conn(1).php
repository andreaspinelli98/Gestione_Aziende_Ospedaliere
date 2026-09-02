<html>
	<head>
		<title>Prova form</title>
		<link rel="stylesheet" type="text/css" href="form.css">
	</head>
<body>
		<p class="form">
<?php

$conn = pg_connect("host=localhost port=5432 dbname=progetto user=pgadmin password=unimi");
if (!$conn){
	echo 'Connessione al database fallita.';
	exit();
} else {
	echo "Connessione riuscita.<br/>";
	$query = "SELECT *
				FROM cliente;";
	echo "Sto per eseguire la seguente query: ".$query."<br/>";			
	$result=pg_query($conn, $query);
	$status = pg_result_status($result, PGSQL_STATUS_STRING);
	//$status = pg_result_error_field($res1, PGSQL_DIAG_SQLSTATE);
	echo 'pg_result_status($result): ' .$status."<br/>";
	if (!$result) {
		echo "Si è verificato un errore.<br/>";
		echo pg_last_error($conn);
		exit();
	} else {
			echo '<br><table>
        	<tr>
       			<th>Telefono</th>
       			<th>Nome</td>
       			<th>Cognome</th>
       			<th>Via</th>
       			<th>Numero</th>
       			<th>Interno</th>
       		</tr>';
		while ($row = pg_fetch_array($result)) {
		  	echo '<tr>
            	<td>'. $row['telc'].'</td>
            	<td>'. $row['nomec'].'</td>
            	<td>'. $row['cognomec'].'</td>
            	<td>'. $row['via'].'</td>          
            	<td>'. $row['nciv'].'</td>
            	<td>'. $row[6].'</td>          		
          	</tr>';
		};
		echo '</table>';
	};
};	
?>
	</p>
</body>
</html>
