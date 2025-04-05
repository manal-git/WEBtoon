<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>
<head>
<title>Annuaire : Affichage d'erreur</title>
 <meta NAME="Author" CONTENT="M">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <!-- appel feuille de style -->
 <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
 </head>
 <!-- ci-dessous traitement du retour d'information après insertion -->
<?php
// récupération du nombre de lignes traitées - dans le cas où on est après une insertion
	$n=$_GET["nb"]; // récupère la valeur transmise dans $url
	echo "<p class='resultat'>Confirmation<br />
	Les valeurs ont bien été enregistrées dans la table membres<br />
	$n lignes insérées</p>";
?>
 <!-- Lien pour retourner à la page initiale -->
 <a href="index.php">Retour accueil</a>
<body>
</html>