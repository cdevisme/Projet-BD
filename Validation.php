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

//Initialisation variable
$dateDebut=" ";
$dateRetourPrev=" ";
$dateRetourEff=" ";
$nbKmPrev=" ";
$nbKmEff=" ";


$AjoutLocation = "Insert into LOCATION values ($dateDebut, $dateRetourPrev, $dateRetourEff,$nbKmPrev,$nbKmEff,null,$numPermis,)";

if($result = pg_query($AjoutLocation)) { 
    echo "Retour effectué"; 
    }
else { 
echo "Erreur de requete" ;
}

?>
</body>
</html>
	
	
	
    
