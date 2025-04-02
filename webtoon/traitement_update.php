<?php
// page de controle de saisie, et appel de fonction d'insertion dans la base

// recuperation des variables du formulaire 
$id=$_POST["id"];
$nom=$_POST["nom"];
$prenom=$_POST["prenom"];
// Vérification des champs nom et prenom (si il ne sont pas vides ?)
if( empty($nom) || empty($prenom)  )  // le signe || signifie OU
{
	$message_erreur="ATTENTION : Le champ nom ou prénom n'a pas été rempli correctement, veuillez vérifier";
	// redirection vers la page vue erreur
	header("Location: vue_erreur.php?erreur=$message_erreur");
	exit(); // interruption après redirection
	
}
else // $nom et $prenom sont corrects  
{
	include 'fonctions.php'; // fichier externe contenant les fonctions d'accès à la base de données
	
	$nb_lignes=update_membre($id, $nom, $prenom); // appel de fonction de modification (couche Modele)

	if($nb_lignes > 0) // on a inséré 1 ligne
	{
		header("Location:vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
		exit(); // interruption de la fonction après redirection
	}
	else // il y a eu une erreur
	{
		$message_erreur="Aucune modification";
		// redirection vers la page vue erreur
		header("Location: vue_erreur.php?erreur=$message_erreur");
	}		
	
	
} // fin si empty nom


?>
