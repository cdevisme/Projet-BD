
<html>
	<head>
		<title>Ajouter une voiture</title>
        <meta charset="UTF8" >
	</head>

<body>

<?php

// connexion à une base
$base= pg_connect("host=houplin.studserv.deule.net user=cgarcia password=postgres dbname=cgBDV3") or die('Erreur de Connection !<br />'.pg_last_error());



//Initialisation variable

$numIm = $_POST['numIm']; 
$nbKm = $_POST['nbKm']; 
$nbPlaces = $_POST['nbPlaces']; 
$marque = $_POST['marque']; 
$categorie = $_POST['categorie']; 
$empl = $_POST['empl']; 


//requete 
$NumeroCat= "Select numCat from CATEGORIE where CATEGORIE.libelle='".$categorie."'";
$nCat=pg_query($base, $NumeroCat);
$numcat = pg_fetch_array($nCat);
$numerocate=$numcat['numcat'];

$NumeroMar= "Select numM from MARQUE where MARQUE.nomM='".$marque."'";
$nA=pg_query($base, $NumeroMar);
$numM = pg_fetch_array($nA);
$numeroMarque=$numM['numm'];

$AjoutVoiture= "insert into VOITURE values ('".$numIm."',".$nbKm.",".$nbPlaces.",'".$numerocate."','".$numeroMarque."');";

$AjoutSit="insert into SITUATION values ('$numIm','$empl');";

$ChgtEmp="update emplacement set vide='f' where numemp='$empl' ;";

if($result = pg_query($AjoutVoiture)) { 
    echo "Voiture ajoutée"; 
    }
else { 
echo "Erreur de requete" ;
}
echo '<br>';
if($result2 = pg_query($AjoutSit)) { 
    echo ""; 
    }
else { 
echo "Erreur de requete" ;
}
echo '<br>';
if($result3 = pg_query($ChgtEmp)) { 
    echo ""; 
    }
else { 
echo "Erreur de requete" ;
}

// fermeture connexion
pg_close($base);

?>
 </body>       
</html>
