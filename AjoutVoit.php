
<html>
	<head>
		<title>Ajouter une voiture</title>
        <meta charset="UTF8" >
	</head>

<body>

<?php

// connexion à une base
$base= pg_connect("host=houplin.studserv.deule.net user=cgarcia password=postgres dbname=cgBDV3");
if(!$base){
echo("Erreur de connexion");
exit; 
} 

$emp = "select numEmp from EMPLACEMENT where emplacement.vide='t';";
$marque="select nomM from MARQUE;";
   
   $result = pg_query($base, $marque) ; 
   
   $r= pg_query($base, $emp) ; 
   $vide =pg_fetch_array($r) ;
   
   
   

   
if ($result = pg_query($base, $marque)){

echo'
	<p>Bienvenue  </p>
	
    <form method=post action="AjoutVoit2.php">
    
        <fieldset>
        <legend>Ajouter une voiture</legend>
            <p>
                <label> Numéro d immatriculation </label><input type="text"  required name="numIm">
            </p>
            <p>
                <label> Nombre kilométre </label><input type="integer"  required name="nbKm">
            </p>
            <p>
                <label> Nombre place </label><input type="integer"  required name="nbPlaces">
            </p>
            
            <p><label> Marque </label>
            <select name="marque"> <option value =""></option> ';
             while($num =pg_fetch_row($result)) {
                echo '<option value = '.$num[0].'> '.$num[0].' </option> '; 
             }
            

                echo '</select>
            </p>
                     
            <p>
                <label> Categorie : </label><input type ="radio" name="categorie" value="Citadine">Citadine<input type ="radio" name="categorie" value="Berline">Berline<input type ="radio" name="categorie" value="Monospace">Monospace/Suv<input type ="radio" name="categorie" value="Minibus">Minibus</p>
            
            <p><label> Emplacement libre </label>
            <select name="empl"> <option value =""></option> ';
             while($vide =pg_fetch_array($r)) {
                echo '<option value = '.$vide[0].'> '.$vide[0].' </option> '; 
             }
            

                echo '</select>
            
            </fieldset>
            
            <p><input type ="submit" value="Ajouter" id="ajout"></p>
    
        </form>
        ';
         }
    else {
    echo "Erreur de requete" ;
}

        ?>
 </body>       
</html>
