<?php
require_once dirname(__DIR__) . '/models/Genre.php';
$genreModel = new Genre();
$genres = $genreModel->getAllGenres();
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- ce DOCTYPE est nécessaire avec IE pour les marges automatiques -->
<html>

<head>
    <title>Library</title>
    <meta NAME="Author" CONTENT="M">
    <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=utf-8">
    <link href="../style_op.css" type="text/css" rel="stylesheet" media="all">
</head>

<body>

    <div class="header2">
        <div class="logo">
            <a href="../index.html">
                <img class="logo" src="../public/logo.png">
            </a>
        </div>
        <h1>GENRES</h1>
    </div>
    <div class="header3">
        <?php foreach ($genres as $genre): ?>
            <a class="bloc"><?php echo htmlspecialchars($genre['genre_bd']); ?></a>
        <?php endforeach; ?>
    </div>

    <div class=container>
        <h4></h4>
        <img class="image" src="imag1.png" alt="image1">
    </div>

    <div class=container>
        <h4>READING</h4>
        <img class="image" src="imag2.png" alt="image2">
    </div>

    <div class=container>
        <h4>ALREADY READ</h4>
        <img class="image" src="imag3.png" alt="image3">
    </div>
    <ul>
        <a href='../index.html' class="link-purple">retour accueil</a>
    </ul>
</body>

</html>