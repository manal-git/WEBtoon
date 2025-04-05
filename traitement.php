<?php
// page de controle de saisie, et appel de fonction d'insertion dans la base


$pseudo=$_POST["pseudo"];
$email=$_POST["email"];
$age=$_POST["age"];
$password=$_POST["password"];

// Vérification des champs nom et prenom (si il ne sont pas vides ?)
if( empty($pseudo) || empty($email) ||empty($age) || empty($password) )  // le signe || signifie OU
{
	$message_erreur="please fill all the fields";
	header("Location: vue_erreur.php?erreur=$message_erreur");
	exit(); 
	
}
else 
{
	include 'fonctions.php'; // fichier externe contenant les fonctions d'accès à la base de données
	
	$nb_lignes=insert_utilisateur(pseudo: $pseudo, prenom: $prenom); // appel de fonction d'insertion (couche Modele)

	if($nb_lignes > 0) // on a inséré 1 ligne
	{
		header("Location:vue_confirmation.php?nb=$nb_lignes"); // page de confirmation
		exit(); // interruption de la fonction après redirection
	}
	else // il y a eu une erreur
	{
		$message_erreur="Erreur lors de l'insertion des données";
		// redirection vers la page vue erreur
		header("Location: vue_erreur.php?erreur=$message_erreur");
	}		
	
	
} // fin si empty nom


?>
