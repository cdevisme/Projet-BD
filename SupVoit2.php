<html>
	<head>
		<title>Client</title>
		<meta charset="UTF8" >
	</head>

<body>
<?php

// connexion à une base
$base= pg_connect("host=houplin.studserv.deule.net user=cgarcia password=postgres dbname=cgBDV3") or die('Erreur de Connection !<br />'.pg_last_error());



//Initialisation variable


$numIm = $_POST['numIm']; 


// On recupère l'emplacement de la voiture selectionné
$Emp="Select numEmp from SITUATION where situation.numIm='".$numIm."';";
$nEmp=pg_query($base, $Emp);
$numemp = pg_fetch_array($nEmp);
$numeroemp=$numemp['numemp'];

if($result1 = pg_query($Emp)) { 
    echo " "; 
    }
else { 
echo "Erreur de requete" ;
}
echo '<br>';

// On change la valeur de l'attribut vide de la classe emplacement
// L'emplacement devient vide puisque il n'y a plus de voiture
$ChgtEmp="update emplacement set vide='t' where numemp='$numeroemp' ;";
if($result2 = pg_query($ChgtEmp)) { 
    echo " "; 
    }
else { 
echo "Erreur de requete" ;
}
echo '<br>';


// On supprime la voiture choisi
$SupVoit=" Delete from VOITURE where numIm='$numIm';";

if($result = pg_query($SupVoit)) { 
    echo "Voiture Supprimée"; 
    }
else { 
echo "Erreur de requete" ;
}
echo '<br>';
echo '<br>';
echo "L'emplacement '".$numeroemp."' est disponible";




// fermeture connexion
pg_close($base);

?>
</body>


</html>
