<html>
 <head>
  <title>Test PHP</title>
  <link rel="stylesheet" href="bootstrap.min.css" >
  <link href="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.css" rel="stylesheet">
  <script src="https://unpkg.com/material-components-web@v4.0.0/dist/material-components-web.min.js"></script>
  <link rel="stylesheet" href="style.css" />
 </head>
 <body>
 
     <div id="conteneur">    


 <?php
  $id = $_GET["id"];
  $idEleve = $_GET["idEleve"];
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
		//echo "existe il un enregistrement " .$bdd->query("SELECT COUNT(*) FROM Formulaire WHERE id='$id' and idEleve='$idElever'")->fetchColumn();

// On récupère tout le contenu de la table jeux_video
		$req='SELECT * FROM Formulaire where idFormulaire=';
		 $req .= $id;
		 $req .= ' and idEleve=';
		 $req .= $idEleve;
		 
		 //echo $req . "<br />";
		//echo $req;
		$reponse = $bdd->query($req);
		$dejafait = 0;
		while ($donnees = $reponse->fetch())
		{
			//echo $donnees['reponse'] ."<br />"; 
			$dejafait = $donnees['reponse'];
		}
		
		$reponse->closeCursor();

		
//echo "on a passé la requête " .$dejafait;

if ($dejafait == 0){
	


  if(!empty($_POST['eleve']) || !empty($_GET['id']))
  {
     //affiche quelque chose
	 if (!empty($_GET['id'])){
		 $choix = $id;
	 }else{
	     $choix = $_POST['eleve'];
	 }
	  //echo $choix;
	  
	  

		// Si tout va bien, on peut continuer

		// On récupère tout le contenu de la table jeux_video
		$req='SELECT * FROM Questionnaire where id=';
		 $req .= $choix;
		//echo $req;
				$reponse = $bdd->query($req);

		// On affiche chaque entrée une à une
		while ($donnees = $reponse->fetch())
		{
			?>
 
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
    while ($donnees = $reponse->fetch()){
		$livre = $donnees['nom'];
		?>
		
		<!--button onclick="window.location.href='choix-eleve.php?id=<?php echo $donnees['id']; ?>'"><?php echo $donnees['nom']; ?></button-->				
	<?php } 
	$reponse->closeCursor(); // Termine le traitement de la requête
?>

<h2>Question sur <?php echo $livre ?><button onclick="window.location.href='choix-eleve.php?id=<?php echo $idEleve ?>'">retour</button></h2>
<form action="#" method="post">
  <!--p><i>Complétez le formulaire. Les champs marqué par </i><em>*</em> sont <em>obligatoires</em></p-->

 
  <fieldset>
    <legend>Où Kimamila est il parti en voyage ?</legend>
	<!--div><label for=""><input id="" type="checkbox" name="foret" value="1">En fôret</label></div>
	<div><label for=""><input id="" type="checkbox" name="safari" value="1">Safari</label></div>
	<div><label for=""><input id="" type="checkbox" name="amerique" value="1">Amérique</label></div>
	<div><label for=""><input id="" type="checkbox" name="croisiere" value="1">Croisière</label></div>
	 <div class="md-checkbox">
    <input id="i2" type="checkbox" checked>
    <label for="i2">Item 1</label>
  </div>
  <div class="md-checkbox">
    <input id="i1" type="checkbox">
    <label for="i1">Item 2</label>
  </div-->
  <div><label class="pure-material-checkbox"><input type="checkbox" name="foret" value="1"><span>En fôret</span></label></div>
  <div><label class="pure-material-checkbox"><input type="checkbox" name="safari" value="1"><span>Safari</span></label></div>
  <div><label class="pure-material-checkbox"><input type="checkbox" name="amerique" value="1"><span>Amérique</span></label></div>
  <div><label class="pure-material-checkbox"><input type="checkbox" name="croisiere" value="1"><span>Croisière</span></label></div>

  </fieldset>
  <p><input type="submit" value="Valider" name="valider">
  </p>
</form>
   

 
  <?php
    if(isset($_POST['valider'])){ // Check if form was submitted

        $input = $_POST['binet']; // Get input text
        $message = "Success! You entered: " . $input . $_POST['chat'];
		
		$note = 0;
		if ($_POST['foret']==1){
			//echo "bonne réponse en forêt <br />";
			$note = $note+1;
		}else{
			//echo "mauvaise réponse. Dommage ! <br />";
		}
		
		if ($_POST['safari']==1){
			//echo "bonne réponse safari <br />";
			$note = $note+1;
		}else{
			//echo "mauvaise réponse. Dommage ! <br />";
		}
		
		if ($_POST['amerique']==1){
			//echo "mauvaise réponse safari <br />";
			$note = $note-1;
		}else{
			//echo "bonne réponse. <br />";
		}
		
		if ($_POST['croisiere']==1){
			//echo "bonne réponse safari <br />";
			$note = $note-1;
		}else{
			//echo "mauvaise réponse.  <br />";
		}
		
		if ($note < 0) {
			$note=0;
		}
	
		echo "ta note est : " . $note ."/2" ."<br />";
		
		
		//insert en base du résultat
		

		$req = $bdd->prepare('INSERT INTO `Formulaire`(`idEleve`, `idFormulaire`, `reponse`, `dateCreation`) VALUES (:idEleve,:idFormulaire,:reponse,CURRENT_TIMESTAMP())');



		$req->execute(array(
			'idEleve' => $idEleve,
			'idFormulaire' => $id,
			'reponse' => $note
			));
		

	}
}else{?>
<h2>Formulaire déjà rempli. ta note <?php echo $dejafait ?><button onclick="window.location.href='choix-eleve.php?id=<?php echo $idEleve ?>'">retour</button></h2>
 <?php }
?>

</div>
 </body>
</html>