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
	
    <form action="Reserver.php" method=POST>
    
        <fieldset>
        <legend>Enregistrement client</legend>
            <p>
                <label>Nom </label><input type="text" name="nom" required autofocus>
                <label> Prénom </label><input type="text" name="prenom" required>
            </p>
    
            <p>
                <label> Date de Naissance </label><input type="date" max="2000-01-01" min="1920-01-01" name="dateNais"  required >
            </p>
            
            <p>
                <label> Numéro carte d identité ou de passeport </label><input type="text"  required name="numId">
            </p>
        
            <p>
                <label>Numéro de permis</label> <input type="text" placeholder="Entrez un n° valide" autofocus required name="numPermis"> 
            </p>
            
            <fieldset> 
                <legend>Adresse </legend>
                
                <p>
                    <label> N° et libellé de voie </label><input type="text" name="adresse" required >
                </p>
                    
                <p>
                    <label> Code postal </label><input type="text"  name="cp"  required>
                    <label> Ville </label><input type="text" name="ville" required>
                </p>
                
                </fieldset>
            
            <fieldset>
                <legend>Coordonnées </legend>
            
                <p>
                    <label> Mail </label><input type="email" name="mail" required>
                </p>
                
                <p>
                    <label> Numéro de portable </label><input type="text" name="portable">
                </p>
                
                <p>
                    <label> Numéro de fixe </label><input type="text" name="fixe">
                </p>
            
            </fieldset>
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
