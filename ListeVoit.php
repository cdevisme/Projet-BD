
<html>
	<head>
		<title>Mes voitures</title>
		<meta charset="UTF8" >
	</head>

<body>
<?php

$connect = pg_connect("host=houplin.studserv.deule.net user=cgarcia password=postgres dbname=cgBDV3"); 
if (!$connect) {
echo "Erreur de connexion" ; 
exit ; 
} 

$requet = 'select voiture.numim, voiture.nbkm, voiture.nbplaces, categorie.libelle from voiture join categorie  on voiture.numCat=categorie.numCat order by categorie.libelle;' ; 

$result = pg_query($connect, $requet) ; 

if($result = pg_query($requet)) { 
    echo "<p> La liste des voiture </p>" ; 
    echo "<form><table border=1> <tr> <td> Numero immatriculation </td> <td> Nb kilomètre </td> <td> nb Place </td> <td> Categorie </td> </tr> " ; 
    while($ligne =pg_fetch_array($result)) {
        $numIm = $ligne ['numim'] ;
        $km = $ligne ['nbkm']; 
        $place = $ligne ['nbplaces']; 
        $cat = $ligne ['libelle']; 
        echo "<tr> <td> $numIm </td> <td>  $km </td> <td>  $place </td> <td>  $cat </td> </tr>" ; 
        }
        echo "</table>" ;
    echo "</form>";
    }
else { 
echo "Erreur de requete" ;
}

// fermeture connexion
pg_close($connect);

 
 ?>
 
</body>


</html>
