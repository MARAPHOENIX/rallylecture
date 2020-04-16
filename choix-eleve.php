<html>
 <head>
  <title>Test PHP</title>
  <link rel="stylesheet" href="style.css" />
 </head>
 <body>
     <div id="conteneur">    

 

 <?php
  $id = $_GET["id"];
  //echo "id : " .$id;

  if(!empty($_POST['eleve']) || !empty($_GET['id']))
  {
     //affiche quelque chose
	 if (!empty($_GET['id'])){
		 $choix = $id;
	 }else{
	     $choix = $_POST['eleve'];
	 }
	  //echo $choix;
	  
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
		$req='SELECT * FROM Eleves where id=';
		 $req .= $choix;
		//echo $req;
				$reponse = $bdd->query($req);

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
			?>
	 <h1> <span> Livres du rally</span></h1>
    <h2>
     <?php echo $donnees['prenom']; ?> <?php echo $donnees['nom']; ?>
   </h2>
<?php
		}
		
		$reponse->closeCursor();
		
  } else{
     //affiche autre chose
	 //echo titi
	 	 echo "Merci de Choisir un eleve"; ?>
		 <br/>
		<a href="index.php">Choisir un élève</a>
  <?php
  }
?>


<?php 
	$reponse = $bdd->query('SELECT * FROM Questionnaire');;
    while ($donnees = $reponse->fetch()){?>
		<button onclick="window.location.href='questionnaire.php?id=<?php echo $donnees['id']; ?>&idEleve=<?php echo $id; ?>'"><?php echo $donnees['nom']; ?></button>				
	<?php } 
	$reponse->closeCursor(); // Termine le traitement de la requête
?>
 </div>
 </body>
</html>