<html>
 <head>
  <title>Test PHP</title>
          <link rel="stylesheet" href="style.css" />
 
 </head>
 <body>
    <div id="conteneur">    

 <h1> <span> Rally lecture CP/CE1</span></h1>
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


?>
<!--form method="post" action="choix-eleve.php"-->
       

<?php 
	$reponse = $bdd->query('SELECT * FROM Eleves');;
    while ($donnees = $reponse->fetch()){?>
		<button onclick="window.location.href='choix-eleve.php?id=<?php echo $donnees['id']; ?>'"><?php echo $donnees['prenom']; ?></button>				
	<?php } 
	$reponse->closeCursor(); // Termine le traitement de la requête
?>
		
</div>
 </body>
</html>