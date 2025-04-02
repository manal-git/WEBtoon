<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>
<head>
<title>Club de bridge</title>
 <meta NAME="Author" CONTENT="M">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <!-- appel feuille de style -->
 <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
 </head>
 <body>
 <h1>Recherche</h1>
 <!-- en-tête du tableau -->
 <table>
 <?php
 $id=$_POST["id"];
 
 include 'fonctions.php';
 $adherent = array(); // création du tableau des adhérents (vide à ce stade)
 $adherent = obtenir_par_id($id); // appel de la fonction
$nb = count($adherent); // nombre trouvé
if($nb==0) // aucun pour cet ID
{
	echo "</table>";
	echo "<p>Aucun membre trouvé</p>";
	die(); // arret
}
else  // $nb > 0 donc on a trouvé  1
{
		$id=$adherent['id'];			// extraction des champs de la ligne
		$prenom=$adherent['prenom'];
		$nom=$adherent['nom'];
		echo "<form method='POST' action='traitement_update.php' name='annuaire' enctype='application/x-www-form-urlencoded'>";
		echo "<tr><td>ID<td>$id</td></tr>"; // ID non modifiable
		echo "<input type='hidden' name='id' value='$id'>"; // input caché non modifiable
		
		echo "<tr><td>Nom<td><input type='text' name='nom' size='20' value='$nom'></td></tr>";
		echo "<tr><td>Prenom<td><input type='text' name='prenom' size='20' value='$prenom'></td></tr>";
} // fin if... else...
 ?>
 <tr>
<td colspan="2"><input type='submit' value='Enregistrer'></td>
</tr>

 </form>
 </table>
 
 <ul>
	<li><a href='index.php'>retour accueil</a></li>
</ul>
 </body>
</html>