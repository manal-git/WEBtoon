<?php
   $monserveur = "localhost";	// adresse du serveur sql que vous utilisez. ex : "sql.free.fr" ; "localhost" sur WAMP 
   $monlogin = "root";	// login de la base de données. "root" sur WAMP en local	
   $monpass = "";		// mot de passe de la base de données. vide sur WAMP en local
   $mabase="webtoon";	// nom de la base ;suivant ce que vous avez créé comme base dans WAMP)

	// connexion au SGBD
	date_default_timezone_set('Europe/Paris');
   $lien_base = mysqli_connect($monserveur, $monlogin, $monpass, $mabase) or die('Error connecting to MySQL server: ' . mysqli_connect_error());
	mysqli_set_charset ( $lien_base ,  'utf8' );
	
?>