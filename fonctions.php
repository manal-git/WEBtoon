<?php

// page contenant les différentes fonctions d'accès à la base

//_______________________________________________________________
function insert_membre($nom, $prenom) // insere un nouveau membre  dans la table membres
{
	include 'param_connexion.php'; // fichier externe car la connexion est utilisée dans différentes pages
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete d'insertion MYSQL. 
	$requete= "INSERT INTO membres (nom,prenom) VALUES ('$nom','$prenom');";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur=mysqli_query($lien_base, "$requete");
	if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	{	
		$message_erreur="Impossible d'executer la requete: $requete " . mysqli_error($lien_base);
		echo $message_erreur;
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)

	}

	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1


 } // fin fonction insert_membre
 //_______________________________________________________________
 
 
  //_______________________________________________________________
 function obtenir_liste_des_adherents() // fonction qui renvoie un tableau de tous les adherents
 {
	require 'param_connexion.php'; // pour connexion au SGBD
	
	$les_adherents = array(); // création du tableau
	$requete="select * from membres";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error());
	}
	else // SELECT réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes du SELECT
		$i=1; // compteur
		while($i<=$nb_lignes)
		{
			// ajout des résultats du select
			$les_adherents[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
		
	}

	return $les_adherents;// le tableau sera vide en cas d'erreur
}// fin fonction()

//_________________________________________________________________

  //_______________________________________________________________
 function obtenir_recherche_par_nom($nom) // fonction qui renvoie un tableau de tous les adherents
 {
	require 'param_connexion.php'; // pour connexion au SGBD
	
	$les_adherents = array(); // création du tableau
	$requete="select * from membres where nom like '%$nom%'";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error());
	}
	else // SELECT réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes du SELECT
		$i=1; // compteur
		while($i<=$nb_lignes)
		{
			// ajout des résultats du select
			$les_adherents[] = mysqli_fetch_array($resultat_sql); 
			$i=$i+1; // incrémentation
		}
		
	}

	return $les_adherents;// le tableau sera vide en cas d'erreur
}// fin fonction()
//______________________________________
  function obtenir_par_id($id) // fonction qui renvoie un  adherent
 {
	require 'param_connexion.php'; // pour connexion au SGBD
	
	$adherents = array(); // création du tableau (le résultat du SELECT est toujours un tableau)
	$adherent=array(); // tableau pour extraire le 1er adherent trouvé
	$requete="select * from membres where id=$id";
	$resultat_sql = mysqli_query($lien_base, "$requete");
	if($resultat_sql == false) // si impossible d'exécuter la requête SELECT
	{	
		die("Impossible d'executer la requete: $requete " . mysqli_error());
	}
	else // SELECT réussi : il ne peut y avoir qu'un adherent
	{
			$adherents[] = mysqli_fetch_array($resultat_sql);
			$adherent=$adherents[0];
			
	}
	return $adherent;// le tableau sera vide en cas d'erreur
}// fin fonction()
//________________________________________

//_______________________________________________________________
function update_membre($id,$nom, $prenom) // insere un nouveau membre  dans la table membres
{
	include 'param_connexion.php'; // fichier externe car la connexion est utilisée dans différentes pages
	$nb_lignes=0; // initialisation de la variable à zéro
	
	// Requete d'insertion MYSQL. 
	$requete= "UPDATE  membres set nom='$nom', prenom='$prenom' where id=$id";
	
	// tentative d'execution de la requete INSERT dans la base
	$reponse_serveur=mysqli_query($lien_base, "$requete");
	if($reponse_serveur==false) // si false : impossible d'exécuter la requête INSERT
	{	
		$message_erreur="Impossible d'executer la requete: $requete " . mysqli_error($lien_base);
		echo $message_erreur;
		die();
		header("Location:vue_erreur.php?erreur=$message_erreur"); // page d'affichage d'erreur
		exit(); // interruption de la fonction après redirection
	}
	else // insert réussi
	{
		$nb_lignes=mysqli_affected_rows($lien_base); // compte le nombre de lignes affectées (normalement 1 ligne insérée)

	}

	return $nb_lignes ; // renvoie le nb de lignes insérées : normalement 1


 } // fin fonction update_membre

   ?>