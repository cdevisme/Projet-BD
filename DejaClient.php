<html>
	<head>
		<title>Je suis client</title>
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

echo '<p>Bonjour client!  </p>
	
    <form action="ReserverDC.php" method=POST>
    
        <fieldset>
        <legend>Enregistrement client</legend>
            <p>
                <label>Nom </label><input type="text" name="nom" required autofocus>
                <label> Prénom </label><input type="text" name="prenom" required>
            </p>
    
        
            <p>
                <label>Numéro de permis</label> <input type="text" placeholder="Entrez un n° valide" autofocus required name="numPermis"> 
            </p>
            
           
            
        </fieldset>
        
        <fieldset>
	
    <legend>Critères réservation</legend>
    
        <p><label>Nombre de places souhaites minimum : </label>
            <SELECT name="nbPlaces" >
                <OPTION>2
                <OPTION>3
                <OPTION>4
                <OPTION>5
                <OPTION>6
                <OPTION>7
                <OPTION>8
                <OPTION>9
            </SELECT>
        </p>
    
        <p><label> Categorie : </label><input type ="radio" name="categorie" value="Citadine">Citadine<input type ="radio" name="categorie" value="Berline">Berline<input type ="radio" name="categorie" value="Monospace">Monospace/Suv<input type ="radio" name="categorie" value="Minibus">Minibus</p>
        
        <p><label>Date depart :<input type="date" name="dateDebut" required="required"> Date retour :<input type="date" name="dateRetourPrev" required="required"></p>
        
        <p><label>Nombre de kilometres prevus : </label><input type="text" name="nbKmPrev" > km
            
        </p>
        
          
        </fieldset>
        <p> <input type="submit" value="Reserver"> </a> </p>
</form>

' ; 
  ?>

</body>


</html>
