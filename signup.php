<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
	<title>Sign up</title>
	<meta NAME="Author" CONTENT="M">
	<meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
	<!-- appel feuille de style -->
	<link href="style_op.css" type="text/css" rel="stylesheet" media="all">
	<img class="logo" src="logo.png">
</head>

<body>
	<h1 class="left-titre">SIGN UP</h1>
	<form method='POST' action='traitement.php' name='annuaire' enctype='application/x-www-form-urlencoded' class="signup-form">
		<div class="signup-fields">
			<div class="sub1">
				<div class="field-label">
					<label for="pseudo">
						PSEUDO :
					</label>
					<input type='text' name='pseudo' size='20'>
				</div>
				<div class="field-label">
					<label for="email">
						EMAIL ADDRESS :
					</label>
					<input type='text' name='email' size='50' value=''>
				</div>
				<div class="field-label">
					<label for="age">
						AGE :
					</label>
					<input type='number' name='age' size='2' value=''>
				</div>
			</div>
			<div class="sub2">
				<div class="field-label">
					<label for="password">
						PASSWORD :
					</label>
					<input type='password' name='password' size='20' value=''>
				</div>
				<div class="field-label">
					<label for="confirm_pass">
						COMFIRM PASSWORD :
					</label>
					<input type='password' name='confirm_pass' size='20' value=''>
				</div>
			</div>
		</div>
		<div>
			<a href="index.html" class="back">BACK</a>
			<button type='submit' value='SIGN UP' class="signup">
				SIGN UP
			</button>
		</div>
	</form>
</body>

</html>