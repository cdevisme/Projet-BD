<html>
	<head>
		<title>Supprimer une voiture</title>
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

echo'
	<p> Bienvenue  </p>
	<form action="SupVoit2.php" method=POST >
	
	 <p><label> Numéro d immatriculation </label><input type="text"  required name="numIm"/></p>
	 
	 <p><input type ="submit" value="Supprimer" id="supprimer"/></p>
	 
	 </form>
	 
	
	 ';
	  ?>
	  
</body>
</html>
