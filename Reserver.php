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


$numPermis = $_POST['numPermis']; 
$nom = $_POST['nom']; 
$prenom = $_POST['prenom']; 
$dateNais = $_POST['dateNais']; 
$adresse = $_POST['adresse']; 
$mail = $_POST['mail']; 
$portable = $_POST['portable']; 
$fixe = $_POST['fixe']; 
$numId= $_POST['numId']; 
$cp= $_POST['cp']; 
$categorie = $_POST['categorie']; 
$dateDebut = $_POST['dateDebut']; 
$dateRetourPrev = $_POST['dateRetourPrev']; 
$nbKmPrev = $_POST['nbKmPrev'];  
$nbPlaces = $_POST['nbPlaces']; 
 

$AjoutInfoClient= "insert into CONDUCTEUR values ('".$numPermis."','".$nom."','".$prenom."','".$dateNais."','".$adresse."','".$mail."','".$portable."','".$fixe."','".$numId."','".$cp."');";


$PrixKM="Select prixKm from CATEGORIE where CATEGORIE.libelle='$categorie'";
$NumeroCat= "Select numCat from CATEGORIE where CATEGORIE.libelle='".$categorie."'";
    


$RechercheVehicule= "Select * from VOITURE join CATEGORIE on VOITURE.numCat=CATEGORIE.numcat where CATEGORIE.libelle= $categorie and VOITURE.nbPlaces= $nbPlaces" ;

// exécution requête

if($result = pg_query($AjoutInfoClient)) { 
    echo "Client ajoute"; 
    }
else { 
echo "Erreur de requete" ;
}

$nCat=pg_query($base, $NumeroCat);
$numcat = pg_fetch_array($nCat);
$numerocate=$numcat['numcat'];


$PrixKM=pg_query($PrixKM) or die ("Erreur SQL !<br />$PrixKM<br />".pg_last_error()) ;
$accompte= $PrixKM * $nbKmPrev;
$NumeroCat=pg_query($NumeroCat) or die ("Erreur SQL !<br />$NumeroCat<br />".pg_last_error()) ;

$AjoutReserv="insert into RESERVATION values ('$dateDebut','$dateRetourPrev',$nbKmPrev,$accompte,'$numPermis','$numerocate')";

echo '<br>';
if($result = pg_query($AjoutReserv)) { 
    echo "Reservation ajoute"; 
    }
else { 
echo "Erreur de requete" ;
}

echo '<br>';
echo "L accompte est de '".$accompte."' euros";

// fermeture connexion
pg_close($base);

 
 ?>
 
</body>


</html>
