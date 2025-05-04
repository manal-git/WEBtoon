<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <title>Log in</title>
    <meta NAME="Author" CONTENT="M">
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <link href="style_op.css" type="text/css" rel="stylesheet" media="all">


</head>

<body>
    <div class="header1">
        <div class="logo">
            <a href="index.php">
                <img class="logo" src="./public/logo.png">
            </a>
        </div>
    </div>

    <h1 class="center-title">LOG IN</h1>
    <form method='POST' action='controllers/login.php' name='annuaire' enctype='application/x-www-form-urlencoded'>
        <div class="login-fields">
            <div class="field-label">
                <div class="form-group">
                    <label for="email">EMAIL ADDRESS :</label>
                    <input type='text' name='email' id='email'>
                </div>

                <div class="form-group">
                    <label for="password">PASSWORD :</label>
                    <input type='password' name='password' id='password'>
                </div>
            </div>
            <div class="spacing-buttons">
                <a href="index.php" class="link-purple">BACK</a>
                <input type='submit' value='LOG IN' class="button-pink">
            </div>
        </div>

    </form>


</body>

</html>