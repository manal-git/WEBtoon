<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"  "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Mon annuaire en PHP</title>
 <meta NAME="Author" CONTENT="M">
<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
  <!-- appel feuille de style -->
 <link href="style_op.css" type="text/css" rel="stylesheet" media="all">
 <img class="logo" src="logo.png">
</head>
<body>

<h1 class="titre">SIGN UP</h1>
<form method='POST' action='traitement.php' name='annuaire' enctype='application/x-www-form-urlencoded'>

<div class="sub1">
<tr>
	<td>PSEUDO : </td>
	<td><input type='text' name='pseudo' size='20'></td>
</tr>

<tr>
	<td>EMAIL ADDRESS : </td>
	<td><input type='text' name='email' size='50' value=''></td>
</tr>

<tr>
	<td>AGE : </td>
	<td><input type='number' name='age' size='2' value=''></td>
</tr>

</div>

<div class="sub2">

<tr>
	<td>PASSWORD : </td>
	<td><input type='password' name='password' size='20' value=''></td>
</tr>

<tr>
	<td>COMFIRM PASSWORD : </td>
	<td><input type='password' name='confirm_pass' size='20' value=''></td>
</tr>

</div>

<tr>
<a href="index.php" class="back">BACK</a>
<td colspan="2"><input type='submit' value='SIGN UP'class="signup"></td>
</tr>

</form>


</body>
</html>