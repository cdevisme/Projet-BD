<html>
	<head>
		<title>Retour</title>
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

echo '

	<p> Merci d avoir utilisé notre service </p>
	
	<form method=post action="Validation.php">
	<fieldset>
	
    <legend>Enregistrement retour </legend>
    
    <p><label>Numéro de permis</label> <input type="text" placeholder="Entrez un n° valide" autofocus required name="numPermis"> </p>
    
    <p><label>Date depart :<input type="date" name="dateDebut" required="required"/> Date retour prevus :<input type="date" name="dateRetourPrev" required="required"/></p>
        
        <p><label>Nombre de kilometres prevus : </label><input type="text" name="nbKmPrev" /> km
    
     <p> <label>Date retour effective : <input type="date" name="dateRetourEff" required="required"/> </p>
     
     <p> <label> Nombre de kilomètres réellement parcourus </label><input type="int"  required name="nbKmEff"/> </p>
     
     <p> <label> Quel emplacement </label><input type="text"  required name="nomM"/> </p>
     
    
	</fieldset>
	
	<p><label>Besoin nettoyage : </label> <input type ="checkbox" name="categorie" value="nettoyage"/>  </p>
	<p><label>Besoin révision : </label><input type ="checkbox" name="categorie" value="revision"/> </p>
	
	 <p><input type="button" value=" Valider"> </a> </p>
</form>
';

// fermeture connexion
pg_close($base);

 
 ?>

</body>


</html>
