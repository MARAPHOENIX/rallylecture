<html>
 <head>
  <title>Test PHP</title>
          <link rel="stylesheet" href="style.css" />
 
 </head>
 <body>
 
 
 <?php echo '<p>Bonjour le monde</p>'; ?>
 

 
 <?php
try
{
	// On se connecte à MySQL
$bdd = new PDO('mysql:host=sql313.byethost.com;dbname=b12_25417220_eleves;charset=utf8', 'b12_25417220', 'Raphael23102013');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}



// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Eleves');


//requête insert with param
/* $idEleve = 3;
$idFormulaire = 2;
$reponseForm = '1 3 5 6';

$req = $bdd->prepare('INSERT INTO `Formulaire`(`idEleve`, `idFormulaire`, `reponse`, `dateCreation`) VALUES (:idEleve,:idFormulaire,:reponse,CURRENT_TIMESTAMP())');



$req->execute(array(
	'idEleve' => $idEleve,
	'idFormulaire' => $idFormulaire,
	'reponse' => $reponseForm
	));

echo 'Le jeu a bien été ajouté !';  */




// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{

}

$reponse->closeCursor(); // Termine le traitement de la requête


?>
<!--form method="post" action="choix-eleve.php"-->
       
<label for="manager">Eleve </label>
                  <select name="eleve"  id="eleve" required>
				  <option value="0"> 
						Choisissez
					</option>
<?php 
$reponse = $bdd->query('SELECT * FROM Eleves');;
                              while ($donnees = $reponse->fetch())
									{
									?>
					<option value="<?php echo $donnees['id']; ?>"> 
					
					    <?php echo $donnees['prenom'],' ', $donnees['nom'] ; ?>
					</option>
					<?php } ?>
		</select>
		
		  <div>
            <!--input type="submit" value="Rechercher" /-->
 			<!--button class="favorite styled" 
				type="submit">
				Rechercher
			</button>
			
			<button class="favorite styled" 
				type="submit">
				Rechercher
			</button>
			
			<button><a href="choix-eleve.php?id=1">Mickaël</a></button--> 
			
			<button onclick="window.location.href='choix-eleve.php?id=1'">Maëlle</button>
			<button onclick="window.location.href='choix-eleve.php?id=2'">Raphaël</button>
			<button onclick="window.location.href='choix-eleve.php?id=3'">Mickaël</button>
			<button onclick="window.location.href='choix-eleve.php?id=4'">Sophia</button>

        </div>
    <!--/form-->
 

 
 </body>
</html>