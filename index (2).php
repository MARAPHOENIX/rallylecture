<html>
 <head>
  <title>Test PHP</title>
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

// Si tout va bien, on peut continuer

// On récupère tout le contenu de la table jeux_video
$reponse = $bdd->query('SELECT * FROM Eleves');

// On affiche chaque entrée une à une
while ($donnees = $reponse->fetch())
{
?>
    <p>
    <strong>Jeu</strong> : <?php echo $donnees['nom']; ?><br />
    Eleve : <?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?>
   </p>
<?php
}

$reponse->closeCursor(); // Termine le traitement de la requête


?>

<label for="manager">Eleve </label>
                  <select name="eleve"  id="eleve" required>
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
 <?php
	
  if(!empty($_POST['eleve']))
  {
     //affiche quelque chose
	 //echo $_POST['eleve']
	 echo "Merci de valider le formulaire";
  } else{
     //affiche autre chose
	 //echo titi
	 	 echo "Merci de valider";

  }
?>

 
 </body>
</html>