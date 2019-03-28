<html>
	<head>
		<title>Client</title>
		<meta charset="UTF8" >
	</head>

<body>

<p><a href ="Facture.php" ><input type="button" value="Editer la facture"> </a>  


<?php

// connexion à une base
$base= pg_connect("host=houplin user=cgarcia password=postgres dbname=cgBDV") or die('Erreur de Connection !<br />'.pg_last_error());

extract ($_POST);




$SelectLocation = "Select * from CONDUCTEUR, LOCATION, VOITURE where conduteur.numPermis=location.numPermis and location.numIm=voiture.numIm ";

pg_query($SelectLocation);



?>


</body>
</html>
	
	
	
    
