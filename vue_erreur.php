<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>
<head>
<title>ERRORS</title>
 <meta NAME="Author" CONTENT="M">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
 <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
 </head>
 <?php
 $erreur=$_GET["erreur"];
echo "<p class='erreur'>$erreur</p>";
 ?>
 <!-- Lien pour retourner à la page initiale -->
 <a href="index.php" class="back">BACK</a>
<body>
</html>